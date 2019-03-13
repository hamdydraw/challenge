<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use Auth;


class ProviderController extends Controller
{
  /**
   * 
   * add new provider
   */
    public function create()
    {
        return view('provider.register');
    }
/**
 * save new provider
 */
    public function registerProvider(Request $request)
    {
      $this->validate($request, [
       'email'=> 'required|unique:users|email|max:255',
       'name'=>  'required',
       'password'=> 'required|min:6|confirmed'
    ]); 


    Provider::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password)
    ]);
      return redirect()->intended('/home/provider');
    }

    public function loginProvider()
    {
        return view('provider.login');
    }
/**
 * 
 * login provider checker
 */
    public function providerAuth(Request $request)
   {
           $this->validate($request, [
        'email'=>'required|email',
        'password'=>'required'
   ]);
     $email = $request->email;
     $password = $request->password;
     $remember = $request->remember;

     if(Auth::guard('admin')->attempt(['email'=> $email, 'password'=> $password], $remember)){
       return redirect()->intended('/home/provider');
      } else {
         return redirect()->back()->with('warning', 'Invalid Email or Password');
      }
    }
/**
 * 
 * provider homepage
 */
  public function home()
  { 
    return view('provider');
  }
/**
 * 
 * provider logout
 */
  public function logout()
  {
    Auth::guard('admin')->logout();

    return redirect('/login/provider'); 
  }


}
