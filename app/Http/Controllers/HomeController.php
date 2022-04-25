<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\User;
use App\Models\Teacher;
use App\Models\StudProfile;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'complains' => $this->complains(),
            'users' => $this->users(),
            'teachers' => $this->teachers(),
            'students' => $this->students(),
        ]);
    }

    public function complains(){
        return Complain::all();
    }
    public function users(){
        return User::all();
    }
    public function teachers(){
        return Teacher::all();
    }
    public function students(){
        return StudProfile::all();
    }
}
