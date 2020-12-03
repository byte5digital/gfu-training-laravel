<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit(){
        $user = User::findOrFail(auth()->user()->id);

        return view('auth.edit', compact('user'));
    }

    public function update(Request $request){
        $user = User::findOrFail(auth()->user()->id);

        $this->validateUser();

        $user->name = request('name');
        $user->save();

        return redirect(route('user.edit'))->with('status', 'Success!');
    }

    public function validateUser(){

        return request()->validate([
            'name' => ['required', 'string', 'min:3']
        ]);
    }
}
