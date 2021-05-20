<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Period;


class StudentsController extends Controller
{
//-------------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
//-------------------------------------------------------------------------
public function listUsers(Student $student){

            $periods = Student::with('periods')->get();
            return response()->json(['message'=>null,'data'=>$periods],200);
}

//-------------------------------------------------------------------------
   public function StudentById($id){
    return response()->json(Student::get(),200);

    //$student = \App\Models\Student::find($id);
    //  return $product;
      //return new ProductResource($product);

   }
//-------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }
//-------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
//-------------------------------------------------------------------------
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        static $password;

        $faker = \Faker\Factory::create(1);
        $student = Student::create([
        'username' => $faker->name,
        'fullname' => $faker->word,
        'grade' => $faker->numberBetween(1,12),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10)
        ]);
        return new StudentsResource($student);

    }
//-------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $student = \App\Models\Student::find($id);
        return new StudentsResource($student);
        // return response()->json([
        //     'data' =>[
        //         'id' => $id,
        //         'type' => 'students',
        //         'attributes' => [
        //             'name' => $student->fullname,
        //             'created_at' => $student->created_at,
        //             'updated_at' => $student->updated_at
        //         ]
        //        ]
        //     ]);

        // $student = \App\Models\Student::find($id);
          //return $student;



    }
//-------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
//-------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student ->update([
            'username' => $request->input('username'),
            'fullname' => $request->input('fullname'),
            'grade' => $request->input('grade')
        ]);

        return new StudentsResource($student);
    }
//-------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
