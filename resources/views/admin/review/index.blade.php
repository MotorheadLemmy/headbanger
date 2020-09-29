@extends('adminlte::page')

@section('title', 'Рецензии')

@section('content_header')
    <h1>Рецензии
    	<a href="/admin/review/create" class="btn btn-primary btn-sm">Добавить рецензию</a>

    </h1>
@stop

@section('content')
@include('admin._messages')
<table class="table">
    	<thead>
    		<tr>
    			<th>#</th>
    			<th>Изображение</th>
    			<th>Группа</th>
    			<th>Альбом</th>
    			<th>Slug</th>
    			<th>Трэклист</th>
    			<th>Рецензия</th>
    			<th>Оценка</th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($reviews as $review)
    		<tr>
    			<td>{{$loop->iteration}}</td>
    			<td><img src="{{$review->img}}" alt="{{$review->name}}" style="width:100px"></td>
    			<td>{{$review->band}}</td>
    			<td>{{$review->album}}</td>
    			<td>{{$review->slug}}</td>
    			<td>{{$review->tracklist}}</td>
    			<td>{{$review->description}}</td>
    			<td>{{$review->rating}}</td>
    			<td>
                    <a href="/admin/review/{{$review->id}}/edit" class="btn btn-warning">
                    {{-- i.fa.fa-edit --}}
                    <i class="fa fa-edit"></i>
                    
                </a>
                <form action="/admin/review/{{$review->id}}" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                    @method('DELETE')
                    {{-- button.btn.btn-danger --}}
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </form>

                </td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>
    <div class ="mt-5 d-flex justify-content-center">
    {{$reviews->links()}} 
</div>
 
@stop
