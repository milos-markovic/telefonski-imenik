<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

class AddressController extends Controller
{
    function __construct() {
        
        $this->middleware('auth',['except' => [
            'getAddress'
        ]]);
    }
    public function index()
    {
        return view('address.getAddress');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.getNewAddress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\NewAddressRequest $request)
    {
        $newAddress = Auth::user()->address()->create($request->all());
        
        return redirect('address')->with('status','You have successfully insert the new address');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('address.getEditAddress')->with('address',  \App\Address::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\NewAddressRequest $request, $id)
    { 
        $updateAddress = \App\Address::find($id)->update($request->all());
        
        return redirect('address')->with('status','You have successfully update address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id){
        
        $address = \App\Address::findOrFail($id);
        
        $deleteAddress = $address->delete();
        
        return redirect('address')->with('status','You have successfully delete address');
    }
    public function getAddress(Request $request){
        
        if($request->ajax()){
            
           $lastName = $request->lastName;
           
           $address =  Auth::user()->address()->where('lastName','LIKE',"$lastName%")->get();
          // var_dump($address);
           return $address;
        }
    }
    public function getSendEmail($id){
        
        $address = \App\Address::find($id);
        
        return view('address.getSendEmail')->with('address', $address);
    }
    public function postSendEmail(Requests\SendMailRequest $request, $id){
        
        $user = \App\Address::find($id);
        $user->message = $request->message;
        $user->subject = $request->subject;

        
        Mail::send('email.sendEmail', ['user' => $user], function ($m) use ($user) {
            //$m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->firstName)->subject($user->subject);
        });
        
        return redirect('address')->with('status','You email has been sent!');
    }
}
