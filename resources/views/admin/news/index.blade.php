@extends('adminlte::page')

@section('title', 'Новости')

@section('content_header')
    <h1>Новости
      <a href="/admin/news/create" class="btn btn-primary btn-sm">Добавить новость</a>
    </h1>
@stop

@section('content')
@include('admin._messages')
    <table class="table">
    	<thead>
    		<tr>
    			<th>#</th>
    			<th>Изображение</th>
    			<th>Название</th>
    			<th>Slug</th>
    			<th>Содержание</th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($news as $item)
    		<tr>
    			<td>{{$loop->iteration}}</td>
    			<td><img src="{{$item->img}}" alt="{{$item->name}}" style="width:100px"></td>
    			<td>{{$item->name}}</td>
    			<td>{{$item->slug}}</td>
    			<td>{{$item->description}}</td>
    			<td>
                    <a href="/admin/news/{{$item->id}}/edit" class="btn btn-warning">
                    {{-- i.fa.fa-edit --}}
                    <i class="fa fa-edit"></i>
                    
                </a>
                <form action="/admin/news/{{$item->id}}" method="POST">
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
    {{$news->links()}} 
</div>
@stop