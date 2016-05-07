<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests;
use Blog\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{   
    public function getAllContent()
    {
    	return Content::all();
    }
    
    public function getContent($link)
    {
    	return Content::where('link', 'ILIKE', '%'. $link .'%')->orWhere('id', $link)->first();
    }
    
    public function insertContent(Request $request)
    {
        $filename = time().".".$file->getClientOriginalExtension();
        $destinationPath = 'images/uploads/';
        
    	$content = Content::create([
    	    'user_id'     => Auth::user()->id,
    	    'menu_id'     => $request->menu_id,
    	    'title'       => $request->title,
    	    'link'        => $this->clean($request->title),
    	    'description' => $request->description,
    	    'content'     => $request->content,
    	    'image'       => $request->file('photo')->move($destinationPath, $fileName);
    	]);
    	
    	return $content ? ['status_code' => 200, 'message' => 'Content Uploaded Successfully']:['status_code' => 500, 'message' => 'Error!!!, cannot Insert content'];
    }
}