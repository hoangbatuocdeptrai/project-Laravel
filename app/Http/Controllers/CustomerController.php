<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Borrower;
use App\Models\Favorite;
use App\Http\Requests\Customer\RegisterRequest;
use App\Http\Requests\Customer\Edit_Account_Request;
use App\Http\Requests\Customer\PasswordRequest;
use Auth;
use Mail;
use PDF;

class CustomerController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }

    public function create_login(RegisterRequest $req)
    {     
        $password = bcrypt($req->password);
        $req->merge(['password'=>$password]);
        $data = $req->only('name','email','password','phone','address','gender');
        if($customer = Customer::create($data)){
            Mail::send('customer.link_register',compact('customer'), function($mail) use($req){
                $mail->to($req->email)->subject('Xác nhận tài khoản');
            });
            return redirect()->route('customer.login')->with('yes','Vui lòng xác nhận email');
        }
        return redirect()->back()->with('no','Tạo tài khoản thất bại');
    }

    public function create_register($id)
    {    
        $customer = Customer::where('id',$id)->first();
        $customer->update(['status' => 1 ]);
        return redirect()->route('customer.login')->with('yes','Tạo tài khoản thành công');
    }

    public function post_login(Request $req)
    {
        $data = $req->only('email','password');
        $customer = Customer::where('email',$req->email)->first();
        if($customer){
            if($customer->status == 1){
                $check_login = Auth::guard('kh')->attempt($data);
                if($check_login){
                    return redirect()->route('home.index')->with('yes','Đăng nhập thành công');
                }
            }
            return redirect()->back()->with('no','Bạn chưa xác nhận tài khoản');
        }else{
            return redirect()->back()->with('no','Đăng nhập thất bại');
        }
    }

    public function logout(){
        $customer = Auth::guard('kh')->user();
        $customer->update(['status_code'=>0]);
        if(Auth::guard('kh')->check()){
            Auth::guard('kh')->logout();
            return redirect()->route('customer.login')->with('yes','Đăng xuất thành công');
        }else{
            return redirect()->back()->with('no','Đăng xuất thất bại');
        }
    }

    public function account()
    {
        $customer = Auth::guard('kh')->user();
        $favorite = Favorite::where('customer_id',$customer->id)->orderBy('id', 'desc')->get();
        $borrower = $customer->borrowers()->orderBy('id', 'desc')->paginate(5);
        $orders = $customer->orders()->paginate(5);
        // dd($customer);
        return view('customer.account',compact('customer','orders','borrower','favorite'));
    }

    public function edit_account(Edit_Account_Request $req)
    {
        // dd($req->all());
        $customer = Auth::guard('kh')->user();
        $image = $customer->image;
        if($req->has('upload')){ 
            $image = $req->upload->getClientOriginalName(); 
            $req->upload->move(public_path('uploads'),$image);
        }
        $req->merge(['image' => $image]);
        if($req->password){
            $password = bcrypt($req->password);
        }else{
            $password = $customer->password;
        }
        $req->merge(['password'=>$password]);
        $data = $req->only('name','phone','address','gender','password','image');
        // dd($data);
        if($customer->update($data)){
            return redirect()->route('customer.account')->with('yes','Cập nhật tài khoản thành công');
        }
        return redirect()->back()->with('no','Cập nhật tài khoản thất bại');
    }

    public function send_email()
    {
        return view('customer.send_email');
    }

    public function send_link(Request $req){
        $customer = Customer::where('email',$req->email)->first();
        if($customer){
            $customer->update(['token' => $req->token]);
            Mail::send('customer.link',compact('customer'), function($mail) use($req){
                $mail->to($req->email)->subject('Xác nhận tài khoản');
            });
            return redirect()->route('customer.login')->with('yes','Đã gửi tới email của bạn');
        }
        return redirect()->route('customer.send_email')->with('no','Email bạn nhập không chính xác');
    }

    public function forgot_password($token)
    {
        $customer = Customer::where('token',$token)->first();
        return view('customer.forgot_password',compact('customer'));
    }

    public function password_new(PasswordRequest $req)
    {
        $customer = Customer::where('token',$req->token)->first();
        if($customer){
            if($req->password == $req->confirm_password){
                $password = bcrypt($req->password);
                $customer->update(['password' => $password ,'token' => null]);
                return redirect()->route('customer.login')->with('yes','Thay đổi mật khẩu thành công');
            }else{
                return redirect()->route('customer.forgot_password',$customer->token)->with('no','Mật khẩu không giống nhau');
            }
        }
    }

    public function confirm($token){
        $order = Order::where('token',$token)->first();
        if($order){
            $order->update(['token' => null,'status' => 2]);
            return redirect()->route('home.index')->with('yes','Mua hàng thành công');
        }
        return redirect()->route('home.not')->with('no','Mua hàng không thành công');
    }

    public function detail(Request $req,$id){
        $customer = Auth::guard('kh')->user();
        $order = Order::find($id);
        if($order){
            $pdf = PDF::loadView('order.detail',compact('order'));
            if($req->action === 'download'){
                return $pdf->download('order.pdf');         
            }elseif($req->action === 'detail'){
                return $pdf->stream();
            }
        }
    }

    public function detail_borrower(Request $req,$id){
        $customer = Auth::guard('kh')->user();
        $borrower = Borrower::find($id);
        if($borrower){
            $pdf = PDF::loadView('borrower.detail',compact('borrower'));
            if($req->action === 'download'){
                return $pdf->download('borrower.pdf');         
            }elseif($req->action === 'detail'){
                return $pdf->stream();
            }
        }
    }
    public function rating(Request $req){
        // dd($req->all());
        $model = Rating::where($req->only('product_id','customer_id'))->first();
        if($model){
            $model->where($req->only('product_id','customer_id'))
                ->update($req->only('message','rating_start'));
        }else{
            Rating::create($req->only('product_id','customer_id','message','rating_start'));
        }
        return redirect()->back()->with('yes','Đánh giá thành công');
    }
}
