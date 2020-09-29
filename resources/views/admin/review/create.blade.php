@extends('adminlte::page')

@section('title', 'Добавить рецензию')

@section('content_header')
    <h1>Добавить рецензию</h1>
@stop

@section('content')
@include('admin._messages')
<form action="/admin/review" method="POST" enctype="multipart/form-data">
	@include('admin.review._form')

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
		CKEDITOR.replace('tracklist', options);

	</script>
@endsection