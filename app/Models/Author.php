<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Author extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'author';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'status','image','description'];
    
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
        return $this->hasMany(Product::class,'author_id','id');
    }
}
