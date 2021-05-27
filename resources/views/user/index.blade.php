@extends('layouts.common')
@section('title','User Profile')
@section('content')
@section('title','ユーザー情報変更')


@section('content')
  <!-- thumbnail -->
  <div class="topWrapper">
  @if(!empty($authUser->thumbnail))
    <img src="/storage/user/{{ $auth_user->thumbnail }}" class="showThumbnail">
  @else
    <img src="https://nureyon.com/sample/8/upper_body-2-p2.svg?1601332163" class="showThumbnail">
  @endif
  </div>

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <table class="table">      
          <tbody>
            <tr>
              <th scope="row">ID</th>
              <td>{{ $auth_user->id}}</td>
            </tr>
            <tr>
              <th scope="row">Name</th>
              <td>{{ $auth_user->name }}</td>
            </tr>
            <tr>
            <th scope="row">Email</th>
              <td>{{ $auth_user->email }}</td>
            </tr>
            <tr>
              <th scope="row">Password</th>
              <td>＊＊＊＊＊＊＊＊</td>
            </tr>
          </tbody>
        </table>
        <a class="btn btn-success btn-block" href="{{ route('user.edit', ['user'=>$auth_user->id]) }}" role="button">Edit</a>
      </div>
    </div>
  </div>

@endsection
