<?php

namespace App\Http\Controllers;



use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('movies.login');
    }

    public function login(Request $request){
        $credentials = $request=$request->validate(
            [
                'email' =>'required|email',
                'password' =>'required|min:3'
            ]
            );

            if(Auth::attempt($credentials)){
                session()->regenerate();
                return redirect('/movie')->with('success','Login Successfully,wlcome'.Auth::user()->name);
            }

            return back()->withErrors(
                ['email'=> 'email not faound!']
            )->onlyInput('email');

    }
            public function logout(Request $request)
            {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with('success', 'Berhasil logout!');
            }

            public function dataMovie(){
                $movies = Movie::latest()->paginate(10);
                
            }
}
