<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Blog\Http\Requests;

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
        
    }
}