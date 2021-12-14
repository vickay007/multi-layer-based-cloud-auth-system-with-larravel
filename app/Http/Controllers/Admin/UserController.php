<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Image;
use DB;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Users';

        $id = Auth::user()->id;

        $user = User::find($id);

        User::where('id', $id)->update(['approval_status' => 1]);

        if($user->security_state == 0){
            return redirect('/back');
        }elseif(Auth::user()->type == 1){
            $data = User::all();
            return view('admin.users.list', compact('data', 'page_name'));
        }else{
            $data = User::where('id', Auth::user()->id)->get();
            return view('admin.users.list', compact('data', 'page_name'));
        }
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
        //
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
        $page_name = 'User Edit';
        $cipher = "aes-256-cbc";

        // $re_key = $request->key;

        $iv_size = openssl_cipher_iv_length($cipher);

        $id = Auth::user()->id;
        $user = User::find($id);

        $key = $user->enc_key;
        $iv = base64_decode($user->iv);

        $user->name = decryption($key, $user->name, $cipher, $iv_size, $iv);
        $user->phone = decryption($key, $user->phone, $cipher, $iv_size, $iv);

        return view('admin.users.edit', compact('page_name', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'

        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;

        $user->save();

        // DB::table('role_user')->where('user_id', $id)->delete();
        
        // foreach($request->roles as $value){
        //     $user->attachRole($value);
        // }
        return redirect('/back/users')->with('success', 'Your Records has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/back/users')->with('success', 'User Deleted successfully');
    }

    public function approval_status($id)
    {
        // $id = Auth::user()->id;  
        $user = User::find($id);
        if($user->approval_status === 0){
            $user->approval_status = 1;
        }else{
            $user->approval_status = 0;
        }

        $user->save();
        return redirect('/back/users')->with('success', 'Approval status changed successfully');
    }
}
