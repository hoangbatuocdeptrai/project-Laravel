<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerDetail extends Model
{
    use HasFactory;
    protected $table = 'borrower_detail';
    public $timestamps = false;
    protected $fillable = ['loan_card_id','product_id','quantity','	total_price','content'];

    public function prod(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
