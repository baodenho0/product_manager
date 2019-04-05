<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasPermission('read-roles')) abort(404);
        $roles = Role::paginate(15);
        return view('pages.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->hasPermission('create-roles')) abort(404);
        $permissions = Permission::all();
        return view('pages.roles.create')->withPermissions($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->hasPermission('create-roles')) abort(404);
        $messages = [
            'name.required' => 'Please enter role name.',
            'slug.required' => 'Please enter slug role name.'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
        ], $messages);
        if (!$validator->fails()) {
            $role = new Role();
            $role->name = $request->slug;
            $role->display_name = $request->name;
            $role->description = $request->desc;
            $role->save();
            foreach ($request->permissions as $permission) {
                $role->attachPermission($permission);
            }
            return redirect()->route('roles.index')->with('succes', 'Create role is success !');
        }
        return redirect()->back()->withErrors($validator);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::user()->hasPermission('read-roles')) abort(404);
        $role = Role::findOrFail($id);
        return view('pages.roles.show')->withRole($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasPermission('update-roles')) abort(404);
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('pages.roles.edit')->withRole($role)->withPermissions($permissions);
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
        if(!Auth::user()->hasPermission('update-roles')) abort(404);
        $role = Role::find($id);
        $messages = [
            'name.required'=>'Please enter role name.',
            'slug.required'=>'Please enter slug role name.'
        ];
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required',
        ],$messages);
        if(!$validator->fails()){
            $role->name = $request->slug;
            $role->display_name = $request->name;
            $role->description = $request->desc;
            if(sizeof($role->permissions) != 0){
                foreach($role->permissions as $permission){
                    $role->detachPermission($permission->id);
                }
            }
            if (!empty($request->permissions)){
                foreach($request->permissions as $permission){
                    $role->attachPermission($permission);
                }
            }
            $role->save();
            return redirect()->route('roles.index')->with('success','Update role is success !!');
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
        if(!Auth::user()->hasPermission('delete-roles')) return response()->json(['message'=>'Không được phép !']);
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(['status'=>'success','message'=>'Xóa vai trò '.$role->display_name.' thành công !']);
    }
}
