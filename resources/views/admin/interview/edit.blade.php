@extends('adminlte::page')

@section('title', 'Редактировать интервью')

@section('content_header')
    <h1>Редактировать интервью {{$interview->name}}</h1>
@stop

@section('content')
@include('admin._messages')
<form action="/admin/interview/{{$interview->id}}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	@include('admin.interview._form')

</form>

@stop