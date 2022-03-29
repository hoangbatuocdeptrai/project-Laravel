<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\softDeletes;

class Customer extends Authenticatable
{
    use softDeletes;
    use HasFactory, Notifiable;
    protected $table='customer';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'image',
        'password',
        'token',
        'status',
        'code',
        'status_code',
        'lasted_login',
    ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'customer_id','id');
    }
    public function cont()
    {
        return $this->hasMany(Contact::class,'customer_id','id');
    }

    public function borrowers()
    {
        return $this->hasMany(Borrower::class,'customer_id','id');
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class,'customer_id','id');
    }
}
