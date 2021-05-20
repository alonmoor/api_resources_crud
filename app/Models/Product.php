<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\User;
use App\Models\Review;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','detail','stock','price','discount'
    ];

    protected $table = "products";
    protected $primaryKey = "id";


    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
