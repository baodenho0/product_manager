<?php

namespace App\Http\Controllers\Bills;

use App\Bill;
use App\Company;
use App\Product;
use App\ProductBill;
use App\ProductType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ImportController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasPermission('read-bills')) {
            $type = DB::table('bill_types')->select('id')->where('slug', 'nhap')->first();
            $bills = Bill::with(['user', 'company'])->where('bill_type_id', $type->id)->orderBy('id','desc')->get();
            $result = [];
            foreach ($bills as $bill) {
                $tmp = [];
                $tmp['id'] = $bill->id;
                $tmp['code'] = $bill->code;
                $tmp['created_at'] = date('d-m-Y H:i', strtotime($bill->created_at));
                $tmp['user'] = $bill->user->name;
                $tmp['company'] = $bill->company->name;
                $result[] = $tmp;
            }
            return view('pages.bills.imports.index')->withBills($result);
        }
        return abort(404);
    }

    public function create()
    {
        if (Auth::user()->hasPermission('create-bills')) {
            $productTypes = ProductType::all();
            $companies = Company::all();
            $data = [
                'productTypes' => $productTypes,
                'companies' => $companies,
            ];
            return view('pages.bills.imports.create', $data);
        }
        abort(404);
    }

    private function storeProductBill($product, $bill_id)
    {
        $pd_bill = new ProductBill();
        $pd_bill->product_id = $product['id'];
        $pd_bill->bill_id = $bill_id;
        $pd_bill->quantity = $product['qttNew'];
        $pd_bill->price = $product['price'];
        $pd_bill->save();
    }

    private function resetProductIfError($products)
    {
        foreach ($products as $product) {
            $pd = Product::find($product['id']);
            $pd->quantity = $product['qttOld'];
            $pd->save();
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->hasPermission('create-bills')) {
            $validator = Validator::make($request->all(), [
                'code' => 'required',
                'company_id' => 'required|integer',
                'products' => 'required|array',
            ]);
            if (!$validator->fails()) {
                $bill = new Bill();
                $bill->code = $request->code;
                $bill->user_id = Auth::user()->id;
                $bill->company_id = $request->company_id;
                $bill_type = DB::table('bill_types')->select('id')->where('slug', 'nhap')->first();
                $bill->bill_type_id = $bill_type->id;
                $bill->save();
                try {
                    foreach ($request->products as $product) {
                        $pd = Product::find($product['id']);
                        if ($pd) {
                            try {
                                $this->storeProductBill($product, $bill->id);
                                $pd->quantity += $product['qttNew'];
                                $pd->save();
                            } catch (QueryException $e) {
                                $this->resetProductIfError($request->products);
                            }
                        }
                    }
                    return response()->json(['status' => 'success', 'href' => route('bill.import.index')]);
                } catch (QueryException $e) {
                    $bill->delete();
                }
            } else {
                return response()->json(['status' => 'error']);
            }
        }
    }

    public function show($id)
    {
        if (Auth::user()->hasPermission('read-bills')) {
            $bill = Bill::find($id);
            $products = [];
            $stt = 1;
            foreach ($bill->detail as $detail) {
                $tmp = [];
                $tmp['stt'] = $stt;
                $tmp['code'] = $detail->code;
                $tmp['name'] = $detail->name;
                $tmp['image'] = $detail->image;
                $tmp['product_type'] = $detail->productType->name;
                $tmp['quantity'] = $detail->pivot->quantity;
                $tmp['price'] = $detail->pivot->price;
                $products[] = $tmp;
                $stt++;
            }
            $result = [
                'id' => $bill->id,
                'code' => $bill->code,
                'company' => $bill->company->name,
                'user' => $bill->user->name,
                'created_at' => date('d-m-Y H:i', strtotime($bill->created_at)),
            ];
            return view('pages.bills.imports.show')->withBill($result)->withDetails($products);
        }
        abort(404);
    }

    public function getListProducts($id)
    {
        $productType = ProductType::find($id);
        if ($productType) {
            $products = $productType->products;
            return response()->json($products, 200);
        }
        return response()->json(['message' => ''], 422);
    }

    public function editAction($id)
    {
        $bill = Bill::find($id);
        $a = Company::find($bill->company_id);
        $companies = Company::all();
        $productTypes = ProductType::all();
        $product = Product::all();
        return view('pages.bills.imports.edit',
            [
                'bill' => $bill,
                'companies' => $companies,
                'productTypes' => $productTypes,
                'product' => $product,
                'a' => $a
            ]);
    }

    public function deleteAction($id)
    {
        $bill = Bill::find($id);// bill
        $billDetail = ProductBill::where('bill_id', $id)->first();
        $a = Product::where('id', $billDetail->product_id)->first();
        $a->quantity = $a->quantity - $billDetail->quantity;
        $a->save();
        ProductBill::where('bill_id','=', $id)->delete();
        $bill->delete();
        return response()->json(['type' => 'success', 'message' => 'Delete bill success'], 200);
    }
}
