<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\BorrowerDetail;
use PDF;
use Auth;
use Carbon\Carbon;

class AdminBorrowerController extends Controller
{
    public function index(Request $request)
    {
        $borrower = Borrower::search()->orderBy('id','DESC')->paginate(5);
        if($request->status){
            $status = $request->status ? $request->status : '';
            $borrower = Borrower::search()->where('status',$status)->orderBy('id','DESC')->paginate(5);
        }


        $key = $request->keyword;
        $start = null;
        $end = null;
        if($request->dateStart && $request->dateEnd){
            $start = date('Y-m-d h:i:s', strtotime($request->dateStart));
            $end = date('Y-m-d h:i:s', strtotime($request->dateEnd));
            $borrower =  Borrower::search()->whereBetween('created_at',[$start,$end])->orderBy('id','DESC')->paginate(5);
        }
        return view('admin.borrower.index',compact('borrower','start','end','key'));
    }

    public function status($id, Request $request)
    {
        if($request->status){
            Borrower::where('id',$id)->update(['status' => $request->status]);
        }
        return redirect()->back()->with('yes', 'Cập nhật thành công');
    }
    
    public function detail($token,Request $req)
    {
        $borrower = Borrower::where('token',$req->token)->first();
        return view('admin.borrower.detail', compact('borrower'));
    }


    public function pdf($id, Request $request)
    {
        $auth = Auth::guard('kh')->user();
        $borrower = Borrower::find($id);
        // dd($auth);
        if($borrower){
            $pdf = PDF::loadView('admin.borrower.pdf',compact('auth','borrower'));
            if($request->action === 'download'){
                return $pdf->download('admin.borrower.pdf');
            } else{
                return $pdf->stream();
            }
        }else{
            return view('site.404');
        }
    }

    public function addPrice($id,Request $request)
    {
        $borrower = Borrower::find($id);
        if($borrower->update(['content'=>$request->content,'total_price'=>$request->total_price]) || Borrower::where('id',$id)->update(['content'=>$request->content,'total_price'=>$request->total_price])){
            return redirect()->route('admin.borrower.index')->with('yes','Update successful !');
        }
    }
}
