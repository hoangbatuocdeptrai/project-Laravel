<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\Author\AuthorAddRequest;
use App\Http\Requests\Author\AuthorUpdateRequest;

class AuthorController extends Controller
{

    public function index()
    {
        $author = Author::Search()->paginate(5);
        return view('admin.author.view',compact('author'));
    }

    public function create()
    {
        return view('admin.author.create');
    }
    public function store(AuthorAddRequest $request)
    {
        $image = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $image);
        $request->merge(['image' => $image]);
        $data = $request->only('name', 'status','image','description');
        // dd($data);
        if(Author::create($data)){
            return redirect()->route('author.index')->with('yes','Thêm mới thành công');
        }else{
            return redirect()->back()->with('no','Thêm mới không thành công');
        }
    }
    public function edit($id,Request  $request)
    {
        $author = Author::where('id',$id)->first();
        return view('admin.author.edit',compact('author'));
    }
    public function update($id,AuthorUpdateRequest $request)
    {
        $author = Author::find($id);
        $image = $author->image;
        if($request->has('upload')){
            $image = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('uploads'), $image);
        }
        $request->merge(['image' => $image]);
        $data = $request->only('name','status','image','description');
        // dd($data);
        if($author->update($data) || Author::where('id',$id)->update($data)){
            return redirect()->route('author.index')->with('yes','Edit thành công');
        }else{
            return redirect()->back()->with('no','Edit không thành công');
        }
    }
    public function destroy($id)
    {
        $author = Author::find($id);
        if($author->prods->count() == 0 && $author->delete()){
            return redirect()->route('author.index')->with('yes','Xóa thành công');
        }else{
            return redirect()->back()->with('no','Đã thêm vào thùng rác');
        }
    }

    public function trashed()
    {
        $author = Author::onlyTrashed()->paginate(5);
        return view('admin.author.trashed', compact('author'));
    }
    
    public function restore($id)
    {
        $author = Author::withTrashed()->find($id);
        $author->restore();
        return redirect()->back()->with('yes','Khôi phục thành công');
    }

    public function forcedelete($id)
    {
        $author = Author::withTrashed()->find($id);
        $author->forceDelete();
        return redirect()->back()->with('yes','Đã xóa vĩnh viễn');
    }
}
