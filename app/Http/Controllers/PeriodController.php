<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeriodResource;
use App\Http\Resources\PeriodRequest;
use App\Models\Period;
use Illuminate\Http\Request;


class PeriodController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_students()
    {
        $periods = Period::with(['students']);
        return PeriodResource::collection($periods->paginate(50))->response();
    }

//--------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::with(['teacher']);
        return PeriodResource::collection($periods->paginate(50))->response();
       // return PeriodResource::collection(Period::all());
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
    public function store(Request $request)
    {
        $faker = \Faker\Factory::create(1);
        $period = Period::create([
        'name' => $faker->name,
        'teacher_id'=> $faker->randomDigit
        ]);
        return new PeriodResource($period);
    }
//--------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
      // return $period->student; 
        return new PeriodResource($period);
    }
//--------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        //
    }
//--------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        $period ->update([
            'name' => $request->input('name')
        ]);

        return new PeriodResource($period);
    }
//--------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period ->delete();
        return response(null,204);
    }
}
