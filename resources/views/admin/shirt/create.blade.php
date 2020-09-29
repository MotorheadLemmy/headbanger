@extends('adminlte::page')

@section('title', 'Добавить футболку')

@section('content_header')
    <h1>Добавить футболку</h1>
@stop

@section('content')
@include('admin._messages')
<form action="/admin/shirt" method="POST" enctype="multipart/form-data">
	@include('admin.shirt._form')

</form>

@stop