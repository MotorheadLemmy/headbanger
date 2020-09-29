@extends('adminlte::page')

@section('title', 'Редактировать футболку')

@section('content_header')
    <h1>Редактировать футболку {{$shirt->name}}</h1>
@stop

@section('content')
@include('admin._messages')
<form action="/admin/shirt/{{$shirt->id}}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	@include('admin.shirt._form')

</form>

@stop