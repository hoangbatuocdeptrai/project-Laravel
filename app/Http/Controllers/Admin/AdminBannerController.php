<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Slides;

class AdminBannerController extends Controller
{
    public function index()
    {
        // dd($id);
        $banner = Banner::orderBy('id','ASC')->paginate(5);
        $slides = Slides::orderBy('id','ASC')->get();
        // dd($banner);
        return view('admin.banner.index',compact('banner','slides'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $img_home_store_1 = $request->home_store_1->getClientOriginalName();
        $img_home_store_2 = $request->home_store_2->getClientOriginalName();
        $img_home_store_3 = $request->home_store_3->getClientOriginalName();
        $img_home_order = $request->home_order->getClientOriginalName();
        $img_home_comment = $request->home_comment->getClientOriginalName();
        $img_shop = $request->shop->getClientOriginalName();
        $img_cart = $request->cart->getClientOriginalName();
        $img_product_detail = $request->product_detail->getClientOriginalName();
        $img_borrower = $request->borrower->getClientOriginalName();
        $img_order = $request->order->getClientOriginalName();
        $img_account = $request->account->getClientOriginalName();

        $request->home_store_1->move(public_path('uploads'),$img_home_store_1);
        $request->home_store_2->move(public_path('uploads'),$img_home_store_2);
        $request->home_store_3->move(public_path('uploads'),$img_home_store_3);
        $request->home_order->move(public_path('uploads'),$img_home_order);
        $request->home_comment->move(public_path('uploads'),$img_home_comment);
        $request->shop->move(public_path('uploads'),$img_shop);
        $request->cart->move(public_path('uploads'),$img_cart);
        $request->product_detail->move(public_path('uploads'),$img_product_detail);
        $request->borrower->move(public_path('uploads'),$img_borrower);
        $request->order->move(public_path('uploads'),$img_order);
        $request->account->move(public_path('uploads'),$img_account);

        $request->merge(['img_home_store_1' => $img_home_store_1]);
        $request->merge(['img_home_store_2' => $img_home_store_2]);
        $request->merge(['img_home_store_3' => $img_home_store_3]);
        $request->merge(['img_home_order' => $img_home_order]);
        $request->merge(['img_home_comment' => $img_home_comment]);
        $request->merge(['img_shop' => $img_shop]);
        $request->merge(['img_cart' => $img_cart]);
        $request->merge(['img_product_detail' => $img_product_detail]);
        $request->merge(['img_borrower' => $img_borrower]);
        $request->merge(['img_order' => $img_order]);
        $request->merge(['img_account' => $img_account]);
        $data = $request->only('img_home_store_1','img_home_store_2','img_home_store_3','img_home_order','img_home_comment','img_shop','img_product_detail','img_cart','img_borrower','img_order','img_account');
        // dd($data);
        if($banner = Banner::create($data)){
            return redirect()->route('admin.banner.index')->with('yes','Thêm mới thành công');
        }else{
            return redirect()->back()->with('no','Thêm mới không thành công');
        }
    }


    public function update(Request $request,$id)
    {
        // dd($request->all());
        $banner = Banner::find($id);
          //lấy ảnh cũ
        $img_home_store_1 = $banner->img_home_store_1;
        // dd($img_home_store_1);
        $img_home_store_2 = $banner->img_home_store_2;
        $img_home_store_3 = $banner->img_home_store_3;
        $img_home_order = $banner->img_home_order;
        $img_home_comment = $banner->img_home_comment;
        $img_shop = $banner->img_shop;
        $img_cart = $banner->img_cart;
        $img_product_detail = $banner->img_product_detail;
        $img_borrower = $banner->img_borrower;
        $img_order = $banner->img_order;
        $img_account = $banner->img_account;

        if($request->has('home_store_1')){        //nếu có file đc chọn trên form
            $img_home_store_1 = $request->home_store_1->getClientOriginalName(); //lấy lại tên file mới
            $request->home_store_1->move(public_path('uploads'),$img_home_store_1); //upload
        }

        if($request->has('home_store_2')){        //nếu có file đc chọn trên form
            $img_home_store_2 = $request->home_store_2->getClientOriginalName(); //lấy lại tên file mới
            $request->home_store_2->move(public_path('uploads'),$img_home_store_2); //upload
        }

        if($request->has('home_store_3')){        //nếu có file đc chọn trên form
            $img_home_store_3 = $request->home_store_3->getClientOriginalName(); //lấy lại tên file mới
            $request->home_store_3->move(public_path('uploads'),$img_home_store_3); //upload
        }

        if($request->has('home_order')){        //nếu có file đc chọn trên form
            $img_home_order = $request->home_order->getClientOriginalName(); //lấy lại tên file mới
            $request->home_order->move(public_path('uploads'),$img_home_order); //upload
        }

        if($request->has('home_comment')){        //nếu có file đc chọn trên form
            $img_home_comment = $request->home_comment->getClientOriginalName(); //lấy lại tên file mới
            $request->home_comment->move(public_path('uploads'),$img_home_comment); //upload
        }

        if($request->has('shop')){        //nếu có file đc chọn trên form
            $img_shop = $request->shop->getClientOriginalName(); //lấy lại tên file mới
            $request->shop->move(public_path('uploads'),$img_shop); //upload
        }

        if($request->has('cart')){        //nếu có file đc chọn trên form
            $img_cart = $request->cart->getClientOriginalName(); //lấy lại tên file mới
            $request->cart->move(public_path('uploads'),$img_cart); //upload
        }

        if($request->has('product_detail')){        //nếu có file đc chọn trên form
            $img_product_detail = $request->product_detail->getClientOriginalName(); //lấy lại tên file mới
            $request->product_detail->move(public_path('uploads'),$img_product_detail); //upload
        }

        if($request->has('borrower')){        //nếu có file đc chọn trên form
            $img_borrower = $request->borrower->getClientOriginalName(); //lấy lại tên file mới
            $request->borrower->move(public_path('uploads'),$img_borrower); //upload
        }

        if($request->has('order')){        //nếu có file đc chọn trên form
            $img_order = $request->order->getClientOriginalName(); //lấy lại tên file mới
            $request->order->move(public_path('uploads'),$img_order); //upload
        }
        if($request->has('account')){        //nếu có file đc chọn trên form
            $img_account = $request->account->getClientOriginalName(); //lấy lại tên file mới
            $request->account->move(public_path('uploads'),$img_account); //upload
        }

        $request->merge(['img_home_store_1' => $img_home_store_1]);
        $request->merge(['img_home_store_2' => $img_home_store_2]);
        $request->merge(['img_home_store_3' => $img_home_store_3]);
        $request->merge(['img_home_order' => $img_home_order]);
        $request->merge(['img_home_comment' => $img_home_comment]);
        $request->merge(['img_shop' => $img_shop]);
        $request->merge(['img_cart' => $img_cart]);
        $request->merge(['img_product_detail' => $img_product_detail]);
        $request->merge(['img_borrower' => $img_borrower]);
        $request->merge(['img_order' => $img_order]);
        $request->merge(['img_account' => $img_account]);
        $data = $request->only('img_home_store_1','img_home_store_2','img_home_store_3','img_home_order','img_home_comment','img_shop','img_product_detail','img_cart','img_borrower','img_order','img_account');
        // dd($data);
        if($banner->update($data) || Banner::where('id',$id)->update($data)){
            if($request->has('uploads')){
                foreach($request->uploads as $file){
                    $image_name = $file->getClientOriginalName();
                    Slides::create([
                        'image' => $image_name,
                    ]);
                    $file->move(public_path('uploads'),$image_name);
                }
            }
            return redirect()->route('admin.banner.index')->with('yes','Cập nhật thành công');
        }else{
            return redirect()->back()->with('no','Cập nhật không thành công');
        }
    }
    public function deleteImage($id)
    {
        Slides::where('id',$id)->delete();
        return redirect()->back()->with('yes','Xóa thành công');
    }

}
