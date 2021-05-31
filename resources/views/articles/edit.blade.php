@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="container" style="margin-top:100px;padding-bottom:0px;">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            Edit Daily report
        </h1>

        <form method="POST" action="">
            @csrf

            <fieldset class="mb-4">

              <div class="form-group">
                <label for="subject">Date</label>
                <input id="post_date" name="post_date" class="form-control" value="{{ $article->post_date }}" type="text">
              </div>

              <div class="form-group">
                <label for="subject">Title</label>
                <input id="title" name="title" class="form-control" value="{{ $article->title }}" type="text">
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                <label for="feeling_before">Motivation before work</label>
                <input type="number" step="1" min="0" max="100" class="form-control" id="feeling_before" name="feeling_before" value="{{ $article->feeling_before }}">
                </div>
                <div class="form-group col-md-6">
                <label for="feeling_after">Motivation after work</label>
                <input type="number" step="1" min="0" max="100" class="form-control" id="feeling_after" name="feeling_after" value="{{ $article->feeling_after }}">
                </div>
              </div>

              <div class="form-group">
                <label for="message">Content</label>
                <textarea id="post_content" name="post_content" class="form-control" rows="10">{!! nl2br(e($article->post_content)) !!}</textarea>
              </div>

              <div class="mt-5 text-center">
                <button type="submit" class="btn btn-success">
                  Confirm
                </button>
                <a class="btn btn-secondary" href="">
                  Cancel
                </a>
              </div>
              
            </fieldset>
        </form>
    </div>
</div>
@endsection