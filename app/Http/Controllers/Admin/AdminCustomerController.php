<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
       $customer = Customer::orderBy('id','desc')->paginate(6);
       return view('admin.customer.index', compact('customer'));
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if($customer->delete()){
            return redirect()->route('admin.customer.index')->with('yes','Delete successfully !');
        }else{
            return redirect()->back()->with('no','Deletion failed !');
        }
    }
}
