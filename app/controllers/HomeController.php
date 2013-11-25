<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$posts = Post::all();
		return View::make('index')->with('posts', $posts);
	}

	public function show($id)
    {
        $post = Post::whereRaw('md5(`id`) = ?',array($id))->firstOrFail();
        return View::make('index')->with('posts', array($post));
    }

}