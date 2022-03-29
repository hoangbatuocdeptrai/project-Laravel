<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use Mail;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Borrower;
use App\Models\BorrowerDetail;
use App\Models\Customer;
use App\Models\Author;

class BorrowerController extends Controller
{
    public function check_borrower(Cart $cart){
        $customer = Auth::guard('kh')->user();
        $author = Author::orderBy('id','desc')->paginate(6);
        return view('borrower.check_borrower',compact('customer','cart','author'));
    }

    public function post_check_borrower(Request $req,Cart $cart){
        if($req->name && $req->phone && $req->address && $req->email && $req->id_card){
                $auth = Auth::guard('kh')->user();
                $data = $req->only('customer_id','name','email','phone','address','quantity','id_card');
                if($cart->totalQuantity > 0){
                    $check = true;
                    if($borrower = Borrower::create($data)){
                        $borrower_id = $borrower->id;
                        foreach($cart->items as $item){
                            $detail = [
                                'loan_card_id' => $borrower_id,
                                'product_id' => $item['id'],
                                'quantity' => $item['quantity']
                            ];
        
                            if(!BorrowerDetail::create($detail)){
                                $check = false;
                                break;
                            }
                        }
                            if($check){
                                $borrower = Borrower::find($borrower_id);
                                $token = rand(10000,100000);
                                if(Borrower::where('token',$token)->first()){
                                    $token = rand(10000,100000);
                                }
                                $borrower->update(['token' => $token]);
                                Mail::send('borrower.email',compact('auth','borrower'), function($mail) use($auth){
                                    $mail->to($auth->email)->subject('Vui lòng xác nhận đơn hàng');
                                });
                                $cart->clearItem();
                                return redirect()->route('home.index')->with('yes','Mua hàng thành công');
                            }else{
                                BorrowerDetail::where('loan_card_id',$borrower_id)->delete();
                                Borrower::where('id',$borrower_id)->delete();
                                return redirect()->route('home.not')->with('no','Mua hàng không thành công');
                            }
                    }
            }else{
                return redirect()->back()->with('no','Bạn chưa chọn hình thức thanh toán');
            }
        }else{
            return redirect()->back()->with('no','Bạn chưa nhập thông tin người muợn');
        }
    }

    public function check_cus(Request $request,$id){
        // dd($id);
        $borrower = Borrower::find($id);
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $borrower ->update(['end_date'=>$now]);
        $start = strtotime($borrower->created_at);
        // dd($start);
        $end = strtotime($borrower->end_date);
        $date = abs($end - $start) / (60*60*24);
        // dd($date);
        $price_date = 2; //Giá 1 ngày 2 $
        $price = $price_date * $date; //giá 1 quyển sách đã mượn
        // dd($borrower->id);
        $total = $borrower->quantity * $price; //Giá toàn bộ số lượng sách đã mượn
        // dd($data);
        if($borrower->update(['status'=>$request->status,'total_price'=>$total]) || Borrower::where('id',$id)->update(['status'=>$request->status,'total_price'=>$request->total])){
            return redirect()->back()->with('yes','Vui lòng chờ admin xác nhận');
        }
        
    }

    public function check_code(Request $req){
        // dd($req->token);
        $borrower = Borrower::where('token',$req->token)->first();
        if($borrower){
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $borrower ->update(['end_date'=>$now]);
            $start = strtotime($borrower->created_at);
            // dd($start);
            $end = strtotime($borrower->end_date);
            $date = abs($end - $start) / (60*60*24);
            // dd($date);
            $price_date = 2; //Giá 1 ngày 2 $
            $price = $price_date * $date; //giá 1 quyển sách đã mượn
            // dd($borrower->id);
            return view('borrower.pay',compact('price','borrower'));
        }
        // return view('borrower.check_borrower',compact('customer','cart','author'));
    }

    public function check_s(Request $request,$id){
        $borrower = Borrower::find($id);
        if($borrower->update(['status'=>$request->status]) || Borrower::where('id',$id)->update(['status'=>$request->status])){
            return redirect()->route('customer.account')->with('yes','Thanh toán thành công !');
        }
        
    }
}
