@extends('adminlte::page')

@section('title', 'Футболки')

@section('content_header')
    <h1>Футболки
    	<a href="/admin/shirt/create" class="btn btn-primary btn-sm">Добавить футболку</a>

    </h1>
@stop

@section('content')
@include('admin._messages')
<table class="table">
    	<thead>
    		<tr>
    			<th>#</th>
    			<th>Изображение 1</th>
                <th>Изображение 2</th>
                <th>Изображение 3</th>
    			<th>Название</th>
    			<th>Slug</th>
    			<th>Описание</th>
    			<th>Цена</th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($shirts as $shirt)
    		<tr>
    			<td>{{$loop->iteration}}</td>
    			<td><img src="{{$shirt->img}}" alt="{{$shirt->name}}" style="width:50px"></td>
                <td><img src="{{$shirt->img1 ?? '/images/no.png'}}" alt="{{$shirt->name}}" style="width:50px"></td>
                <td><img src="{{$shirt->img2 ?? '/images/no.png'}}" alt="{{$shirt->name}}" style="width:50px"></td>
    			<td>{{$shirt->name}}</td>
    			<td>{{$shirt->slug}}</td>
    			<td>{{$shirt->description}}</td>
    			<td>{{$shirt->price}}</td>
    			<td>
                    <a href="/admin/shirt/{{$shirt->id}}/edit" class="btn btn-warning">
                    {{-- i.fa.fa-edit --}}
                    <i class="fa fa-edit"></i>
                    
                </a>
                <form action="/admin/shirt/{{$shirt->id}}" method="POST">
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
    {{$shirts->links()}} 
</div>

@stop