<?php

namespace Blog\Http\Controllers;

use Auth;
use Blog\Menu;
use Blog\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homePage()
    {
    	return view('admin.home');
    }
    
    public function menuPage()
    {
    	return view('admin.menu');
    }
    
    public function subMenuPage()
    {
    	return view('admin.subMenu');
    }
    
    public function contentPage()
    {
        return view('admin.content');
    }
    
    public function registrationPage()
    {
        return view('admin.register');
    }
    
    public function settingPage()
    {
        return view('admin.setting');
    }
    
    public function logout()
    {
        Auth::logout();
            
        return redirect('/admin');
    }
}