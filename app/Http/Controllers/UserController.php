<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         session(['form' => 'register']);
        $user = new User();

        $user->username = request('username');
        $user->password = Hash::make(request('password'));
        $user->email = request('email');

        $messages = [
            'username.required' => 'Zadejte jméno',
            'email.required' => 'Zadejte email',
            'username.unique' => 'Jméno již existuje',
            'email.unique' => 'Email již existuje',
            'email.email' => 'Chybny email',
            'password.min' => 'Heslo musí obsahovat minimálně 6 znaků'
          ];

        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6'
        ],$messages);

        $user->save();
        return back()->with('registermsg',"Odesláno");
    }
 public function lougout(){
                    Auth::logout();
                    return redirect('/test');
                }

public function admin_redirect(){
return view('admin');
}
public function register_redirect(){
return view('register');
}
public function change_password(Request $request){
    $messages = [
        'password.required' => 'Zadejte staré heslo',
        'newpassword.required' => 'Zadejte nové heslo',
        'newpasswordagain.required' => 'Zadejte nové heslo znovu'
      ];

    $request->validate([
        'password' => 'required',
        'newpassword' => 'required',
        'newpasswordagain' => 'required'
    ],$messages);

    $current_password = Auth::User()->password;
    if(Hash::check(request('password'), $current_password)){
        $user_id = Auth::User()->id;
        $user = User::find($user_id);
        $user->password = Hash::make(request('newpassword'));
        $user->save();
    }
    return redirect('/dashboard')->with('msg','Heslo změněno');

}
public function change_icon(){

}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
