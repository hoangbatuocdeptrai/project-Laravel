<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;
use Auth;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::search()->orderBy('Id','DESC')->paginate(5);
        if($request->status){
            $status = $request->status ? $request->status : '';
            $orders = Order::search()->where('status',$status)->orderBy('Id','DESC')->paginate(5);
        }
        
        // dd($orders);
        $key = $request->keyword;
        $start = null;
        $end = null;
        if($request->dateStart && $request->dateEnd){
            $start = date('Y-m-d h:i:s', strtotime($request->dateStart));
            $end = date('Y-m-d h:i:s', strtotime($request->dateEnd));
            $orders =  Order::search()->whereBetween('created_at',[$start,$end])->orderBy('Id','DESC')->paginate(5);
        }
        return view('admin.order.index',compact('orders','start','end','key'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        return view('admin.order.detail', compact('order'));
    }

    public function pdf($id, Request $request)
    {
        $auth = Auth::guard('kh')->user();
        $order = Order::find($id);
        // dd($auth);
        if($order){
            $pdf = PDF::loadView('admin.order.pdf',compact('auth','order'));
            if($request->action === 'download'){
                return $pdf->download('admin.order.pdf');
            } else{
                return $pdf->stream();
            }
        }else{
            return view('site.404');
        }
    }

    public function status($id, Request $request)
    {
        if($request->status){
            Order::where('id',$id)->update(['status' => $request->status]);
        }
        return redirect()->back()->with('yes', 'Cập nhật thành công');
    }
}
