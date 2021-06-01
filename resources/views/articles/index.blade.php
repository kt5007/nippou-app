@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="page-header" >
    
    <h1 class="text-center">Your Daily reports</h1>

    <!-- Create post & Search by date form -->
    <div class="mt-4 mb-3">
        <div style="float: left">
            <a href="{{ route('articles.create')}}" class="btn btn-success">Create</a>
        </div>
        <div class="" style="text-align: right">
            <form name="sample" action="sample" method="post">
                @csrf
                <input type="date" name="start" value=""> 〜 <input type="date" name="end" value="">
                <button type="button" class="btn btn-outline-dark">Search</button>
            </form>
        </div>
    </div>

    <table class="table table-striped table-hover">
    <thead>
    <tr>
    <th>No</th>
    <th>Date</th>
    <th>Title</th>
    <th>Motivation before and after</th>
    <th>Operation</th>
    </tr>
    </thead>
    <tbody>
    @foreach($auth_user_articles as $auth_user_article)    
    <tr>
    <td>{{$auth_user_article->id}}</td><td>{{$auth_user_article->post_date}}</td><td>{{$auth_user_article->title}}</td><td>{{$auth_user_article->feeling_before}} → {{$auth_user_article->feeling_after}}</td>
    <td>
        <form method="post">
            <a href="{{ route('articles.show', ['article'=>$auth_user_article->id]) }}" class="btn btn-outline-dark btn-sm">Details</a>
            <a href="{{ route('articles.edit', ['article'=>$auth_user_article->id]) }}" class="btn btn-outline-dark btn-sm">Edit</a>
            <a href="{{ route('articles.destroy', ['article'=>$auth_user_article->id]) }}" class="btn btn-outline-danger btn-sm">Delete</a>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
{{ $auth_user_articles->links() }}
@endsection