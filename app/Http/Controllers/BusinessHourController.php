<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessHour\StoreRequest;
use App\Models\BusinessHour;
use App\Models\Manager;
use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = Manager::where('user_id', Auth::id())->first();
        return response()->json(BusinessHour::where('manager_id', $manager->id)
            ->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $request->start);
        $finish = Carbon::createFromFormat('Y-m-d H:i:s', $request->finish);

        $manager = Manager::where('user_id', Auth::id())->first();

        //Проверить, свободно ли время
        $notFree = Meeting::where('manager_id', $manager)
            ->whereBetween('start', [$start, $finish])
            ->get();

        if ($notFree->count() != 0)
            return response()->json(false);

        //Создать запись
        $businessHour = new BusinessHour();
        $businessHour->manager_id = $manager;
        $businessHour->start = $start;
        $businessHour->finish = $finish;
        $businessHour->duration = $request->input('duration');
        $businessHour->venue = $request->input('venue');
        $businessHour->save();

        return response()->json($businessHour);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessHour  $businessHour
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessHour $businessHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessHour  $businessHour
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessHour $businessHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessHour  $businessHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessHour $businessHour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessHour  $businessHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessHour $businessHour)
    {
        //
    }
}
