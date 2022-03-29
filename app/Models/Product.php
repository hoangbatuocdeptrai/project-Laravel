<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Auth;
class Product extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'product';
    protected $fillable = ['name','status','price','sale_price','image','description','category_id','author_id'];

    // 1 product có 1 danh mục
    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function rat()
    {
        return $this->hasMany(Rating::class,'product_id','id');
    }

    public function author()
    {
        return $this->hasOne(Author::class,'id','author_id');
    }
    public function wl()
    {
        return $this->hasOne(Wishlist::class,'product_id','id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function check_in_favorite(){
        $customer = Auth::guard('kh')->user();
        $data = ['customer_id'=>$customer->id,'product_id'=>$this->id];
        Favorite::where($data)->count() > 0;
        return Favorite::where($data)->count();
    }

    public function scopeSearch()
    {
        if(request()->keyword){
            $key = request()->keyword;
            return $this->where('name','like','%'.$key.'%');
        }
        return $this;
    }

    protected $hidden = ['updated_at', 'category_id', 'created_at', 'description'];
}