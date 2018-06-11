<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\NewUserRequest;

class AdminController extends Controller
{
    
    function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = \App\Usertype::find(1)->users;
 
        return view('admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\NewUserRequest $request)
    {
        $newAdmin = \App\Usertype::find(1)->users()->create($request->all());
        
        return redirect()->route('admins.index')->with('status','You have successfully insert new admin user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = \App\User::find($id);
                
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        
        $updateAdmin = \App\User::find($id)->update($request->all());
        
        return redirect()->route('admins.index')->with('status','You have successfully update admin user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = \App\User::findOrFail($id);
        
        $admin->delete();
        return redirect()->route('admins.index')->with('status','You have successfully delete admin user');
    }
    
    public function users(){
        
        $users = \App\Usertype::find(2)->users;
        
        return view('admin.users',compact('users'));
    }
    
    public function editUser($id){
                
        $user = \App\User::find($id);
        
        return view('admin.editUser',compact('user'));
    }
   
    public function updateUser(UpdateUserRequest $request, $id){
        
       $user = \App\User::find($id)->update($request->all());
       
       return redirect('admin/users')->with('status','You have successfully update user');
    }
  
    public function createUser(){
        
        return view('admin.createUser');
    }
    
    public function storeUser(NewUserRequest $request){
        
        $create = \App\Usertype::find(2)->users()->create($request->all());
        
        return redirect('admin/users')->with('status','You have successfully insert new user');
    }
    
    public function destroyUser($id){
        
        \App\User::find($id)->delete();
        
        return redirect('admin/users')->with('status','You have successfully delete User');
    }
}
