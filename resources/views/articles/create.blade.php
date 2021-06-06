@extends('layouts.common')

@section('title', 'index page')

@section('content')
    <div class="container" style="margin-top:100px;padding-bottom:0px;">
        <div class="border p-4">
            <h1 class="h4 mb-4 font-weight-bold">
                Create New Daily report
            </h1>

            <form method="POST" action="{{ route('articles.store') }}">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="subject">
                            Date
                        </label>
                        <input id="post_date" name="post_date"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            value="{{ old('date') }}" type="date" min="1900-01-01" max="2100-12-31">
                        @if ($errors->has('post_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('post_date') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">
                            Title
                        </label>
                        <input id="title" name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') }}" type="text">
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="feeling_before">Motivation before work</label>
                            <input class="form-control" id="feeling_before" name="feeling_before" type="number" min="0"
                                max="100" step="1"
                                class="form-control {{ $errors->has('feeling_before') ? 'is-invalid' : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="feeling_after">Motivation after work</label>
                            <input class="form-control" id="feeling_after" name="feeling_after" type="number" min="0"
                                max="100" step="1"
                                class="form-control {{ $errors->has('feeling_after') ? 'is-invalid' : '' }} ">
                        </div>
                    </div>

                    <label for="post_content">
                        Content
                    </label>

                    <textarea id="post_content" name="post_content"
                        class="form-control {{ $errors->has('post_content') ? 'is-invalid' : '' }}"
                        rows="8">{{ old('post_content') }}</textarea>
                    @if ($errors->has('post_content'))
                        <div class="invalid-feedback">
                            {{ $errors->first('post_content') }}
                        </div>
                    @endif
        </div>

        <div class="mt-5">
            <div class="buttonSet">
                <button type="submit" class="btn btn-success">
                    Post
                </button>
                <a class="btn btn-secondary" href="{{ route('articles.index') }}">
                    Cancel
                </a>
            </div>
        </div>
        </fieldset>

        </form>

    </div>
    </div>
@endsection
