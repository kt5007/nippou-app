<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

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
        // Validator check
        $rules = [
            'user_id' => 'integer|required',
            'name' => 'required|max:100|string',
            'email' => 'required|email:strict,dns,spoof',
            'password' => 'required|'

        ];
        $messages = [
            'user_id.integer' => 'SystemError:システム管理者にお問い合わせください',
            'user_id.required' => 'SystemError:システム管理者にお問い合わせください',
            'name.required' => 'ユーザー名が未入力です',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        $param = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $uploadfile = $request->file('thumbnail');
        if(!empty($uploadfile)){
            $thumbnailname = $request->file('thumbnail')->hashName();
            $request->file('thumbnail')->storeAs('public/user', $thumbnailname);
            $param['thumbnail'] = $thumbnailname;
        }

        DB::table('users')
            ->where('id',$request->id)
            ->update($param);
        
        
        return redirect(route('user.edit'))->with('success', '保存しました。');

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
    }
}
