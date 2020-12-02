<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GfuController extends Controller
{

    public function index(Request $request)
    {
        return view('welcome');
    }
}
