@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="page-header" style="margin-top:100px;padding-bottom:0px;">
    
    <h1 class="text-center">Your Daily reports</h1>

    <!-- Create post & Search by date form -->
    <div class="mt-4 mb-3">
        <div style="float: left">
            <a href="" class="btn btn-success">Create Daily Report</a>
        </div>
        <div class="" style="text-align: right">
            <form name="sample" action="sample" method="post">
                {{ csrf_field() }}
                <input type="date" name="start" value=""> 〜 <input type="date" name="end" value="">
                <button type="button" class="btn btn-outline-success">Search</button>
            </form>
        </div>
    </div>

    <table class="table table-striped table-hover">
    <thead>
    <tr>
    <th>No</th>
    <th>date</th>
    <th>title</th>
    <th>content</th>
    <th>opration</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>01</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
    <td>
    <a href="" class="btn btn-outline-dark btn-sm">Details</a>
    <a href="" class="btn btn-outline-dark btn-sm">Edit</a>
    <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
    </td>
    </tr>
    <tr>
    <td>02</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
    <td>
    <a href="" class="btn btn-outline-dark btn-sm">Details</a>
    <a href="" class="btn btn-outline-dark btn-sm">Edit</a>
    <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
    </td>
    </tr>
    <tr>
    <td>03</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
    <td>
    <a href="" class="btn btn-outline-dark btn-sm">Details</a>
    <a href="" class="btn btn-outline-dark btn-sm">Edit</a>
    <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
    </td>
    </tr>
    <tr>
    <td>04</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
    <td>
    <a href="" class="btn btn-outline-dark btn-sm">Details</a>
    <a href="" class="btn btn-outline-dark btn-sm">Edit</a>
    <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
    </td>
    </tr>
    <tr>
    <td>05</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
    <td>
    <a href="" class="btn btn-outline-dark btn-sm">Details</a>
    <a href="" class="btn btn-outline-dark btn-sm">Edit</a>
    <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
    </td>
    </tr>
    </tbody>
    </table>
</div>
@endsection