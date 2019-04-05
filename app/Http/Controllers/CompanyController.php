<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
        if (!Auth::user()->hasPermission('read-clients')) abort(404);
        $companies = Company::all();
        return view('pages.companies.index', ['companies' => $companies]);
    }


    public function submitAddAction(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ], [
                'name.required' => 'Vui lòng nhập tên công ty',
                'address.required' => 'Vui lòng nhập địa chỉ công ty',
                'phone.required' => 'Vui lòng nhập SĐT công ty'
            ]);

        if (!$validator->fails()) {
            $companies = new Company();
            $companies->name = $request->input('name');
            $companies->address = $request->input('address');
            $companies->phone = $request->input('phone');
            $companies->save();
            return redirect()->route('companies.index')->with('success', 'Thêm công ty thành công');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function deleteAction($id)
    {
        $companies = Company::findOrFail($id);
        $companies->delete();
        return response()->json(['type' => 'success', 'message' => 'Delete company success!'], 200);
    }

    public function editAction($id)
    {
        $companies = Company::find($id);
        return view('pages.companies.edit', ['companies' => $companies]);
    }

    public function submitEditAction(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ], [
                'name.required' => 'Vui lòng nhập tên công ty',
                'address.required' => 'Vui lòng nhập địa chỉ công ty',
                'phone.required' => 'Vui lòng nhập SĐT công ty'
            ]);
        if (!$validator->fails()) {
            $companies = Company::findOrFail($id);
            $companies->name = $request->input('name');
            $companies->address = $request->input('address');
            $companies->phone = $request->input('phone');
            $companies->save();
            return redirect()->route('companies.index')->with('success', 'Sửa công ty thành công');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required'
        ]);
        if(!$validator->fails()){
            $company = new Company();
            $company->name = $request->name;
            $company->address = $request->address;
            $company->phone = $request->phone;
            $company->save();
            return response()->json(['status'=>'success','data'=>$company]);
        }
        return response()->json(['status'=>'error','message'=>'']);
    }
}
