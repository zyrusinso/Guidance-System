<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $data = $request->validate([
                'email' => ['email', 'unique:users'],
                'name' => ['required'],
                'password' => ['required'],
            ]);

            if ($data->fails()) {
                return response()->json(['success'=>false,'error'=>$data->errors()->all()]);
            }

            if($request->input('is_admin') == 1){
                User::create([
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'is_admin' => $request->is_admin,
                    'password' => $data['password'] 
                ]);
                return redirect(route('user.index'));
            }

            User::create([
                'email' => $data['email'],
                'name' => $data['name'],
                'password' => $data['password'] 
            ]);
            return response()->json(['success'=>true, 'message'=>'Successfully added']);

        } catch (Throwable $ex) {

            DB::rollBack();
            Log::critical($ex);
            return response()->json([
                'success' => false,
                'message' => 'System Failed! please contact the developer to fix this problem!', 
            ], 500);
        }
        DB::commit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.show', compact('user'));
    }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $data = $request->validate([
            'email' => ['required','min:10'],
            'name' => ['required','min:3']
        ]);
        if($request->input('password') != ""){
            $data += ['password' => Hash::make($request->input('password'))];
            $user->update($data);
            return redirect()->back()->with(['success' => true]);
        }
        $user->update($data);
        return redirect()->back()->with(['success' => true]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect(route('user.index'));
    }
}
