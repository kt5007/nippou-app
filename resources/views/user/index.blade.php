@extends('layouts.common')
@section('title', 'User Profile')
@section('content')
@section('title', 'ユーザー情報変更')


@section('content')
    <!-- thumbnail -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="topWrapper">
        @if (!empty($auth_user->thumbnail))
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
                            <td>{{ $auth_user->id }}</td>
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

                <!-- edit button and delete button -->
                <div class="form-group">
                    <div class="buttonSet">
                        <form action="{{ route('user.destroy', ['user' => $auth_user]) }}" method="post" class="ml-2">
                            <a class="btn btn-success" href="{{ route('user.edit', ['user' => $auth_user]) }}"
                                role="button">Edit</a>
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger"
                                onclick='return confirm("Are you sure you want to delete？");'>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
