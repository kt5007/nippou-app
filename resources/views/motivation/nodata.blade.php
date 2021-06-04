@extends('layouts.common')

@section('title', 'index page')

@section('content')

    <div class="page-header">

        <h1 class="text-center">
          未投稿のためグラフが表示できません<br>
        </h1>
        <div style="" class="text-center mt-4">
          <a href="{{ route('articles.create') }}" class="btn btn-success btn-lg">Create Daily Report</a>
      </div>
    </div>
@endsection
