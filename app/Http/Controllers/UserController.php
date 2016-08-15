<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }
    
    public function getAdminUsers(){
        
        return view('user.getAdminUsers')->with('users',\App\User::where('usertype_id',2)->get());
    }
    
    public function getEditAdminUser($id){
        return view('user.getEditAdminUser')->with('user',\App\User::findOrFail($id));
    }
    
    public function postUpdateAdminUser(Requests\UpdateUserRequest $request, $id){
        
        $updateUser = \App\User::find($id)->update($request->all());
        
        return redirect('admin/users')->with('status','You have successfully update user');
    }
    
    public function getNewAdminUser(){
        return view('user.getNewAdminUser');
    }
    
    public function postNewUser(Requests\NewUserRequest $request){
        
        $newUser = \App\Usertype::find(2)->users()->create($request->all());
        
        return redirect('admin/users')->with('status','You have successfully insert new user');
    }
    public function getDeleteAdminUser($id){
        
        $user = \App\User::findOrFail($id);
        
        $user->delete();
        
        return redirect('admin/users')->with('status','You have successfully delete user');
    }
    
    public function getUser(){
        return view('user.getUser')->with('user',Auth::user());
    }
}
