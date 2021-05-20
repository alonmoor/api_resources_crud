<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Products;
/*
* @property integer $id
* @property integer $product_id
* @property integer $star
* @property text $review
* @property string $customer
*/

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
      'star','customer','review'
    ];

    public function product()
      {
        return $this->belongsTo(Product::class);
      }
}
