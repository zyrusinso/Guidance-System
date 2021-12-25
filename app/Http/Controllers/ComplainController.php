<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complains = Complain::all();
        return view('complain.index', compact('complains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complain.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $data = [
                'stud_num' => $request->stud_num,
                'stud_name' => $request->stud_fname.$request->stud_lname,
                'offense_title' => $request->offense_title,
                'offense_desc' => $request->offense_desc
            ];

            Complain::Create($data);

        } catch (Throwable $ex) {

            DB::rollBack();
            Log::critical($ex);
            return response()->json([
                'success' => false,
                'message' => 'System Failed! please contact the admin to fix this problem!', 
            ], 500);
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Successfully Added!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function show(Complain $complain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function edit(Complain $complain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complain $complain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complain $complain)
    {
        //
    }
}
