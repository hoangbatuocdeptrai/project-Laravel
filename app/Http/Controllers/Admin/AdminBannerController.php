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
            return redirect()->route('admin.banner.index')->with('yes','Th??m m???i th??nh c??ng');
        }else{
            return redirect()->back()->with('no','Th??m m???i kh??ng th??nh c??ng');
        }
    }


    public function update(Request $request,$id)
    {
        // dd($request->all());
        $banner = Banner::find($id);
          //l???y ???nh c??
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

        if($request->has('home_store_1')){        //n???u c?? file ??c ch???n tr??n form
            $img_home_store_1 = $request->home_store_1->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->home_store_1->move(public_path('uploads'),$img_home_store_1); //upload
        }

        if($request->has('home_store_2')){        //n???u c?? file ??c ch???n tr??n form
            $img_home_store_2 = $request->home_store_2->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->home_store_2->move(public_path('uploads'),$img_home_store_2); //upload
        }

        if($request->has('home_store_3')){        //n???u c?? file ??c ch???n tr??n form
            $img_home_store_3 = $request->home_store_3->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->home_store_3->move(public_path('uploads'),$img_home_store_3); //upload
        }

        if($request->has('home_order')){        //n???u c?? file ??c ch???n tr??n form
            $img_home_order = $request->home_order->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->home_order->move(public_path('uploads'),$img_home_order); //upload
        }

        if($request->has('home_comment')){        //n???u c?? file ??c ch???n tr??n form
            $img_home_comment = $request->home_comment->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->home_comment->move(public_path('uploads'),$img_home_comment); //upload
        }

        if($request->has('shop')){        //n???u c?? file ??c ch???n tr??n form
            $img_shop = $request->shop->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->shop->move(public_path('uploads'),$img_shop); //upload
        }

        if($request->has('cart')){        //n???u c?? file ??c ch???n tr??n form
            $img_cart = $request->cart->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->cart->move(public_path('uploads'),$img_cart); //upload
        }

        if($request->has('product_detail')){        //n???u c?? file ??c ch???n tr??n form
            $img_product_detail = $request->product_detail->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->product_detail->move(public_path('uploads'),$img_product_detail); //upload
        }

        if($request->has('borrower')){        //n???u c?? file ??c ch???n tr??n form
            $img_borrower = $request->borrower->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->borrower->move(public_path('uploads'),$img_borrower); //upload
        }

        if($request->has('order')){        //n???u c?? file ??c ch???n tr??n form
            $img_order = $request->order->getClientOriginalName(); //l???y l???i t??n file m???i
            $request->order->move(public_path('uploads'),$img_order); //upload
        }
        if($request->has('account')){        //n???u c?? file ??c ch???n tr??n form
            $img_account = $request->account->getClientOriginalName(); //l???y l???i t??n file m???i
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
            return redirect()->route('admin.banner.index')->with('yes','C???p nh???t th??nh c??ng');
        }else{
            return redirect()->back()->with('no','C???p nh???t kh??ng th??nh c??ng');
        }
    }
    public function deleteImage($id)
    {
        Slides::where('id',$id)->delete();
        return redirect()->back()->with('yes','X??a th??nh c??ng');
    }

}
