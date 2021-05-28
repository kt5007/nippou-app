@extends('layouts.common')
@section('title','Edit Profile')
@section('content')

<!-- thumbnail -->
<div class="topWrapper">
@if(!empty($auth_user->thumbnail))
  <img src="/storage/user/{{ $auth_user->thumbnail }}" class="showThumbnail">
@else
  <img src="https://nureyon.com/sample/8/upper_body-2-p2.svg?1601332163" class="showThumbnail">
@endif
</div>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <!-- post change of update content -->
      <form method="post" action="{{ route('user.update', ['user'=>$auth_user]) }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
        <div class="form-group">
          <label for="thumbnail">Profile picture</label>
          <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
        </div>
        <!-- table -->
        <table class="table">  
          <tbody>
            <!-- row ID -->
            <tr>
              <th scope="row">ID</th>
              <td>{{ $auth_user->id}}</td>
            </tr>
            <!-- row Name -->
            <div class="form-group">
              <tr>
                <th scope="row">Name</th>
                <td>
                  @if($errors->has('name'))
                  <div class="error">
                    @foreach($errors->get('name') as $message)
                    {{ $message }}
                    @endforeach
                  </div>
                  @endif
                  <input type="text" id="name" class="form-control" name="name" value="{{ $auth_user->name }}">
                </td>
              </tr>
            </div>
            <!-- row Email -->
            <div class="form-group">    
              <tr> 
                <th scope="row">Email</th>
                <td>
                  @if($errors->has('email'))<div class="error">{{ $errors->first('email') }}</div>@endif
                  <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{ $auth_user->email }}">
                </td>
              </tr>
            </div>
            <!-- row Check current password -->
            <div class="form-group">  
              <tr>
                <th scope="row">Current Password</th>
                @if($errors->has('current_password'))<div class="error">{{ $errors->first('current_password') }}</div>@endif
                <td><input type="password" id="current_password" name="current_password" class="form-control"></td>
              </tr>
            </div>            
            <!-- row Password -->
            <div class="form-group">  
              <tr>
                <th scope="row">New password</th>
                @if($errors->has('password'))<div class="error">{{ $errors->first('password') }}</div>@endif
                <td><input type="password" id="password" name="password" class="form-control"></td>
              </tr>
            </div>            
            <!-- row Password confirmation -->
            <div class="form-group">  
              <tr>
                <th scope="row">Confirm new password</th>
                <td><input type="password" id="password_confirmation" name="password_confirmation" class="form-control"></td>
              </tr>
            </div>            
          </tbody>
        </table>
        <!-- end table -->
        <!-- button confirm and back` -->
        <div class="buttonSet">
          <input type="submit" name="send" value="Confirm" class="btn btn-success">
          <a href="{{ route('user.index') }}" class="btn btn-dark">Back</a>
        </div>
      </form>

    </div>
  </div>
</div>

@endsection
