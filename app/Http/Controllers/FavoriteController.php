<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Author;
use App\Models\Favorite;
use Auth;
class FavoriteController extends Controller
{
    public function add($id){
        $product = Product::find($id);
        $customer = Auth::guard('kh')->user();
        $data = ['customer_id'=>$customer->id,'product_id'=>$product->id];
        if(Favorite::where($data)->count() > 0){
            return redirect()->route('home.index')->with('no','Sản phẩm đã tồn tại trong yêu thích');
        }else{
            $favorite = Favorite::create($data);
            return redirect()->route('home.index')->with('yes','Sản phẩm đã được thêm vào yêu thích');
        }
    }

    public function remove($id){
        $customer = Auth::guard('kh')->user();
        $data = ['customer_id'=>$customer->id,'product_id'=>$id];
        Favorite::where($data)->delete();
        return redirect()->route('home.index')->with('yes','Sản phẩm đã được xoá');
    }

    public function clear(){
        $customer = Auth::guard('kh')->user();
        $favorite = Favorite::where('customer_id',$customer->id)->delete();
        return redirect()->route('home.index')->with('yes','Xóa tất cả sản phẩm thành công');
    }

    public function view(){
        $customer = Auth::guard('kh')->user();
        $favorite = Favorite::where('customer_id',$customer->id)->get();
        return view('home.wishlist',compact('favorite'));
    }

}
