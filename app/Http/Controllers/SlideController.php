<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;
use App\Slide;

class SlideController extends Controller
{
    //
    public function index()
    {
    	 return view('pages.slide.index');
    }

    public function load()
    {
        
        $slide = Slide::all();
        return Datatables::of($slide)
        ->editColumn('image',function($slide){
        	return "<img height='80px' src='../assets/upload/slide/".$slide->image." ' />";
        })
        ->addColumn('action', function ($slide) {
        	return '<a href="#" id=" '.$slide->id.' " class="edit btn btn-xs btn-warning"><i class="fa fa-eye"></i>Edit</a> <a href="#" id="'. $slide->id .'" class="delete btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</a>';
    	})
    	->editColumn('active',function($slide){
    		if($slide->active == 1) return "Có";
    		else return "Không";
    	})
    	->rawColumns(['action','image'])
    	->make(true);

    }

    public function postdata(Request $request){
    	$validate = Validator::make($request->all(),[
    		'image'=>'required',
    		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    		'active'=>'required',
    	]);

    	$error_array = array();
    	$success_output = '';
    	if($validate->fails()){
    		foreach ($validate->messages()->getMessages() as $field_name => $messages) {
    			$error_array[] = $messages;
    		}
    	}else{
    		if($request->get('button_action') == "insert"){
    		$slide = new Slide;
    		$slide->title = $request->title;
    		$slide->active = $request->active;
    		// --- upload img
	    	if($request->hasFile('image')){
	    	$img = $request->file('image');
			$img_name = str_random(4)."-".$img->getClientOriginalName();
			// unlink('assets/upload/slide/'.$slide->image);
			$img->move('assets/upload/slide',$img_name);
			$slide->image = $img_name;
			}
			// --- 
    		$slide->save();
    		$success_output = '<div class="alert alert-success">Data Inserted</div>';
    		} else

    		if($request->get('button_action') == "update"){
    			$slide = slide::find($request->get('slide_id'));
    			$slide->title = $request->title;
	    		$slide->active = $request->active;
	    		// --- upload img
		    	if($request->hasFile('image')){
		    	$img = $request->file('image');
				$img_name = str_random(4)."-".$img->getClientOriginalName();
				if(file_exists('assets/upload/slide/'.$slide->image))
				unlink('assets/upload/slide/'.$slide->image);
				$img->move('assets/upload/slide',$img_name);
				$slide->image = $img_name;
				}
				// --- 
	    		$slide->save();
	    		$success_output = '<div class="alert alert-success">Data Updated</div>';
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
    	$slide = slide::find($id);
    	$output = array(
    		'title' => $slide->title,
    		'image' => $slide->image,
    		'active' => $slide->active,
    	);
    	echo json_encode($output);
    }
    //loi delete
    public function deletedata(Request $request){
    	$slide = Slide::find($request->input('id'));
    	if(file_exists('assets/upload/slide/'.$slide->image)){
		unlink('assets/upload/slide/'.$slide->image);
		}
    	$slide->delete();
    	return 'Xóa thành công';
    	
    }

    // public function test($id){
    // 	$slide = Slide::find($id);
    // 	if(file_exists('assets/upload/slide/'.$slide->image))
    // 		echo "oke";
    // 	else {
    // 		echo "khong ton tai";
    // 	}
    // }
}
