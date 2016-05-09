<?php

namespace Blog\Http\Controllers;

use Blog\Menu;
use Blog\Http\Requests;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getAllMenu()
    {
    	return Menu::all();
    }
    
    public function getMenu($link)
    {
    	return Menu::whereLink($link)->orWhere('id', $link)->first();
    }
    
    /**
     * Insert into menu table
     *
     * @param  $name
     * @param  $description
     *
     * @return bool
     */
    public function create (Request $request)
    {
    	$menu = Menu::create([
    	    'name' => $request->name,
    	    'link' => $this->clean($request->name),
    	    'description' => $request->description
    	]);

        return $menu ? ['status_code' => 200, 'message' => 'Menu created Successfully']:['status_code' => 500, 'message' => 'Error!!!, cannot Insert Menu'];
    }

    public function deleteMenu ($id)
    {
        if ($this->updateContentMenuId($id)) {
            return Menu::whereId($id)->delete() ? 200 : 500;
        }
    }

    public function updateContentMenuId ($id)
    {
    	return Content::where('menu_id', '=', $id)->update(['menu_id' => 1]) ? true : false;
    }

    public function updateMenu()
    {
        $update = Menu::whereId($request->id)->update(['name' => $request->name, 'link' => $this->clean($request->name), 'description' => $request->description]);
        
        return $update ? 200 : 500;
    }
}