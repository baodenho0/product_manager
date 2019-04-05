<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasPermission('read-permissions')) abort(404);
        $permission = Permission::paginate(15);
        return view('pages.permissions.index')->withPermissions($permission);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->hasPermission('create-permissions')) abort(404);
        return view('pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->hasPermission('create-permissions')) abort(404);
        $messages = [
            'name.required'=>'Please enter permission name.',
            'slug.required'=>'Please enter slug permission name.'
        ];
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required',
        ],$messages);
        if(!$validator->fails()){
            $permission = new Permission();
            $permission->name = $request->slug;
            $permission->display_name = $request->name;
            $permission->description = $request->desc;
            $permission->save();
            return redirect()->route('permissions.index')->with('success','Create permission '.$permission->display_name.' is success !!');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->hasPermission('update-permissions')) abort(404);
        $permision = Permission::findOrFail($id);
        return view('pages.permissions.edit')->withPermission($permision);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::user()->hasPermission('update-permissions')) abort(404);
        $messages = [
            'name.required'=>'Please enter permission name.',
            'slug.required'=>'Please enter slug permission name.'
        ];
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required',
        ],$messages);
        if(!$validator->fails()){
            $permission = Permission::findOrFail($id);
            $permission->name = $request->slug;
            $permission->display_name = $request->name;
            $permission->description = $request->desc;
            if($permission->save()){
                return redirect()->route('permissions.index')->with('success','Update permission is success !!');
            }
            return redirect()->back()->with('errors','Update permission error ! Please try agian.');
        }
        return redirect()->back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->hasPermission('delete-permissions')) abort(404);
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return ['message'=>'deleted'];
    }
}
