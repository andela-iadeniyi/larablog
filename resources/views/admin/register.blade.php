@extends('admin.master')

@section('title', 'Page Title')

@section('content')

@inject('user', 'Blog\User')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">CREATE NEW USER</h3>
		</div>
		<div class="panel-body">
		    <form class="form-signin" action="/admin/user/create" method="post" enctype="multipart/form-data" >
		      	{{ csrf_field() }}
		        <label for="inputEmail" class="sr-only">Email</label>
		        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="example&commat;email.com" required="true" />

		        <label for="fullname" class="sr-only">Full Name</label>
		        <input type="text" id="fullname" class="form-control" name="name" placeholder="Full Name" required>

		        <label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

		        <textarea name="biography" class="form-control" rows="2" placeholder="Biography"></textarea>

		        <label for="role" class="sr-only">Role</label>
		        <select id="role" name="role">
		            <option value="admin">SUPER ADMIN</option>
		            <option value="content">Content ADMIN</option>
		        </select>

		        <label for="avatar" class="sr-only">Profile Picture</label>
		        <input type="file" name="avatar" id="avatar">

		        <button class="btn btn-lg btn-primary btn-block" type="submit">REGISTER USER</button>
		    </form>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">UPDATE USER DETAILS</h3>
		</div>
		<div class="panel-body">
		    <form class="form-signin" action="/admin/user/update" method="post">
		      	{{ csrf_field() }}
		        <label for="inputEmail" class="sr-only">Email</label>
		        <input type="email" id="inputEmail" class="form-control" name="updateEmail" value="{{ $user->userDetails()->email }}" placeholder="example&commat;email.com" required="true" />

		        <label for="fullname" class="sr-only">Full Name</label>
		        <input type="text" id="fullname" class="form-control" name="updateName" value="{{ $user->userDetails()->name }}" placeholder="Full Name" required>

		        <textarea name="updateBiography" class="form-control" rows="2" placeholder="Biography">{{ $user->userDetails()->biography->biography }}</textarea>

		        <button class="btn btn-lg btn-primary btn-block" type="submit">UPDATE DETAILS</button>
		    </form>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">UPDATE USER AVATAR</h3>
		</div>
		<div class="panel-body">
			<form action="/admin/user/updateAvatar" method="post" enctype="multipart/form-data">
		      	{{ csrf_field() }}
				<img src="/images/avatar/{{ $user->userDetails()->avatar->avatar }}" width="10%">
		        <label for="avatar" class="sr-only">Profile Picture</label>
		        <input type="file" name="updateAvatar" id="avatar">
		        <button class="btn btn-lg btn-primary btn-block" type="submit">UPDATE AVATAR</button>
			</form>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">UPDATE PASSWORD</h3>
		</div>
		<div class="panel-body">
		    <form action="/admin/user/passwordReset" method="post">
		    	{{ csrf_field() }}

		        <label for="inputPassword" class="sr-only">Old Password</label>
		        <input type="password" id="oldPassword" name="oldPassword" class="form-control" placeholder="Old Password" required>

		        <label for="inputPassword" class="sr-only">New Password</label>
		        <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="New Password" required>

		        <label for="inputPassword" class="sr-only">Confirm Password</label>
		        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>

		        <button class="btn btn-lg btn-primary btn-block" type="submit">Update Password</button>

		    </form>
		</div>
	</div>


@endsection