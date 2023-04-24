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
        $userForNewRole = User::find($id);

        return view('edituser', compact('userForNewRole'));
    }

    public function editUser(Request $request){
        $userWithNewRole = User::find($request->input('id'));
        $userWithNewRole->__set('role', $request->new_role);

        $userWithNewRole->save();

        return redirect('/updateusers');
    }
}