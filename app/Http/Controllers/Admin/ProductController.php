<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductAddRequest;
use App\Http\Requests\Product\ProductUpdateRequest;

class ProductController extends Controller
{

    public function index()
    {
        $data = Product::search()->orderBy('id','desc')->paginate(5);
        return view('admin.product.index',compact('data'));
    }

    public function create()
    {
        $cats = Category::orderBy('name','ASC')->get();
        $ats = Author::orderBy('name','ASC')->get();
        return view('admin.product.create',compact('cats','ats'));
    }

    public function store(ProductAddRequest $request)
    {
        $image = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'),$image);
        $request->merge(['image' => $image]);
        $data = $request->only('name','price','sale_price','image','description','category_id','author_id','status','author_id');
        // dd($data);
        if($product = Product::create($data)){
            if($request->has('uploads')){
                foreach($request->uploads as $file){
                    $image_name = $file->getClientOriginalName();
                    ProductImage::create([
                        'image' => $image_name,
                        'product_id' => $product->id
                    ]);
                    $file->move(public_path('uploads'),$image_name);
                }
            }
            return redirect()->route('product.index')->with('yes','Thêm mới thành công');
        }else{
            return redirect()->back()->with('no','Thêm mới không thành công');
        }
    }

    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $cats = Category::orderBy('name', 'ASC')->get();
        $images = ProductImage::where('product_id',$id)->get();
        $author = Author::orderBy('name', 'ASC')->get();
        return view('admin.product.edit', compact('cats','product','images','author'));
    }

    public function update(ProductUpdateRequest $request,$id)
    {
        $product = Product::find($id);
        $image = $product->image;           //lấy ảnh cũ
        if($request->has('upload')){        //nếu có file đc chọn trên form
            $image = $request->upload->getClientOriginalName(); //lấy lại tên file mới
            $request->upload->move(public_path('uploads'),$image); //upload
        }
        $request->merge(['image' => $image]);
        $data = $request->only('name','price','sale_price','image','description','category_id','author_id','status','author_id');
        if($product->update($data) || Product::where('id',$id)->update($data)){
                if($request->has('uploads')){
                    foreach($request->uploads as $file){
                        $image_name = $file->getClientOriginalName();
                        ProductImage::create([
                            // 'name' => $image_name,
                            'image' => $image_name,
                            'product_id' => $product->id
                        ]);
                        $file->move(public_path('uploads'),$image_name);
                    }
                }
            return redirect()->route('product.index')->with('yes','Cập nhật thành công');
        }else{
            return redirect()->back()->with('no','Cập nhật không thành công');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->delete()){
            return redirect()->route('product.index')->with('yes','Xóa thành công');
        }else{
            return redirect()->back()->with('no','Xóa không thành công');
        }
    }
    public function deleteImage($id)
    {
        ProductImage::where('id',$id)->delete();
        return redirect()->back()->with('yes','Xóa thành công');
    }

    public function trashed()
    {
        $data = Product::onlyTrashed()->paginate(5);
        return view('admin.product.trashed', compact('data'));
    }

    public function restore($id)
    {
        $data = Product::withTrashed()->find($id);
        if($data->restore()){
            return redirect()->route('product.index')->with('yes', 'Khôi phục sản phẩm thành công');
        }
        return redirect()->back()->with('no', 'Khôi phục sản phẩm không thành công');
    }

    public function forcedelete($id)
    {
        $data = Product::withTrashed()->find($id);
        if($data->forceDelete()){
            return redirect()->route('product.trashed')->with('yes', 'Xóa sản phẩm thành công');
        }
        return redirect()->back()->with('no', 'Xóa sản phẩm không thành công');
    }
}