@extends('layouts.common')

@section('Details', 'index page')

@section('content')
<div class="page-header" >

@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <!-- 件名 -->
        <h1 class="h4 mb-4">
        {{ $article->title }}
        </h1>

        <!-- 投稿情報 -->
        <div class="summary">
            <!-- edit button and delete button -->
            <p><span>ID: {{ $article->id }}</span> / <time>{{ $article->post_date }}</time> / feeling: {{ $article->feeling_before }} → {{ $article->feeling_after }}</p>
        </div>
                
        <!-- 本文 -->
        <p class="mb-5">
            {!! nl2br(e($article->post_content)) !!}
        </p>
    </div>
    <div class="form-group text-right">
        <form action="{{ route('articles.destroy', ['article'=>$article]) }}" method="post" class="ml-2">
            <a class="btn btn-success btn-sm"  href="{{ route('articles.edit', ['article'=>$article]) }}" role="button">Edit</a>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary btn-sm">Back</a>
            @csrf
            @method('DELETE')
            <input type="submit" value="delete" class="btn btn-danger btn-sm"  onclick='return confirm("Are you sure you want to delete？");'>
        </form>
    </div>

</div>
@endsection