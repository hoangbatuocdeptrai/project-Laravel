<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\Blog\BlogAddRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;


class AdminBlogController extends Controller
{
    public function index()
    {

        $blog = Blog::search()->paginate(5);
        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(BlogAddRequest $request)
    {
        $image = $request->image->getClientOriginalName();
        $request->image->move(public_path('upload'), $image);
        $data = [
            'name' => $request->name, 
            'news' => $request->news,
            'image' => $image,
            'status' => $request->status
        ];
        if(Blog::create($data)){
            return redirect()->route('admin.blog.index')->with('yes','Thêm mới thành công');
        }else{
            return redirect()->back()->with('no','Thêm mới không thành công');
        }
    }

    public function edit($id, Request $reqest)
    {
        $blogs = Blog::where('id', $id)->first();
        return view('admin.blog.edit', compact('blogs'));
    }

    public function update($id, Request $request)
    {
        $blogs = Blog::find($id);
        $image = $blogs->image;
        if($request->has('upload')){
            $image = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('upload'), $image);
        }
        $request->merge(['image' => $image]);
        $data = [
            'name' => $request->name, 
            'news' => $request->news,
            'image' => $image,
            'status' => $request->status
        ];
        
        if($blogs->update($data)){
            return redirect()->route('admin.blog.index')->with('yes','Cập nhật thành công');
        }else{
            return redirect()->back()->with('no','Cập nhật thất bại');
        }

    }

    public function destroy($id)
    {
        $blogs = Blog::find($id);
        if($blogs->delete()){
            return redirect()->route('admin.blog.index')->with('yes', 'Đã xóa thành công');
        }
        return redirect()->back()->with('no', 'Xóa không thành công');
    }
}
