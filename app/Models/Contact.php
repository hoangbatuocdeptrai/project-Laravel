<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = ['name','email','phone','image','message','customer_id'];

    public function cus()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}
