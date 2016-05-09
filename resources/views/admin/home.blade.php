@extends('admin.master')

@section('title', 'Page Title')

@section('content')
	<p>Welcome {{ Auth::user()->name }}</p>
    <p>This is my body content.</p>
@endsection