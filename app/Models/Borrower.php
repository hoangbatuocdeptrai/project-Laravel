<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;
    protected $table = 'loan_card';
    protected $fillable = ['customer_id','name','email','phone','address','status','total_price','content','id_card','quantity','token','end_date'];

    public function details(){
        return $this->hasMany(BorrowerDetail::class,'loan_card_id','id');
    }
    public function cus(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function scopeSearch()
    {
        if(request()->keyword){
            $key = request()->keyword;
            return $this->where('name','like','%'.$key.'%');
        }
        return $this;
    }
}
