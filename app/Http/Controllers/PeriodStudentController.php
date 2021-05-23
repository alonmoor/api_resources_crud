<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PeriodStudentResource;
use \App\Models\Period;
use \App\Models\Student;


class PeriodStudentController extends Controller
{


//-----------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Period $period)
    {

            $students = $period->students;
            return response()->json(['message'=>null,'data'=>$students],200);

    }
//-----------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
//-----------------------------------------------------------------
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student , Period $period )
    {

        $periods[] = $request->input('periods');

        static $password;

        $faker = \Faker\Factory::create(1);
        $student = Student::create([
        'username' => $faker->name,
        'fullname' => $faker->word,
        'grade' => $faker->numberBetween(1,12),
        'password' => $password ?: $password = bcrypt('secret')
        ]);


    //    $student->periods()->attach($periods);

     $student->periods()->attach($request->input('period_id'));

       // $student = Student::find($request->input('student_id'));


        // $student = Period::firstOrCreate(
        //     [
        //       'student_id' => $request->student()->id,
        //       'period_id' => $period->id,
        //     ],

        //   );
        //  return new PeriodStudentResource($student);


    }
//-----------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
//-----------------------------------------------------------------
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
//-----------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
//-----------------------------------------------------------------
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
