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

        $user->name = request('name');
        $user->save();

        return redirect(route('user.update'))->with('status', 'Success!');
    }
}
