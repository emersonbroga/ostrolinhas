@extends('layout')

@section('content')
	
	@foreach($posts as $post)
		<p>
			<h1><a href="{{ $post->getLink() }}" title="{{ $post->title }}"/>{{ $post->title }}</a></h1>
			<br/>
			<img src="/resources/img/blank.gif" alt="{ $post->title }}" data-echo="/image/{{ $post->url }}">
        	<p>{{$post->description }}</p>
	    </p>
    @endforeach

@stop