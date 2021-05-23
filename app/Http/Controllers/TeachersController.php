<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeachersResource;
use App\Http\Requests\TeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Teacher;


class TeachersController extends Controller
{
//--------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //eager loading all period to the teachers
        //$teachers = Teacher::with(['periods.teacher']);

        $teachers = Teacher::with(['periods']);
        return TeachersResource::collection($teachers->paginate(50))->response();
    }
//--------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
//--------------------------------------------------------------------
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeachersResource $request)
    {
        static $password;

       // $faker = \Faker\Factory::create(1);
        $teacher = Teacher::create([
        'username' => $this->faker->name,
        'fullname' => $this->faker->word,
        'email' => $this->faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10)
        ]);
        return new TeachersResource($teacher);
    }
//--------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //lazy eager loading
        $teacher = \App\Models\Teacher::find($id);
        return (new TeachersResource($teacher->loadMissing(['periods'])))->response();
    }
//--------------------------------------------------------------------
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
//--------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, Teacher $teacher )
    {
        $teacher ->update([
            'username' => $request->input('username'),
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return new TeachersResource($teacher);
    }
//--------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = \App\Models\Teacher::find($id);
        $teacher ->delete();
        return response(null,204);
    }
}
