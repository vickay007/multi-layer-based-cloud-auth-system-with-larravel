<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\otpNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;
use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Role;
use Image;
use DB;

class DashboardController extends Controller
{
    public function index()

    {
        $enc_key = Auth::user()->enc_key;
        return view('admin.aes_key', compact('enc_key'));
    }   
    

    public function enc_key()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    

}
