<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Image;
use DB;
use Mail;
class RegisterController extends Controller
{
   public function store(Request $request){

    $this->validate(request(), [
        'name' => 'required|max:255',
        'username' => 'required|max:255',
        'phone' => 'required|max:11',
        'dob' => 'required',
        'image' => 'required',
        'gender' => 'required',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required'
    ]);


    $user =  new User();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->phone =$request->phone;
    $user->dob =$request->dob;
    $user->gender =$request->gender;
    $user->password = Hash::make($request->password);

     if ($request->hasfile('image')) {



        $productImage = $request->file('image');
        $imageName = time().$productImage->getClientOriginalName();
        $directory = 'public/uploads/';
        $imageUrl = $directory.$imageName;

        $img=Image::make($productImage)->resize(100,100);
        $img->save($imageUrl);

         $user->image =  'public/uploads/'.$imageName;


    }


    $user->save();


    return redirect()->route('login')->with('success','Created successfully!,Now Login');


   }


   public function forgetPassword(){

    return view('user.password.forgetPassword');
   }


   public function checkEmailFromList(Request $request){

    $data = DB::table('users')->where('email',$request->email)
    ->orWhere('phone',$request->email)->count();

    return $data;





   }

   public function sendEmail(Request $request){

    $token1 = $request->dataCheck;

    $token = DB::table('users')->where('email',$token1)
    ->orWhere('phone',$token1)->value('phone');

    Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
        $message->to($request->dataCheck);
        $message->subject('Password Reset Mail');
    });

    return redirect()->route('emailSendSuccessfully')->with('success','Check Email');
   }


   public function emailSendSuccessfully(){

    return view('user.password.emailSendSuccessfully');

   }


   public function changePassword($id){
       $phone = $id;
    return view('user.password.changePassword',compact('phone'));

   }


   public function postChangePassword(Request $request){

    //dd($request->all());

    User::where('phone', $request->phone)
       ->update([
           'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success','Created successfully!,Now Login');


   }




}
