@extends('admin.master')

@section('title', 'Page Title')

@section('content')
    
	<h3>Create Menu</h3>
	<form class="form-horizontal" id="create_menu" role="form" action="/admin/menu/create" method="post">
	    <div class="form-group">
	        <label for="usr">Menu:</label>
	        <input type="text" class="form-control" name="name">
	    </div>
	    <div class="form-group">
	        <label for="comment">description:</label>
	        <textarea class="form-control" rows="3" name="description"></textarea>
	    </div>
	    <div class="form-group">
	        <button type="submit" class="btn btn-default">Submit</button>
	    </div>
	</form>
@endsection