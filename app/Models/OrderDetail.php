<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable = ['order_id','product_id','price','quantity'];

    public function prod(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
