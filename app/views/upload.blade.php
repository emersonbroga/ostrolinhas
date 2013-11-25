@extends('layout')

@section('content')

	<h3>Inserir imagem </h3>
	
	{{ Form::open( array('method' => 'post', 'action' => 'UploadController@process') ) }}

	<div class="control-group">
		{{ Form::label('title', 'Image title', array('class' => 'control-label') ) }}
		<div class="controls">
			{{ Form::text('title', '', array('class' => 'm-wrap large', 'value' => Input::old('title') )) }}
			<span class="help-inline">{{ $errors->first('title') }}</span>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('url', 'Image url', array('class' => 'control-label') ) }}
		<div class="controls">
			{{ Form::text('url', '', array('class' => 'm-wrap large', 'value' => Input::old('url') )) }}
			<span class="help-inline">{{ $errors->first('url') }}</span>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('description', 'Image description', array('class' => 'control-label') ) }}
		<div class="controls">
			{{ Form::textarea('description', '', array('class' => 'm-wrap large', 'value' => Input::old('description') )) }}
			<span class="help-inline">{{ $errors->first('description') }}</span>
		</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
			{{ Form::token() }}
			{{ Form::submit('Salvar', array('class'=>'btn blue')) }}
		</div>
	</div>

	{{ Form::close() }}


	 @foreach($posts as $post)
		<p>
			<span>{{ $post->title }}</span>
			<p>{{$post->description }}</p>
			<br/>
        	<img src="/image/{{ $post->url }}" alt="{{ $post->title }}" />
	       	<br/>
	       	<img src="/image/fb_{{ $post->url }}" alt="{{ $post->title }}" />
       	</p>
    @endforeach

@stop