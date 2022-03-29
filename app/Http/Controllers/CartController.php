<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Customer;
use Mail;
use Auth;
class CartController extends Controller
{
    public function add($id){
        $product = Product::find($id);
        $cart = new Cart();
        $cart->setItem($product);
        return redirect()->route('home.index')->with('yes','Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function remove($id){
        $cart = new Cart();
        $cart->removeItem($id);
        return redirect()->route('home.index')->with('yes','Sản phẩm đã được xoá');
    }

    public function update($id){
        $cart = new Cart();
        $quantity = request('quantity',1);
        if($quantity < 0){
            return redirect()->back()->with('no','Số lượng phải lớn hơn hoặc bằng 1');
        }
        $cart->updateItem($id,$quantity);
        return redirect()->route('cart.view')->with('yes','Cập nhật sản phẩm thành công');
    }

    public function clear(){
        $cart = new Cart();
        $cart->clearItem();
        return redirect()->route('cart.view')->with('yes','Xóa tất cả sản phẩm thành công');
    }

    public function empty(){
        return view('home.cart-empty');
    }

    public function view(){
        $cart = new Cart();
        if($cart->totalQuantity == 0){
            return redirect()->route('cart.empty')->with('no','Vui lòng quay lại mua sản phẩm');
        }
        if(auth()->guard('kh')->check()){
            $customer = Auth::guard('kh')->user();
            return view('home.cart',compact('cart','customer'));
        }
        return view('home.cart',compact('cart'));
    }

    public function code(){
        return view('home.create_code');
    }

    public function create_code(Request $req){
        $customer = Customer::where('email',$req->email)->first();
        if($customer){
            $customer->update(['code'=>$req->code,'status_code'=>0]);
            $name = $customer->name;
            $code = $req->code;
            Mail::send('home.code',compact('code','name'), function($mail) use($req){
                $mail->to($req->email)->subject('Code giảm giá của bạn');
            });
            return redirect()->route('cart.view')->with('yes','Vui lòng kiểm tra email');
        }else{
            return redirect()->back()->with('no','Email bạn nhập chưa đúng');
        }
    }

    public function post_code(Request $req){
        $cart = new Cart();
        $customer = Customer::where('code',$req->code)->first();
        if($customer){
            $customer->update(['code'=>null,'status_code'=>1]);
            return view('home.cart',compact('cart'));
        }else{
            return redirect()->back()->with('no','Mã Code không tồn tại hoặc chưa đúng');
        }
    }
}
