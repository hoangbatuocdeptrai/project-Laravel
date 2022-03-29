<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryAddRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $cats = Category::Search()->paginate(5);
        return view('admin.category.view',compact('cats'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryAddRequest $request)
    {
        // dd($request->all());
        if(Category::create($request->all())){
            return redirect()->route('category.index')->with('yes','Thêm mới thành công');
        }else{
            return redirect()->back()->with('no','Thêm mới không thành công');
        }
    }

    public function edit($id,Request  $request)
    {
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    public function update($id,CategoryUpdateRequest $request)
    {
        $data = $request->only('name','status');
        $category = Category::find($id);
        if($category->update($data) || Category::where('id',$id)->update($data)){
            // dd($data);
            return redirect()->route('category.index')->with('yes','Cập nhật thành công');
        }else{
            return redirect()->back()->with('no','Cập nhật thất bại');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->prods->count() == 0 && $category->delete()){
            return redirect()->route('category.index')->with('yes','Đã đưa vào thùng rác');
        }else{
            return redirect()->back()->with('no','Đưa vào thùng rác không thành công');
        }
    }

    public function trashed()
    {
        $cats = Category::onlyTrashed()->paginate(5);
        return view('admin.category.trashed', compact('cats'));
    }
    
    public function restore($id)
    {

        $cats = Category::withTrashed()->find($id);
        if($cats->restore()){
            return redirect()->route('category.index')->with('yes','khôi phục thành công');
        }
        return redirect()->back()->with('no','khôi phục không thành công');
        
        
    }
    public function forcedelete($id)
    {
        $cats = Category::withTrashed()->find($id);
        if($cats -> forceDelete()){
            return redirect()->route('category.index')->with('yes','Đã xóa vĩnh viễn');
        }
        return redirect()->back()->with('no','Xóa không thành công');
        
    }
}
