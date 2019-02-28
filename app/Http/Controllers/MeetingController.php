<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meeting\StoreRequest;
use App\Models\Candidate;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Meeting::where('manager_id', Auth::id())
            ->load('candidate', 'manager'));
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
        //Проверить свободно ли время

        //Создать кондидата
        $candidate = new Candidate;
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->phone_number = $request->input('phone_number');
        $candidate->save();

        //Создать запись
        $meeting = new Meeting;
        $meeting->candidate_id = $candidate->id;
        $meeting->manager_id = $request->input('manager_id');
        $meeting->start = $request->input('start');
        $meeting->finish = $request->input('finish');
        $meeting->save();

        return response()->json($meeting->load('candidate', 'manager'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        return response()->json($meeting->load('candidate', 'manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        try {
            $meeting->delete();
        } catch (\Exception $exception) {
            return response(['success' => false, 'error' => $exception->getMessage()]);
        }
        return response()->json(true);
    }
}
