<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['product_id','customer_id','message','rating_start'];

    public function prods()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function cus()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}
