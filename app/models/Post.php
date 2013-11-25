<?php

class Post extends Eloquent 
{

    protected $table = 'post';

    public function getLink()
    {
    	return md5($this->id);
    }

    public function fromArray(array $post)
    {
    	$this->id = isset($post['id']) ? $post['id'] :  null;
    	$this->title = isset($post['title']) ? $post['title'] :  null;
    	$this->url = isset($post['url']) ? $post['url'] : null;
    	$this->description = isset($post['description']) ? $post['description'] :  null;
    	$this->created_at = isset($post['created_at']) ? $post['created_at'] :  null;
    	$this->updated_at = isset($post['updated_at']) ? $post['updated_at'] :  null;
    	return $this;
    }
}