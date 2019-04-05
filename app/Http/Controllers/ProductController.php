<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function MongoDB\BSON\toJSON;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasPermission('read-product')) {
            $products = Product::orderBy('name', 'ASC')->paginate(15);
            return view('pages.products.index')->withProducts($products);
        }
        return abort(404);
    }

    public function productSearch(Request $request){

        if (Auth::user()->hasPermission('read-product')) {
            $search = $request->get('search');
            $products = Product::where('name', 'LIKE','%'.$search.'%')->paginate(15);
            return view('pages.products.index')->withProducts($products);
            
        }
    }

    public function create()
    {
        if (Auth::user()->hasPermission('create-product')) {
            $productTypes = ProductType::all();
            return view('pages.products.create')->withProductTypes($productTypes);
        }
        return abort(404);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required|unique:products',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_type' => 'required|integer',
            'price' => 'required'
        ]);
        if (!$validator->fails()) {
            if (!empty($request->image))
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $product = new Product();
            $product->code = strtoupper($request->code);
            $product->name = $request->name;
            $product->description = $request->description;
            if (!empty($request->image))
                $product->image = 'uploads/' . $imageName;
            $product->slug = str_slug($request->name);
            $product->colors = json_encode($request->colors, JSON_UNESCAPED_UNICODE);
            $product->product_type_id = $request->product_type;
            $product->price = $request->price;
            $product->save();
            if (!empty($request->image))
                $request->image->move(public_path('uploads'), $imageName);
            return redirect()->route('products.index')->with('success', 'Create product success');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $productTypes = ProductType::all();
        return view('pages.products.edit')->withProduct($product)->withProductTypes($productTypes);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_type' => 'required|integer',
            'price' => 'required'
        ]);
        if (!$validator->fails()) {
            if (!empty($request->image))
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $product = Product::findOrFail($id);
            $product->code = strtoupper($request->code);
            $product->name = $request->name;
            $product->description = $request->description;
            if (!empty($request->image))
                $product->image = 'uploads/' . $imageName;
            $product->slug = str_slug($request->name);
            $product->colors = json_encode($request->colors, JSON_UNESCAPED_UNICODE);
            $product->product_type_id = $request->product_type;
            $product->price = $request->price;
            $product->save();
            if (!empty($request->image))
                $request->image->move(public_path('uploads'), $imageName);
            return redirect()->route('products.index')->with('success', 'Update product success');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            if (file_exists($product->image)) {
                unlink($product->image);
                $product->delete();
                return response()->json(['type' => 'success', 'message' => 'Delete product success !'], 200);
            } else {
                $product->delete();
                return response()->json(['type' => 'success', 'message' => 'Delete product success !'], 200);
            }
        }
        return response()->json(['type' => 'error', 'message' => $product ]);
    }

    public function indexProductType()
    {
        $productTypes = ProductType::paginate(15);
        return view('pages.products.types.index')->withProductTypes($productTypes);
    }

    public function storeProductType(Request $request)
    {
        $type = new ProductType();
        $type->name = $request->name;
        $type->save();
        return response()->json(['type' => 'success', 'message' => 'Add new product type success !'], 200);
    }

    public function updateProductType(Request $request, $id)
    {
        $type = ProductType::findOrFail($id);
        $type->name = $request->name;
        $type->save();
        return response()->json(['type' => 'success', 'message' => 'Update protuct type success !'], 200);
    }

    public function destroyProductType($id)
    {
        $type = ProductType::findOrFail($id);
        $type->delete();
        return response()->json(['type' => 'success', 'message' => 'Delete product type success !'], 200);
    }
}
