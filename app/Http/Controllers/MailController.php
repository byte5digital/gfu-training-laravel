<?php

namespace App\Http\Controllers;

use App\Jobs\sendMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendTestMail(Request $request){
        $details = ['email' => $request->email];

        sendMail::dispatch($details);

        return redirect(route('mail.form'));
    }

    public function showForm(){
        return view('mail.form');
    }
}
