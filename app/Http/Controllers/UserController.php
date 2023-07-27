<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Read all users
    public function getAllUser(){
        $users = User::all();
        return response()->json(['status' => true, 'users' => $users], 200);
    }

    // Create user
    public function createUser(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->note = $request->note;
        $user->save();

        return response()->json(['status' => true, 'user' => $user], 201);
    }

    // Update User
    public function updateUser(Request $request, $id){

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->note = $request->note;
        $user->save();

        return response()->json(['status' => true, 'user' => $user], 200);
    }

    // Delete User
    public function deleteUser(Request $request, $id){

        // restore data count we deleted
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['status' => true], 200);
    }
}
