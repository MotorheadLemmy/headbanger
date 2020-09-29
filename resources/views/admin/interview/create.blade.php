@extends('adminlte::page')

@section('title', 'Добавить интервью')

@section('content_header')
    <h1>Добавить интервью</h1>
@stop

@section('content')
@include('admin._messages')
<form action="/admin/interview" method="POST" enctype="multipart/form-data">
	@include('admin.interview._form')

</form>

@stop
@section('js')

	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>	
	<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>

	<script>
		CKEDITOR.replace('description', options);
	</script>
@endsection