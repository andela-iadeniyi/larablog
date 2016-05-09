@extends('admin.master')

@section('title', 'Page Title')

@section('content')

@inject('menu', 'Blog\Menu')
    <p>This is content Page</p>
    <div id="summernote">Hello Summernote</div>
    {{ dd($menu->loadMenu()) }}

@endsection