<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class LoginUserController extends Controller
{
    public function redirect(){
        If(Auth::check()){
            return redirect('/');
            }
            else return view('login');
    }


    public function doLogin(Request $request){
        session(['form' => 'login']);
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];
        $messages = [
            'username.required' => 'Zadejte jméno',
            'password.required' => 'Zadejte heslo',
          ];
      $request->validate([
            'username'   => 'required',
            'password'  => 'required'
           ],$messages);

                If (Auth::attempt($credentials)) {
                    If(Auth::user()->username=='admin'){
                    return redirect('/admin');
                    }
                    else return back();
                }
                else return back()-> with('loginerror','Chybné přihlašovací údaje');

    }
}
