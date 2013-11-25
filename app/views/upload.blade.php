@extends('layout')

@section('content')

	<h3>Inserir imagem </h3>
	
	{{ Form::open( array('method' => 'post', 'action' => 'UploadController@process') ) }}

	<div class="control-group">
		{{ Form::label('title', 'Image title', array('class' => 'control-label') ) }}
		<div class="controls">
			{{ Form::text('title', '', array('class' => 'm-wrap large', 'value' => Input::old('title'), 'autocomplete' =>'off' )) }}
			<span class="help-inline">{{ $errors->first('title') }}</span>
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('url', 'Image url', array('class' => 'control-label') ) }}
		<div class="controls">
			{{ Form::text('url', '', array('class' => 'm-wrap large', 'value' => Input::old('url'), 'autocomplete' =>'off'  )) }}
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

@stop