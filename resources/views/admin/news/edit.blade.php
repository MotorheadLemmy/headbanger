@extends('adminlte::page')

@section('title', 'Редактировать новость')

@section('content_header')
    <h1>Редактировать новость {{$news->name}}</h1>
@stop

@section('content')
@include('admin._messages')
<form action="/admin/news/{{$news->id}}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	@include('admin.news._form')

</form>

@stop