<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('users', compact('user'));
    }

    public function updateindex(){
        $updateUsers = User::all();
        return view('updateusers', compact('updateUsers'));
    }

    public function update($id){
        $userWithNewRole = User::find($id);
        $userWithNewRole->role = "Profesor";

        $userWithNewRole->save();

        return redirect('/dashboard');
    }
}