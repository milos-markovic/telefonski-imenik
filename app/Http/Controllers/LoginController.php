<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getLogin(){
        
        return view('login.getLogin');
    }
    public function postLogin(Request $request){
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            if(Auth::user()->usertype->name == 'admin'){
                return redirect()->route('admins.index');
            }elseif(Auth::user()->usertype->name == 'user'){
                return redirect('users');
            }
        }
        return redirect()->back();
    }
    public function getLogout(){
        
        Auth::logout();
        
        return redirect('login');        
    }
    public function getRegister(){
        return view('login.getRegister');
    }
    public function postRegister(Requests\RegisterRequest $request){
        
        $registerUser = \App\Usertype::find(2)->users()->create($request->all());
        
        Auth::login($registerUser);
        
        return redirect('user')->with('status','You have successfully registered');
    }
}
