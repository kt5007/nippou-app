@extends('layouts.common')
@section('title','Edit Profile')
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

      <!-- post change of update content -->
      <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
        <div class="form-group">
          <label for="thumbnail">Profile picture</label>
          <input type="file" class="form-control-file" id="thumbnail">
        </div>
        <!-- table -->
        <table class="table">  
          <tbody>
            <!-- row1 -->
            <tr>
              <th scope="row">ID</th>
              <td>{{ $auth_user->id}}</td>
            </tr>
            <!-- row2 -->
            <div class="form-group">
              <tr>
                <th scope="row">Name</th>
                <td>
                  <input type="text" id="name" class="form-control" name="name" value="{{ $auth_user->name }}">
                  @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
                </td>
              </tr>
            </div>
            <!-- row3 -->
            <div class="form-group">    
              <tr> 
              <th scope="row">Email</th>
                <td>
                  <input type="email" id="email" class="form-control" aria-describedby="emailHelp" value="{{ $auth_user->email }}">
                  @if($errors->has('email'))<div class="error">{{ $errors->first('email') }}</div>@endif
                </td>
              </tr>
            </div>
            <!-- row4 -->
            <div class="form-group">  
              <tr>
                <th scope="row">Password</th>
                <td><input type="password" id="password" class="form-control" placeholder="Password"></td>
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
