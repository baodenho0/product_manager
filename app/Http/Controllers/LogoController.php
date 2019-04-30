<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Logo;

class LogoController extends Controller
{
    //
    public function getlogo(){
    	$logo = Logo::first();
    	$output = array(
    		'title' => $logo->title,
    		'image' => $logo->image,
    	);
    	echo json_encode($output);
    }

    public function postlogo(Request $request){
    	$validate = Validator::make($request->all(),[
    		// 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:1024',
    	]);
  		
  		$error_array = array();
    	$success_output = '';
    	if($validate->fails()){
    		foreach ($validate->messages()->getMessages() as $messages) {
    			$error_array[] = $messages;
    		}
    	}else {
    		$logo = Logo::first();
    		$logo->title = $request->title;
    		// --- upload img
		    	if($request->hasFile('image')){
		    	$img = $request->file('image');
				$img_name = str_random(4)."-".$img->getClientOriginalName();
				if(file_exists('assets/upload/logo/'.$logo->image)){
				unlink('assets/upload/logo/'.$logo->image);
				}
				$img->move('assets/upload/logo',$img_name);
				$logo->image = $img_name;
				}
				
			// --- 
    		$logo->save();
    		 $success_output = '<div class="alert alert-success">Cập nhật thành công</div>';
    	}
    	
    	$output = array(
    		'error' => $error_array,
    		'success' => $success_output,
    	);
    	echo json_encode($output);
    }
}
