<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Cart;
use App\Models\Author;
use App\Models\Customer;
use App\Models\Rating;
use App\Models\Blog;
use App\Models\Slides;
use App\Models\Banner;
use Str;

class HomeController extends Controller
{

    // trang chủ
    public function index()
    {

        $contact = Contact::orderBy('id','desc')->paginate(3);
        $banner = Banner::orderBy('id','desc')->get();
        $slides = Slides::orderBy('id','desc')->get();
        $customer = Customer::orderBy('id','desc')->get();
        $author = Author::orderBy('id','desc')->get();
        $blog = Blog::orderBy('id','desc')->paginate(6);
        // dd($contact->cus());
        $product = Product::orderBy('id','desc')->paginate(8);
        $proCount = Product::orderBy('id','desc')->get();
        $proHot = Product::orderBy('id','desc')->where('status','=',1)->paginate(8);
        return view('home.index',compact('product','contact','customer','author','blog','slides','banner','proHot','proCount'));
    }
    // trang chủ
    public function about()
    {
        $banner = Banner::orderBy('id','desc')->get();
        $cats = Category::orderBy('id','desc')->paginate(6);
        return view('home.about',compact('cats','banner'));
    }
    public function blog()
    {
        $banner = Banner::orderBy('id','desc')->get();
        $blog = Blog::orderBy('id','asc')->get();
        $category = Category::orderBy('id', 'asc')->get();
        $author = Author::orderBy('id', 'asc')->get();
        return view('home.blog', compact('blog','category','author','banner'));
    }

    public function blog_view($id)
    {
        $banner = Banner::orderBy('id','desc')->get();
        $blog = Blog::find($id);
        // dd($blog->name);
        $category = Category::orderBy('id', 'asc')->get();
        $author = Author::orderBy('id', 'DESC')->get();
        return view('home.blog-view', compact('blog','category','author','banner'));
    }
    // liên hệ
    public function contact()
    {
        $banner = Banner::orderBy('id','desc')->get();
        return view('home.contact',compact('banner'));
    }
    public function addContact(Contact $contact)
    {
        $data = request()->only('name','email','phone','message','customer_id');
        $contact->create($data);
        return redirect()->route('home.contact')->with('yes','Gửi ý kiến thành công');
    }



    // sản phẩm
    public function shop()
    {
        $banner = Banner::orderBy('id','desc')->get();
        $req_price = request()->price;
        $key = request()->keyword;
        if($req_price){
            $remove = Str::remove('$',$req_price);
            $price = Str::remove(' ',$remove);
            $min_price = Str::before($price, '-');
            $max_price = Str::after($price, '-');
            // dd($min_price);
            $cats = Category::orderBy('name','asc')->get();
            $authors = Author::orderBy('name','asc')->get();
            $products = Product::where('name','like','%'.$key.'%')->whereBetween('sale_price',[$min_price,$max_price])->paginate(15);
            $proHot = Product::orderBy('id','desc')->where('status','=',1)->paginate(5);
            return view('home.shop',compact('cats','products','authors','banner','proHot'));
        }
        // dd($min_price);
        $cats = Category::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $proHot = Product::orderBy('id','desc')->where('status','=',1)->paginate(5);
        $products = Product::search()->paginate(15);
        return view('home.shop',compact('cats','products','authors','banner','proHot'));
    }

    // Hien thị sản phẩm theo danh mục
    public function category($id, $slug)
    {
        $banner = Banner::orderBy('id','desc')->get();
        $req_price = request()->price;
        $key = request()->keyword;
        $cat = Category::find($id);
        if($req_price){
            $remove = Str::remove('$',$req_price);
            $price = Str::remove(' ',$remove);
            $min_price = Str::before($price, '-');
            $max_price = Str::after($price, '-');
            $products = $cat->prods()->where('name','like','%'.$key.'%')->whereBetween('sale_price',[$min_price,$max_price])->paginate(15);
            $cats = Category::orderBy('name', 'asc')->get();
            $authors = Author::orderBy('name','asc')->get();
            $proHot = Product::orderBy('id','desc')->where('status','=',1)->paginate(5);
            return view('home.shop',compact('cat','products','cats','authors','banner','proHot'));
        }
        $products = $cat->prods()->paginate(15);
        $cats = Category::orderBy('name', 'asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $proHot = Product::orderBy('id','desc')->where('status','=',1)->paginate(5);
        return view('home.shop',compact('cat','products','cats','authors','banner','proHot'));
    }
    // Hien thị sản phẩm theo tác giả
    public function author($id, $slug)
    {
        $banner = Banner::orderBy('id','desc')->get();
        $req_price = request()->price;
        $key = request()->keyword;
        $author = Author::find($id);
        if($req_price){
            $remove = Str::remove('$',$req_price);
            $price = Str::remove(' ',$remove);
            $min_price = Str::before($price, '-');
            $max_price = Str::after($price, '-');
            $authors = Author::orderBy('name', 'asc')->get();
            $cats = Category::orderBy('name','asc')->get();
            $proHot = Product::orderBy('id','desc')->where('status','=',1)->paginate(5);
            $products = $author->prods()->where('name','like','%'.$key.'%')->whereBetween('sale_price',[$min_price,$max_price])->paginate(9);
            return view('home.shop',compact('author','products','authors','cats','banner','proHot'));
        }
        $cats = Category::orderBy('name','asc')->get();
        $products = $author->prods()->paginate(9);
        $proHot = Product::orderBy('id','desc')->where('status','=',1)->paginate(5);
        $authors = Author::orderBy('name', 'asc')->get();
        return view('home.shop',compact('author','products','authors','cats','banner','proHot'));
    }

    public function product($id, $slug)
    {
        $banner = Banner::orderBy('id','desc')->get();
        $product = Product::find($id);
        return view('home.product',compact('product','banner'));
    }

    public function infoAuthor($id)
    {
        $banner = Banner::orderBy('id','desc')->get();
        $author = Author::find($id);
        $authors = Author::orderBy('name', 'asc')->get();
        // dd($author->prods);
        return view('home.info_author',compact('author','authors','banner'));
    }

    // Chi tiết sản phẩm
    public function productDetail($id)
    {
        $banner = Banner::orderBy('id','desc')->get();
        $ratingAvg = Rating::where('product_id', $id)->avg('rating_start');
        $listRating = Rating::where('product_id', $id)->paginate(2);
        // dd($listRating);
        $product_image = ProductImage::where('product_id',$id)->get();
        $product_detail = Product::where('id',$id)->first();
        $product = Product::where('category_id','=',$product_detail->category_id)
                // ->join('ratings', 'product.id', '=', 'ratings.product_id')
                // ->avg('rating_start')
                ->orderBy('id','desc')->paginate(6);
        // dd($product);
        $category = $product_detail->cat;
        $author = $product_detail->author;
        return view('home.product-detail',compact('product_detail','author','category','product','product_image','ratingAvg','listRating','banner'));
    }

    public function notFound()
    {
        return view('home.not');
    }
}
