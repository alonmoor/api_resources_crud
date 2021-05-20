<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;
use App\Models\Period;


class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password'
    ];

    protected $table = "teachers";
    protected $primaryKey = "id";

    public function periods(){
        return $this->hasMany(Period::class,'teacher_id');
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }


   /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


}
