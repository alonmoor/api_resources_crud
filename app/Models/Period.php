<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Studet;

class Period extends Model
{
    use HasFactory;
     protected $table = "periods";
     //protected $primaryKey = "id";

     protected $fillable = ['name','teacher_id'];

    public function teacher()
    {
      return $this->belongsTo(Teacher::class,'teacher_id');
    }


  //   public function students(){
  //     return $this->belongsToMany(Student::class);
  // }

    public function students(){
       // return $this->belongsToMany(Student::class);
       return $this->hasManyThrough(
         '\App\Models\Student',
        '\App\Models\PeriodStudent',
        'period_id',
        'id',
        'id',
        'student_id'
       );
    }

    protected $hidden =  [
            'laravel_through_key',
            'created_at' ,
            'updated_at'
    ];
}

