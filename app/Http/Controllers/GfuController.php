<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GfuController extends Controller
{

    public function index(Request $request)
    {
        return view('gfu.welcome');
    }

    public function apiReponse(Request $request)
    {
        return response()->json(['test' => 'Hallo zusammen'], 403);
    }
}
