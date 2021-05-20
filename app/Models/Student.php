<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Teacher;
use App\Models\Period;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $primaryKey = "id";

    protected $fillable = ['username','fullname','grade','password'];


    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }

    public function periods(){
        return $this->belongsToMany(Period::class);
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'laravel_through_key',
        'created_at',
        'updated_at'
    ];


}
