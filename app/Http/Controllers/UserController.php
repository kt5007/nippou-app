<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $auth_user = Auth::user();
        return view('user.index',compact('auth_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(Request $request)
    {
        //
        $auth_user = Auth::user();
        return view('user.edit',compact('auth_user'));
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
        $auth_user = Auth::user();
        // Validator check
        $rules = [
            'name' => ['required', 'max:100'],
            'email' => ['required'],
            'password' => ['required','confirmed','min:8'],
        ];
        $messages = [
            'name.required' => '名前が未記入です',
            'name.max' => '100字以下でお願いします',
            'email.required' => 'メールアドレスが未記入です',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
            -> route('user.edit',[$auth_user])
            ->withErrors($validator)
            ->withInput();
        }

        $users = DB::table('users');
        $name = $request->get('name');
        $email = $request->get('email');
        $hashed_password = bcrypt($request->get('password'));
        $uploadfile = $request->file('thumbnail');

        if(!empty($uploadfile)){
            $thumbnailname = $uploadfile->hashName();
            $uploadfile->storeAs('public/user', $thumbnailname);
        }else{
            $thumbnailname = $auth_user->thumbnail;
        }

        $users->where('id',$auth_user->id)
            ->update([
                'name'=>$name,
                'email'=>$email,
                'password'=>$hashed_password,
                'thumbnail'=>$thumbnailname,
            ]);

        return redirect(route('user.index'))->with('success', '保存しました。');
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
        DB::table('users')->where('id', '=', $id)->delete();
        Auth::logout();
        return redirect('/');
    }
}
