<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table = 'favorite';
    protected $fillable = ['id','customer_id','product_id'];

    public function prods()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
