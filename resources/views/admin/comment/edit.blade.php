@extends('adminlte::page')

@section('title', 'Редактировать комментарий')

@section('content_header')
    <h1>Редактировать комментарий {{$comment->review}}</h1>
@stop

@section('content')
@include('admin._messages')
<form action="/admin/comment/{{$comment->id}}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	
    	@csrf
    	<div class="form-group">
    	<textarea name="review" cols="20" rows="3" class="form-control">{{old('review',$comment->review ?? '')}}
    		
    	</textarea>
    	</div>
    	<input type="hidden" name="comment" value="{{$comment->id}}">
    	<input type="hidden" name="user" value="{{Auth::user()->id}}">
    	<button class="btn btn-primary">Отправить</button>
    	

    

</form>

@stop