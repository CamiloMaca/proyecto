<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name'=>'required|max:10',
            'email'=>'required|max:20',
            'password'=>'required|min:5',
        ]);

        $user = User::create($request->all());
        return response()->json($user);
    }

    public function index(){

        $users = User::all();
        return response()->json($users);
    }

    public function show($id){

        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function update(Request $request, User $user){

        $request->validate([
            'name'=>'required|max:10',
            'email'=>'required|max:20',
            'password'=>'required|min:5',
        ]);

        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy(User $user){

        $user->delete();
        return response()->json($user);
    }
}
