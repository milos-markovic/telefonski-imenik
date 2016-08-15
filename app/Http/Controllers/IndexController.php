<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class IndexController extends Controller
{
    public function getIndex(){
        return view('index.getIndex')->with('address',  \App\Address::all());
    }
    public function getSendEmail($id){
        
        $address = \App\Address::find($id);
        
        return view('index.getSendEmail')->with('address', $address);
    }
    public function postSendEmail(Requests\SendMailRequest $request, $id){
        
        $user = \App\Address::find($id);
        $user->message = $request->message;
        $user->subject = $request->subject;

        
        Mail::send('email.sendEmail', ['user' => $user], function ($m) use ($user) {
            //$m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->firstName)->subject($user->subject);
        });
        
        return redirect('/')->with('status','You email has been sent!');
    }
}
