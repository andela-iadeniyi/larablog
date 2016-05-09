<?php

namespace Blog\Http\Controllers;

use Hash;
use Auth;
use Blog\User;
use Blog\Avatar;
use Blog\Biography;
use Blog\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException as QueryException;

class UserController extends Controller
{

    protected $redirectTo   = '/admin';
    protected $loginPath    = '/admin';
    protected $registerPath = '/admin';

	public function createAvatar($user_id, $request)
	{
        $destinationPath = 'images/avatar/';
        $filename        = time().".".$request->getClientOriginalExtension();
		$avatar 		 = $request->move($destinationPath, $filename);

		$image = Avatar::create([
			'user_id' => $user_id,
			'avatar' => $filename
		]);

		return $image ? true : false;
	}

	public function createBiography($user_id, $request)
	{
		$biography = Biography::create([
			'user_id' => $user_id,
			'biography' => $request->biography
		]);

		return $biography ? true : false;
	}

    public function create(Request $request)
    {
    	try {
	    	$user = User::create([
	    		'name' => $request->name,
	    		'email' => $request->email,
	    		'password' => bcrypt($request->password)
	    	]);

	    	if ($user) {
	    		if ($this->createBiography($user->id, $request)) {
	    			return $this->createAvatar($user->id, $request->file('avatar')) ? ['status_code' => 200, 'message' => 'User created Successfully'] : ['status_code' => 500, 'message' => 'Cannot create User'];
	    		}
	    	}
	    } catch (QueryException $e) {
	    	return ['status_code' => 404, 'message' => 'Email already Exist'];
	    }
    }

    public function update(Request $request)
    {
    	$user = User::whereId(Auth::user()->id)->update(['name' => $request->updateName]);

    	if ($user) {
    		return Biography::whereUser_id(Auth::user()->id)->update(['biography' => $request->updateBiography]) ? ['status_code' => 200, 'message' => 'User Details Updated Successfully'] : ['status_code' => 500];
    	}
    }

    public function login(Request $request)
    {
    	$user = Auth::attempt($request->only(['email', 'password']));

    	return $user ? redirect('/admin/home') : redirect('/admin');
    }

    public function updatePassword(Request $request)
    {
    	if ($this->chkPasswords($request)) {
	    	$password = User::whereId(Auth::user()->id)->first()->password;
	    	$chkPassword = Hash::check($request->oldPassword, $password);
	    	if ($chkPassword) {
	    		return $this->processUpdate($request) ? ['status_code' => 200, 'message' => 'Password Updated Successfully'] : ['status_code' => 500];
	    	} else {
	    		return ['status_code' => 500, 'message' => 'Old Password is not correct'];
	    	}
	    } else {
	    	return ['status_code' => 500, 'message' => 'Password is not thesame'];
	    }
    }

    public function updateAvatar(Request $request)
    {
    	$file            = $request->file('updateAvatar');
        $destinationPath = 'images/avatar/';
        $filename        = time().".".$file->getClientOriginalExtension();
		$avatar 		 = $file->move($destinationPath, $filename);

		return Avatar::whereUser_id(Auth::user()->id)->update(['avatar' => $filename]) ? ['status_code' => 200, 'message' => 'Avatar Updated Successfully'] : ['status_code' => 500];
    }

    public function processUpdate($request)
    {
    	return User::whereId(Auth::user()->id)->update(['password' => bcrypt($request->newPassword)]);
    }

    public function chkPasswords($request)
    {
    	return ($request->newPassword == $request->confirmPassword) ? true : false;
    }
}
