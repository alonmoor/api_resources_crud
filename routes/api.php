<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeriodStudentController;
use App\Http\Resources\StudentsResource;
use App\Http\Resources\StudentsCollection;

use \App\Models\Student;
//protected routs
Route::middleware(['auth:api'])->prefix('v1')->group(function () {

  Route::get('/user',function(Request $request){
    return $request->user();
  });


  //Route::get('/students',[StudentsController::class,'index']);


  Route::get('/periods/{period}',[PeriodController::class,'show']);
  Route::get('/students/{student}',[StudentsController::class,'show']);

  //  Route::post('/periods/{period}',[PeriodController::class,'store']);
  //  Route::post('/students/{student}',[StudentsController::class,'store']);

   Route::post('/periods',[PeriodController::class,'store']);
   Route::post('/students',[StudentsController::class,'store']);

});

//get:
//http://student-api.local/api/students/1
//http://student-api.local/api/v1/students/1


Route::get('/json',function(){
$student =Student::find(1);
return new StudentsResource($student);
});


Route::get('/json2',function(){
  $students=Student::paginate(8);
  return new StudentsCollection($students);
  });




Route::get('/get_token_by_password', function (Request $request) {
//header Accept:application/json
  $http = new GuzzleHttp\Client;

  $response = $http->post('http://student-api.local/oauth/token', [
  'form_params' => [
      'grant_type' => 'password',
      'client_id' => 2,
      'client_secret' => 'Bz78qwLYXLDNRtGEMiLU2tbanB3nBvP7U7NU3brR',
      'username' => 'alonmor2@gmail.com',
      'password' => 'qwerty12',
      'scope' => '*',
  ],
]);
return json_decode((string) $response->getBody(), true);
})->name('get_token_by_password');


Route::get('/users', [UserController::class, 'index']);

//public routs
//===============Period==========================================
 Route::resource('/periods', PeriodController::class);
 Route::post('/periods/{student}/periodstudent', [PeriodController::class, 'store']);


//===============Teachers==========================================
Route::resource('teachers', TeachersController::class);
Route::get('/teachers/{period}', [TeachersController::class, 'show']);
// Route::get('/teachers', [TeachersController::class, 'index']);

//===============Student==========================================

  Route::get('/students/{student}',[StudentsController::class,'show']);
 Route::resource('/students', StudentsController::class);
 Route::post('/students/{student}', [StudentsController::class, 'store']);

