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
        return view('user.index', compact('auth_user'));
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
        $auth_user = Auth::user();
        return view('user.edit', compact('auth_user'));
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
        // バリデーション
        $rules = [
            'thumbnail' => 'file|mimes:jpeg,png,jpg,bmb|max:2048',
            'name' => ['required', 'max:100'],
            'email' => ['required'],
            'current_password' => ['required'],
        ];
        
        if(isset($request->password)){
            $rules['password']='min:8';
            $rules['password_confirmation']='same:password';
        }

        $messages = [
            'required' => ':attributeを入力してください',
            'name.max' => '100字以下でお願いします',
            'password.min' => '8文字以上でお願いします',
            'password_confirmation.same' => 'パスワードが一致しません'
        ];
        $attributes = [
            'name' => '名前',
            'email' => 'メール',
            'current_password' => '現在のパスワード',
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        // サムネイル画像の変更がある場合は格納
        $uploadfile=$request->thumbnail;
        if (!empty($uploadfile)) {
            $thumbnailname = $uploadfile->hashName();
            $uploadfile->storeAs('public/user', $thumbnailname);
        } else {
            $thumbnailname = $auth_user->thumbnail;
        }

        if(isset($request->delete_thumbnail)){
            $thumbnailname = null;
        }

        // 現在のパスワードと一致しているか確認
        if (Hash::check($request->current_password, $auth_user->password)) {
            // エラーがある場合   
            if ($validator->fails()) {
                return redirect()
                    ->route('user.edit', [$auth_user])
                    ->withErrors($validator)
                    ->withInput();
            // うまくいった場合
            } else {
                $insert_data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'thumbnail' => $thumbnailname,
                ];

                // パスワードの更新がある場合
                if(isset($request->password)){
                    $insert_password = $request->password;
                    $insert_data['password'] = Hash::make($insert_password);
                }
                DB::table('users')
                    ->where('id', '=', $auth_user->id)
                    ->update($insert_data);
                $request->session()->flash('success', 'Saved');
                return redirect()->route('user.index');
            }
        // 現在のパスワードと一致しない場合
        } else {
            // with validation error
            if ($validator->fails()) {
                return redirect()
                    ->route('user.edit', [$auth_user])
                    ->withErrors($validator)
                    ->withInput();
                // no validation error
            } else {
                $request->session()->flash('error', 'Current Password does not match');
                return redirect()->route('user.edit', 'auth_user');
            }
        }
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
