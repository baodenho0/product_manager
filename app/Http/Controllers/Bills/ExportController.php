<?php

namespace App\Http\Controllers\Bills;

use App\Bill;
use App\Product;
use App\ProductBill;
use App\ProductType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExportController extends Controller
{
    public function index(){
        $type = DB::table('bill_types')->select('id')->where('slug','xuat')->first();
        $bills = Bill::with(['user'])->where('bill_type_id',$type->id)->get();
        $result = [];
        foreach ($bills as $bill){
            $tmp = [];
            $tmp['id'] = $bill->id;
            $tmp['code'] = $bill->code;
            $tmp['created_at'] = date('d-m-Y H:i',strtotime($bill->created_at));
            $tmp['user'] = $bill->user->name;
            $result[] = $tmp;
        }
        return view('pages.bills.exports.index')->withBills($result);
    }
    public function create(){
        $productTypes = ProductType::all();
        return view('pages.bills.exports.create')->withProductTypes($productTypes);
    }
    private function resetProductIfError($products){
        foreach ($products as $product){
            $pd = Product::find($product['id']);
            $pd->quantity = $product['qttOld'];
//            $pd->quantity_si = $product['qttXiOld'];
            $pd->save();
        }
    }
    private function storeProductBill($product,$bill_id){
        $pd_bill = new ProductBill();
        $pd_bill->product_id = $product['id'];
        $pd_bill->bill_id = $bill_id;
        $pd_bill->quantity = $product['qttNew'];
//        $pd_bill->quantity_si = $product['qttXiNew'];
//        $pd_bill->quantity_si = $product['qttXiNew'];
        $pd_bill->save();
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'code'=>'required|string',
            'note'=>'nullable|string',
            'products'=>'required|array',
        ]);

        if(!$validator->fails()){
            $bill = new Bill();
            $bill->code = $request->code;
            $bill->user_id = Auth::user()->id;
            $bill_type = DB::table('bill_types')->select('id')->where('slug','xuat')->first();
            $bill->bill_type_id = $bill_type->id;
            $bill->note = $request->note;
            $bill->save();
            try{
                foreach ($request->products as $product){
                    $pd = Product::find($product['id']);
                    if($pd) {
                        try {
                            $this->storeProductBill($product, $bill->id);
                            $pd->quantity -= $product['qttNew'];
                            //$pd->quantity_si -= $product['qttXiNew'];
                            $pd->save();
                        } catch (QueryException $e) {
                            $this->resetProductIfError($request->products);
                        }
                    }
                }
                return response()->json(['status' => 'success','href'=> route('bill.export.index')]);
            }catch (QueryException $e){
                $bill->delete();
            }
        }else{
            return response()->json(['status'=>'error']);
        }
    }
    public function show($id){
        $bill = Bill::find($id);
        $products = [];
        $stt = 1;
        foreach($bill->detail as $detail){
            $tmp = [];
            $tmp['stt'] = $stt;
            $tmp['code'] = $detail->code;
            $tmp['name'] = $detail->name;
            $tmp['image'] = $detail->image;
            $tmp['product_type'] = $detail->productType->name;
            $tmp['quantity'] = $detail->pivot->quantity;
            //$tmp['quantity_si'] = $detail->pivot->quantity_si;
            $products[] = $tmp;
            $stt++;
        }
        $result = [
            'id'=>$bill->id,
            'code'=>$bill->code,
            'note'=>$bill->note,
            'user'=>$bill->user->name,
            'created_at'=>date('d/m/Y H:i',strtotime($bill->created_at)),
        ];
        return view('pages.bills.exports.show')->withBill($result)->withDetails($products);
    }
}
