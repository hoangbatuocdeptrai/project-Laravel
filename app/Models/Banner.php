<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $fillable = ['image_slide','img_home_store_1','img_home_store_2','img_home_store_3','img_home_order','img_home_comment','img_shop','img_product_detail','img_cart','img_borrower','img_order','img_account'];

}
