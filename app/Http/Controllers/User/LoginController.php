<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
class LoginController extends Controller
{
    public function index(){

        return view('user.login');
    }


    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function signInwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('social_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/home');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'image' => $user->getAvatar(),
                    'social_id'=> $user->id,
                    'social_type'=> 'facebook',
                    'password' => encrypt('my-facebook')
                ]);

                Auth::login($newUser);

                return redirect('/home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function callbackToGoogle()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('social_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/home');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'image' => $user->getAvatar(),
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'password' => encrypt('admin@123')
                ]);

                Auth::login($newUser);

                return redirect('/home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function store(Request $request){

        $findEmail = User::where('email', $request->logindata)->first();
        $findPhone = User::where('phone', $request->logindata)->first();
        $findUserName = User::where('username', $request->logindata)->first();

        if($findEmail){

            Auth::login($findEmail);

            return redirect('/home');

        }elseif($findPhone){

            Auth::login($findPhone);

            return redirect('/home');

        }elseif($findUserName){

            Auth::login($findUserName);

            return redirect('/home');

        }else{
            return redirect()->route('login')->with('error','Invalid Login Access');

        }
    }
}
