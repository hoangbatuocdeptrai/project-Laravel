<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Auth;
use Mail;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function check_login(Request $request)
    {
        $data = $request->only('email','password');
        $check_login = Auth::attempt($data, $request->has('remember'));
        $admin = User::where('email',$request->email)->first();
        if($check_login){
         return redirect()->route('admin.index')->with('yes','Welcome back to the admin page!');
        }
        return redirect()->back()->with('no','Email hoặc Password không chính xác');
    }


    public function logout()
    {
        return redirect()->route('admin.login')->with('no','Bạn đã thoát !');
    }

    public function send_link(Request $req){
        $admin = User::where('email',$req->email)->first();
        if($admin){
            $admin->update(['token' => $req->token]);
            Mail::send('admin.link',compact('admin'), function($mail) use($req){
                $mail->to($req->email)->subject('Xác nhận tài khoản Admin');
            });
            return redirect()->route('admin.login')->with('yes','Đã gửi tới email của bạn');
        }
        return redirect()->route('admin.login')->with('no','Email bạn nhập không chính xác');
    }

    public function forgot_password($token)
    {
        $admin = User::where('token',$token)->first();
        // dd($admin);
        return view('admin.forgot_password',compact('admin'));
    }

    public function password_new(Request $req)
    {
        $admin = User::where('token',$req->token)->first();
        if($admin){
            if($req->password === $req->confirm_password){
                $password = bcrypt($req->password);
                $admin->update(['password' => $password ,'token' => null]);
                return redirect()->route('admin.login')->with('yes','Thay đổi mật khẩu thành công');
            }
            return redirect()->route('admin.forgot_password',$admin->token)->with('no','Password va Confirm Password khong dc de trong');
        }
    }
    public function contact()
    {
        $contact = Contact::orderBy('id','asc')->paginate(5);
        return view('admin.contact',compact('contact'));
    }
}
