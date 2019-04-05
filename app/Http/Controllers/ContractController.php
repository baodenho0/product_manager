<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
//use App\Contra
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ContractController extends Controller
{
    public function index(){
        if(!Auth::user()->hasPermission('read-contracts')) abort(404);
        $contracts = \App\Contract::orderBy('id','asc')->paginate(15);
        return view('pages.contracts.index',compact('contracts'));
    }

    public function create(){
        if(!Auth::user()->hasPermission('create-contracts')) abort(404);
        $productTypes = ProductType::all();
        return view('pages.contracts.create',compact('productTypes'));
    }

    private function storeProductContract($product,$contract_id){
        $pd_ConItem = new \App\Contract_Item();
        $pd_ConItem->product_id = $product['id'];
        $pd_ConItem->contract_id = $contract_id;
        $pd_ConItem->quantity = $product['quantity'];
        $pd_ConItem->price = $product['price'];
        $pd_ConItem->income = $product['income'];
        $pd_ConItem->save();
    }
    public function store(Request $request){
        if(!Auth::user()->hasPermission('create-contracts')) abort(404);
        $validator = Validator::make($request->all(),[
            'code'=>'required|string',
            'products'=>'required|array',
        ]);

        if(!$validator->fails()){
            $contract = new \App\Contract();
            $contract->contract_code = $request->code;
            $contract->customer_name = $request->name;
            $contract->note = $request->note;
            $contract->user_id = Auth::user()->id;
            $contract->created_at =date("Y-m-d h:i:s");
            $contract->updated_at =date("Y-m-d h:i:s");
            $contract->save();
            try{
                foreach ($request->products as $product){
                    $pd = \App\Product::find($product['id']);
                    if($pd){
                        $this->storeProductContract($product, $contract->id);
                    }
                }
                return response()->json(['status' => 'success','href'=> route('contracts.index')]);
            }catch (QueryException $e){
                $contract->delete();
            }
        }else{
            return response()->json(['status'=>'error']);
        }
    }

    public function destroy($id){
        if(!Auth::user()->hasPermission('delete-contracts'))
            return response()->json(['stauts'=>'error','message'=>'Không được phép !']);
        
        
        $contract_item = \App\Contract_Item::where('contract_id',$id);
        $contract_item->delete();

        $contract = \App\Contract::find($id);
        $contract->delete();

        return response()->json(['status'=>'success','message'=>'Xóa Hợp đồng  '.$contract->contract_code.' thành công !']);
    }

    public function show($id){
        $contract = \App\Contract::find($id);
        $products = [];
        $stt = 1;
        foreach($contract->items as $detail){
            $tmp = [];
            $tmp['stt'] = $stt;
            $tmp['quantity'] = $detail->quantity;
            $tmp['price'] = $detail->price;
            $tmp['income'] = $detail->income;
            $tmp['code'] = $detail->code;
            $tmp['name'] = $detail->name;
            $tmp['image'] = $detail->image;
            $tmp['product_type'] = $detail->Product->productType->name;
            $tmp['product_code'] = $detail->Product->code;
            $tmp['product_name'] = $detail->Product->name;
            $tmp['product_image'] = $detail->Product->image;
            $products[] = $tmp;
            $stt++;
        }
        $result = [
            'id'=>$contract->id,
            'contract_code'=>$contract->contract_code,
            'customer_name'=>$contract->customer_name,
            'note'=>$contract->note,
            'user'=>$contract->user->name,
            'created_at'=>date('d/m/Y H:i',strtotime($contract->created_at)),
        ];
        return view('pages.contracts.show',compact('result','products') );
    }

}
