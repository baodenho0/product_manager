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
use yajra\Datatables\Datatables;

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
        
        return view('pages.products.types.index');
    }

    public function load()
    {
        
        $productType = ProductType::all();
        return Datatables::of($productType)
        ->editColumn('image',function($productType){
            return "<img height='70px' src='../assets/upload/product_type/".$productType->image." ' />";
        })
        ->addColumn('action', function ($productType) {
            return '<a href="#" id=" '.$productType->id.' " class="edit btn btn-xs btn-warning"><i class="fa fa-eye"></i>Cập nhật</a> <a href="#" id="'. $productType->id .'" class="delete btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Xóa</a>';
        })
        ->rawColumns(['action','image'])
        ->make(true);

    }

    // public function storeProductType(Request $request)
    // {
    //     $type = new ProductType();
    //     $type->name = $request->name;
    //     dd($request);
    //     // --- upload img

    //             if($request->hasFile('image')){
    //             $img = $request->file('image');
    //             $img_name = str_random(4)."-".$img->getClientOriginalName();
    //             // if(file_exists('assets/upload/productType/'.$type->image)){
    //             // unlink('assets/upload/productType/'.$type->image);
    //             // }
    //             $img->move('assets/upload/producttype',$img_name);
    //             $type->image = $img_name;

    //             }
                
    //         // --- 
    //     $type->save();
    //     return response()->json(['type' => 'success', 'message' => 'Add new product type success !'], 200);
    // }

    // public function updateProductType(Request $request, $id)
    // {
    //     $type = ProductType::findOrFail($id);
    //     $type->name = $request->name;
    //     // --- upload img
    //             if($request->hasFile('image')){
    //             $img = $request->file('image');
    //             $img_name = str_random(4)."-".$img->getClientOriginalName();
    //             if(file_exists('assets/upload/productType/'.$type->image)){
    //             unlink('assets/upload/productType/'.$type->image);
    //             }
    //             $img->move('assets/upload/productType',$img_name);
    //             $type->image = $img_name;
    //             }
                
    //         // --- 
    //     $type->save();
    //     return response()->json(['type' => 'success', 'message' => 'Update protuct type success !'], 200);
    // }

    // public function destroyProductType($id)
    // {
    //     $type = ProductType::findOrFail($id);
    //     $type->delete();
    //     return response()->json(['type' => 'success', 'message' => 'Delete product type success !'], 200);
    // }

    //productType 
    public function postdata(Request $request){
        $validate = Validator::make($request->all(),[
            'name'=>'required|unique:product_types,name',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $error_array = array();
        $success_output = '';
        if($validate->fails()){
            foreach ($validate->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        }else{
            if($request->get('button_action') == "insert"){
            $ProductType = new ProductType;
            $ProductType->name = $request->name;
            $ProductType->slug = str_slug($request->name);
            // --- upload img
            if($request->hasFile('image')){
            $img = $request->file('image');
            $img_name = str_random(4)."-".$img->getClientOriginalName();
            // unlink('assets/upload/ProductType/'.$ProductType->image);
            $img->move('assets/upload/product_type',$img_name);
            $ProductType->image = $img_name;
            }
            // --- 
            $ProductType->save();
            $success_output = '<div class="alert alert-success">Thêm thành công</div>';
            } else

            if($request->get('button_action') == "update"){
                $ProductType = ProductType::find($request->get('products_types_id'));
                $ProductType->name = $request->name;
                $ProductType->slug = str_slug($request->name);
                // --- upload img
                if($request->hasFile('image')){
                $img = $request->file('image');
                $img_name = str_random(4)."-".$img->getClientOriginalName();
                if(file_exists('assets/upload/product_type/'.$ProductType->image))
                unlink('assets/upload/product_type/'.$ProductType->image);
                $img->move('assets/upload/product_type',$img_name);
                $ProductType->image = $img_name;
                }
                // --- 
                $ProductType->save();
                $success_output = '<div class="alert alert-success">Cập nhật thành công</div>';
            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output,
        );
        echo json_encode($output);

    }

    public function editdata(Request $request){
        $id = $request->input('id');
        $ProductType = ProductType::find($id);
        $output = array(
            'name' => $ProductType->name,
            'image' => $ProductType->image,
            
        );
        echo json_encode($output);
    }
    //loi delete
    public function deletedata(Request $request){
        $ProductType = ProductType::find($request->input('id'));
        if(file_exists('assets/upload/product_type/'.$ProductType->image)){
        unlink('assets/upload/product_type/'.$ProductType->image);
        }
        $ProductType->delete();
        return 'Xóa thành công';
        
    }
}
