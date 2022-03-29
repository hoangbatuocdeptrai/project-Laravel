<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use Str;
use \PDF;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Author;
use App\Models\Customer;
use App\Models\OrderDetail;
class OrderController extends Controller
{
    public function check_out(Cart $cart){
        $customer = Auth::guard('kh')->user();
        $author = Author::orderBy('id','desc')->paginate(6);
        return view('order.checkout',compact('customer','cart','author'));
    }

    public function post_checkout(Request $req,Cart $cart){
        if($req->name && $req->phone && $req->address && $req->email){
            if($req->payment){
                $auth = Auth::guard('kh')->user();
                $check = true;
                $data = $req->only('customer_id','name','email','phone','address','total_price','notes','payment');
                if($order = Order::create($data)){
                    $order_id = $order->id;
                    foreach($cart->items as $item){
                        $detail = [
                            'order_id' => $order_id,
                            'product_id' => $item['id'],
                            'price' => $item['price'],
                            'quantity' => $item['quantity']
                        ];
    
                        if(!OrderDetail::create($detail)){
                            $check = false;
                            break;
                        }
                    }
                    if($cart->totalQuantity > 0){
                        if($check){
                            $orders = Order::find($order_id);
                            $token = strtoupper(Str::random(20));
                            $orders->update(['token' => $token]);
                            $auth->update(['status_code'=>0]);
                            Mail::send('order.email',compact('auth','orders','cart'), function($mail) use($auth){
                                $mail->to($auth->email)->subject('Vui lòng xác nhận đơn hàng');
                            });
                            $cart->clearItem();
                            return redirect()->route('home.index')->with('yes','Mua hàng thành công');
                        }else{
                            OrderDetail::where('order_id',$order_id)->delete();
                            Order::where('id',$order_id)->delete();
                            return redirect()->route('home.not')->with('no','Mua hàng không thành công');
                        }
                    }else{
                        return redirect()->route('order.check_out')->with('no','Bạn chưa mua sản phẩm! Vui lòng mua sản phẩm');
                    }
                }
            }else{
                return redirect()->back()->with('no','Bạn chưa chọn hình thức thanh toán');
            }
        }else{
            return redirect()->back()->with('no','Bạn chưa nhập thông tin người mua');
        }
    }

    // public function history(){
    //     $auth = Auth::guard('kh')->user();
    //     $orders = $auth->orders()->paginate(5);
    //     return view('order.history',compact('orders'));
    // }

    // public function detail($id){
    //     $order = Order::find($id);
    //     return view('order.detail',compact('order'));
    // }

    // public function pdf($id,Request $req){
    //     $order = Order::find($id);
    //     $auth = Auth::guard('kh')->user();
    //     if($order){
    //         $pdf = PDF::loadView('order.pdf',compact('order'));
    //         if($req->action === 'download'){
    //             return $pdf->download('order.pdf');         
    //         }else{
    //             return $pdf->stream();
    //         }
    //     }else{
    //         return view('order.error');
    //     }
    // }

    // public function destroy_order($token){
    //     $orders = Order::where('token',$token)->first();
    //     $order_id = $orders->id;
    //     if($orders){
    //         OrderDetail::where('order_id',$order_id)->delete();
    //         $orders->delete();
    //         return redirect()->route('home.index')->with('yes','Hủy đơn hàng thành công');
    //     }
    //     return redirect()->route('home.not')->with('no','Hủy đơn hàng không thành công');
    // }

    // public function success_order($token){
    //     $order = Order::where('token',$token)->first();
    //     if($order){
    //         $order->update(['token' => null,'status' => 2]);
    //         return redirect()->route('home.index')->with('yes','Xác nhận đơn hàng thành công');
    //     }
    //     return redirect()->route('home.not')->with('no','Mua hàng không thành công');

    // }

}
