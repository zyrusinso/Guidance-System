<?php

namespace App\Http\Controllers;

use App\Models\StudProfile;
use App\Models\Complain;
use Illuminate\Http\Request;

class StudProfileController extends Controller
{
    public function index()
    {
        $students = StudProfile::all();

        return view('studentProfile.index', compact('students'));
    }
    
    public function studentProfile($stud_num){
        $students = StudProfile::where('stud_num', '=', $stud_num)->first();
        if($students == null){
            return response()->json([
                'success' => false,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $students
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudProfile  $StudProfile
     * @return \Illuminate\Http\Response
     */
    public function show(StudProfile $StudProfile, $id)
    {
        $student = StudProfile::where('id', $id)->first();
        $offenseHistories = Complain::where('stud_num', $student->stud_num)->latest()->get();

        $offenseBagde = [
            '1' => 'badge-success',
            '2' => 'badge-warning',
            '3' => 'badge-danger'
        ];

        return view('studentProfile.show', compact('student', 'offenseHistories', 'offenseBagde'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudProfile  $StudProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(StudProfile $StudProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudProfile  $StudProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudProfile $StudProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudProfile  $StudProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudProfile $StudProfile)
    {
        //
    }
}
