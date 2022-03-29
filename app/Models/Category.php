<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'category';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'status'];
    
    public function scopeSearch()
    {
        if(request()->keyword){
            $key = request()->keyword;
            return $this->where('name','like','%'.$key.'%');
        }
        return $this;
    }
    public function prods()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
