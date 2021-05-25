@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="container" style="margin-top:100px;padding-bottom:0px;">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            Create New Daily report
        </h1>

        <form method="POST" action="">
            @csrf

            <fieldset class="mb-4">

                <div class="form-group">
                    <label for="subject">
                        Date
                    </label>
                    <input
                        id="name"
                        name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ old('name') }}"
                        type="text"
                    >
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="subject">
                        Title
                    </label>
                    <input
                        id="category_id"
                        name="category_id"
                        class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
                        value="{{ old('category_id') }}"
                        type="text"
                    >
                    @if ($errors->has('category_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Motivation before work</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Motivation after work</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>

                    <label for="message">
                    Content
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                        rows="4"
                    >{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="">
                        キャンセル
                    </a>

                    <button type="submit" class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection