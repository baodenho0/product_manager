<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        if(!Auth::user()->hasPermission('read-setting')) abort(404);
        $setting = Setting::where('name', 'del_pay_temp')->get();
        return view('pages.setting.index', ['set' => $setting]);
    }

    public function changePasswordAction(Request $request)
    {
        $s = Setting::where('name', 'del_pay_temp')->first();
        //$setting = DB::table('setting')->where('name', $request->oldPassword)->first();
        if ($s->value == $request->oldPassword) {
            $a = Setting::where('name', 'del_pay_temp')->update(['value' => $request->newPassword]);
            return response()->json(['status' => 'Update thành công']);
        } else {
            return response()->json(['status' => 'Update thất bại']);
        }
    }

    public function resetPasswordAction(Request $request)
    {
        $s = Setting::where('name', 'del_pay_temp')->first();
        $content = $s->value;
        $email = $request->email;
        $data = [
            'content' => $content,
            'email' => $email,
            'subject' => $email
        ];
        $fromEmail=Setting::where('name', 'from_email')->first();
        define('MAIL_USERNAME', $fromEmail->value2);
        define('MAIL_PASSWORD',$fromEmail->value);
        Mail::send('pages.setting.email', $data, function ($message) use ($data) {
            $message->from(MAIL_USERNAME, 'project_manager');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
        return redirect()->back();
    }
}
