<?php

namespace App\Http\Controllers;

use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;
use App\Setting;
class MenuController extends Controller
{


    public function index(){
        if(!Auth::user()->hasPermission('read-menus')) abort(404);
        $menus = Menu::all();
        return view('pages.menus.index')->withMenus($menus);
    }

    public function store(Request $request){
        if(!Auth::user()->hasPermission('create-menus')) abort(404);
        if(empty($request->name)){
            return response()->json(['status'=>'error','message'=>'Vui lòng nhập tên menu !']);
        }
        $menu = new Menu();
        $menu->name = $request->name;
        if($menu->save())
            return response()->json(['status'=>'success','message'=>'Thêm menu thành công !!']);
    }

    public function update(Request $request, $id){
        if(!Auth::user()->hasPermission('update-menus')) return response()->json(['status'=>'error','Không được phép !']);
        if(empty($request->name)){
            return response()->json(['status'=>'error','message'=>'Vui lòng nhập tên menu !!']);
        }
        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        if($menu->save())
            return response()->json(['type'=>'success','message'=>'Cập nhật '.$menu->name.' thành công !!']);
        return response()->json(['status'=>'error','message'=>'Cập nhập '.$menu->name.' không thành công !! Vui lòng thử lại.']);
    }

    public function destroy($id){
        if(!Auth::user()->hasPermission('delete-menus')) return response()->json(['status'=>'error','message'=>'Không được phép !']);
        $menu = Menu::findOrFail($id);
        if($menu->delete())
            return response()->json(['status'=>'success','message'=>'Xóa '.$menu->name.' thành công !!']);
    }

    public function payAction(){
        $products=\App\Product::all();
        $orders=Session::get('ordersss');
        //dd($orders);
        $clients=array();
        if($orders!=null)
        {
            $phones=array_keys($orders);
            $clients=\App\Client::whereIn("phone",$phones)->get();   
        }
        $staffs=\App\User::all();
        $pass=Setting::where('name','del_pay_temp')->get();
        return view('pages.pay.index',['pass'=>$pass],compact('products','clients','staffs'));
    }
    public function searchPayAction(Request $request){
        if($request->ajax()){
            $output="";
           $user=DB::table('companies')->where('phone','LIKE','%'.$request->search.'%')->get();
           if ($user){
               foreach ($user as $key=>$user){
                   $output.='<label class="col-sm-4" for="name">Khách hàng: '.$user->name.'</label>'.
                       '<label class="col-sm-4" for="name">Số ĐT: '.$user->phone.'</label>'.
                       '<label class="col-sm-4" for="name">Biển Số: '.$user->address.'</label>';
               }
           }
           return Response($output);
        }

    }
}
