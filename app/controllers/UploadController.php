<?php

class UploadController extends BaseController {

	public function upload()
	{
		$posts = Post::all();
		return View::make('upload')->with('posts', $posts);
	}

	public function process()
	{
		try {

			$rules = array(
				'title' => 'required|min:3',
				'url' => 'required|min:10',
				'description' => 'min:3'
			);

		    $validator = Validator::make(Input::all(), $rules);

		    if ($validator->fails())
		    {
		        return Redirect::to('upload')->withInput()->withErrors($validator);
		    }
		    
			// url da imagem original
			$url = Input::get('url');
			// extensao da imagem
			$ext = '.'.substr(strrchr($url,'.'),1);
			
			// path para salvar o gif e o jpg
			$publicPathImage = public_path() . '/image/';

			// salva a imagem original
			$newImageName = md5($url);
			file_put_contents($publicPathImage . $newImageName . $ext, file_get_contents($url));

		    $img = new \abeautifulsite\SimpleImage($publicPathImage . $newImageName . $ext);
		    $img->best_fit(600, 600)->save($publicPathImage . 'fb_'.$newImageName .'.jpg' );

		    $post = new Post;
			$post->title = Input::get('title');
			$post->description = Input::get('description');
			$post->url = $newImageName . $ext;
			$post->save();

			return Redirect::to('upload');


//		   	return '<img src="/image/'. $newImageName . $ext. '" alt="Original" /><br/><img src="/image/fb_'. $newImageName .'.jpg" alt="JPG" />';


		} catch(Exception $e) {
			echo '<pre>';
			echo $e->getTraceAsString();
		    echo 'Error: ' . $e->getMessage();
		    echo '</pre>';
		}


		
	}

	public function missingMethod($parameters)
	{
	    var_dump($parameters);
	    die;
	}

}