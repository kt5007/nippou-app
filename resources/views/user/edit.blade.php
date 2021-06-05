@extends('layouts.common')
@section('title', 'Edit Profile')
@section('content')

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- thumbnail -->
    <div class="topWrapper">
        @if (!empty($auth_user->thumbnail))
            <img src="/storage/user/{{ $auth_user->thumbnail }}" class="showThumbnail">
        @else
            <img src="https://nureyon.com/sample/8/upper_body-2-p2.svg?1601332163" class="showThumbnail">
        @endif
    </div>

    <div class="container mt-1">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <!-- post change of update content -->
                <form method="post" action="{{ route('user.update', ['user' => $auth_user]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    {{-- tubmnail --}}
                    <div class="form-group">
                        <label for="thumbnail">Change thumbnail</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                <label class="custom-file-label" for="thumbnail" data-browse="
                                Reference">Choose file (Can be dropped)</label>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary input-group-text"
                                    id="inputFileReset">Reset</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check text-right">
                            <input class="form-check-input" type="checkbox" id="delete_thumbnail" name="delete_thumbnail">
                            <label class="form-check-label" for="delete_thumbnail">Delete thumbnail</label>
                        </div>
                    </div>

                    <!-- table -->
                    <table class="table">
                        <tbody>
                            <!-- row ID -->
                            <tr>
                                <th scope="row">ID</th>
                                <td>{{ $auth_user->id }}</td>
                            </tr>
                            <!-- row Name -->
                            <div class="form-group">
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>
                                        @if ($errors->has('name'))
                                            <div class="error">
                                                @foreach ($errors->get('name') as $message)
                                                    {{ $message }}
                                                @endforeach
                                            </div>
                                        @endif
                                        <input type="text" id="name" class="form-control" name="name"
                                            value="{{ $auth_user->name }}">
                                    </td>
                                </tr>
                            </div>
                            <!-- row Email -->
                            <div class="form-group">
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>
                                        @if ($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                        <input type="email" id="email" name="email" class="form-control"
                                            aria-describedby="emailHelp" value="{{ $auth_user->email }}">
                                    </td>
                                </tr>
                            </div>
                            <!-- row Check current password -->
                            <div class="form-group">
                                <tr>
                                    <th scope="row">Current Password</th>

                                    <td>
                                        @if ($errors->has('current_password'))
                                            <div class="error">{{ $errors->first('current_password') }}</div>
                                        @endif
                                        <input type="password" id="current_password" name="current_password"
                                            class="form-control">
                                    </td>
                                </tr>
                            </div>
                            <!-- row Password -->
                            <div class="form-group">
                                <tr>
                                    <th scope="row">New password</th>
                                    <td>
                                        @if ($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                        @endif
                                        <input type="password" id="password" name="password" class="form-control">
                                    </td>
                                </tr>
                            </div>
                            <!-- row Password confirmation -->
                            <div class="form-group">
                                <tr>
                                    <th scope="row">Confirm new password</th>
                                    <td>
                                        @if ($errors->has('password_confirmation'))
                                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control">
                                    </td>
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

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script>
        bsCustomFileInput.init();

        document.getElementById('inputFileReset').addEventListener('click', function() {

            bsCustomFileInput.destroy();

            var elem = document.getElementById('thumbnail');
            elem.value = '';
            var clone = elem.cloneNode(false);
            elem.parentNode.replaceChild(clone, elem);

            bsCustomFileInput.init();

        });

    </script>
@endsection
