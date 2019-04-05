<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        if (!Auth::user()->hasPermission('read-clients')) abort(404);
        $clients = Client::paginate(15);
        return view('pages.clients.index', compact('clients'));
    }

    public function submitAddAction(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'phone' => 'required|unique:clients,phone',
                'band'=>'required|unique:clients,band'
            ], [
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.unique' => 'Số điện thoại đã tồn tại',
                'phone.min' => 'Vui lòng nhập lại số điện thoại',
                'phone.numeric' => 'Vui lòng nhập lại số điện thoại',
                //'cubic.required'=>'Vui lòng nhập phân khối'
            ]);
        if (!$validator->fails()) {
            $client = new Client();
            $client->name = $request->name;
            $client->band = $request->band;
            $client->cubic = $request->cubic;
            $client->phone = $request->phone;
            $client->save();
            return redirect()->route('client.index')->with('success', 'Thêm khách hàng thành công');
        }


        return redirect()->back()->withErrors($validator)->withInput();

    }

    public function editAction($id)
    {
        $client = Client::find($id);
        return view('pages.clients.edit-client', compact('client'));
    }

    public function submitEditAction(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'phone' => 'required|unique:clients,phone',
                'band'=>'required|unique:clients,band'
            ], [
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.unique' => 'Số điện thoại đã tồn tại',
                'phone.min' => 'Vui lòng nhập lại số điện thoại',
                'phone.numeric' => 'Vui lòng nhập lại số điện thoại',
                //'cubic.required'=>'Vui lòng nhập phân khối'
            ]);
        if (!$validator->fails()) {
            $client = Client::findOrFail($id);
            $client->name = $request->name;
            $client->band = $request->band;
            $client->cubic = $request->cubic;
            $client->phone = $request->phone;
            $client->save();
            return redirect()->route('client.index')->with('success', 'Sửa khách hàng thành công');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function deleteAction($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(['type' => 'success', 'message' => 'Delete client success !'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'phone' => 'required|unique:clients,phone',
                'band'=>'required|unique:clients,band'
            ], [
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.unique' => 'Số điện thoại đã tồn tại',
                'phone.min' => 'Vui lòng nhập lại số điện thoại',
                'phone.numeric' => 'Vui lòng nhập lại số điện thoại',
                'band.unique' => 'Biển số xe đã tồn tại',
                //'cubic.required'=>'Vui lòng nhập phân khối'
            ]);
        if (!$validator->fails()) {
            $client = new Client();
            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->cubic = $request->cubic;
            $client->band = $request->band;
            $client->save();
            return response()->json(['type' => 'success', 'message' => 'Thêm khách hàng thành công!'], 200);
        }else {
            $p = Client::where('phone', $request->phone);
            if (!empty($p)) {
                return response()->json(['type' => 'error', 'message' => 'Số điện thoại hoặc biển số xe đã tồn tại.!'], 200);
            }else{
                return response()->json(['type' => 'error', 'message' => 'Vui lòng nhập lại số điện thoại!'], 200);
            }
        }
    }
}
