<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\softDeletes;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','news', 'image','status'];
    
    
    public function scopeSearch()
    {
        if(request()->keyword){
            $key = request()->keyword;
            return $this->where('news','like','%'.$key.'%');
        }
        return $this;
    }

}






?>