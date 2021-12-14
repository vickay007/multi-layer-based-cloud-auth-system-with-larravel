<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;
use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Role;
use Image;
use DB;

class UserLoginController extends Controller
{
     public function home()

    {
        $page_name = 'Security Question';

        $id = Auth::user()->id;

        $user = User::find($id);
    	
    	if(Auth::user()->approval_status == 0){
    		return view('admin.login.security', compact('user', 'page_name'));
    	}else{
            return view('admin.login.security', compact('user', 'page_name'));
    	}
    }

    public function sendMail($user_email, $code)
    {
        $email_message = "Here is the Otp/Remote access code: $code";

        $messageData = ['user' => $user_email, 'code'=> $code, 'email_message' => $email_message];

        Mail::send('email', $messageData, function($message) use ($user_email){
            $message->to($user_email)->subject('Otp/Remote access verification code');
        });

    }

    public function sec_question(request $request)

    {
        $this->validate($request, [
            'security_question' => 'required',
        ]);

        $id = Auth::user()->id;

        $user = User::find($id);
        
        $sec_field = $request->security_question;
        
        if($user->security_question == $sec_field){

            $user_email = Auth::user()->email;

            $otp = rand(100000, 999999);

            User::where('id', $id)->update(['otp' => $otp]);

            User::where('id', $id)->update(['security_check' => 1]);

            $this->sendMail($user_email, $otp);

            return redirect('/back/login/otp');
        }else{
            return redirect('/back/login/security_question')->with('error', 'Invalid Security Answer Given');
        }
    }

    public function otp()

    {

        $id = Auth::user()->id;

        $user = User::find($id);

        if($user->security_check == 0){
            return redirect('/back/login/otp')->with('error', 'Please Provide Security Credentials');
        }

        $page_name = 'Please Enter OTP sent to your email';

        return view('admin.login.otp', compact('page_name'));
    }

    public function otp_check(request $request) 
    {
        $this->validate($request, [
            'otp' => 'required',
        ]);

        $id = Auth::user()->id;

        $user = User::find($id);

        $user_email = Auth::user()->email;

        $enc_key = Auth::user()->enc_key;
        
        $otp = $request->otp;

        if($user->otp == $otp){

            $access_token = ['23.208.31.255', '14.137.175.255', '31.13.155.234'];

            $token = Arr::random($access_token);        
                
            User::where('id', $id)->update(['remote_token' => $token]);
            User::where('id', $id)->update(['security_check' => 2]);

            $this->sendMail($user_email, $token);

            return redirect('back/login/remote_access');
            // return view('admin.login.aes_key', compact('enc_key'));
        }else{
            return redirect('/back/login/otp')->with('error', 'Invalid Otp');
        }
    }


    public function remote_access()
    {
        $id = Auth::user()->id;

        $user = User::find($id);

        if($user->security_check == 1){
            return redirect('/back/login/otp')->with('error', 'Please Provide Your Security Credentials');
        }

        $page_name = 'Please Enter remote access token';

        return view('admin.login.remote_access', compact('page_name'));
    }

    public function remote_check(request $request)
    {
        $this->validate($request, [
            'remote_token' => 'required',
        ]);

        $id = Auth::user()->id;

        $user = User::find($id);

        $roles = Role::where('id', 2)->pluck('name', 'id');

        $remote_access = $request->remote_token;

        if(Auth::user()->approval_status == 0 && Auth::user()->remote_token == $remote_access){

            User::where('id', $id)->update(['security_state' => 1]);

            return view('admin.dashboard_2', compact('user', 'roles'));

        }elseif (Auth::user()->approval_status == 1 && Auth::user()->remote_token == $remote_access

        ) {
            User::where('id', $id)->update(['security_state' => 1]);

             return redirect('/back/users');

        }else{
            return redirect('/back/login/remote_access')->with('error', 'Invalid Token Entered');
        }
        
    }
    

    public function dcrypt(Request $request)
    {
    	$page_name = 'Profile';

        $cipher = "aes-256-cbc";

        // $re_key = $request->key;

        $iv_size = openssl_cipher_iv_length($cipher);

        $id = Auth::user()->id;
        $user = User::find($id);

        $key = $user->enc_key;
        $iv = base64_decode($user->iv);

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->department = $request->department;
        // $user->phone = $request->phone;
        // $user->image = '';
        // $user->save();

        // $file = $request->file('image');
        // $extension = $file->getClientOriginalExtension();
        // $image = 'user_img' . $user->id . '.' . $extension;

        // Image::make($file)->resize(122,122)->save(public_path('/user_img/'. $image));

        // $user->image = $image;

        // $user->save();

        if($request->d_key != $key){
            return Redirect()->back()->with('error', 'Invalid Encryption key');
            // return view('admin.profile.index', compact('page_name', 'user'))->withErrors(["errors"=>"Invalid encryption key"]);
        }else{
            DB::table('role_user')->where('user_id', $id)->delete();
        
            foreach($request->roles as $value){
                $user->attachRole($value);
            }

            $user->name = decryption($key, $user->name, $cipher, $iv_size, $iv);
            $user->phone = decryption($key, $user->phone, $cipher, $iv_size, $iv);
            $user->email = $user->email;

            // dd($user->name);

            return view('admin.login.decrypt', compact('page_name', 'user'));
        }
        // return Redirect()->back()->with('success', 'Your Records has been Updated successfully');

    }
}
