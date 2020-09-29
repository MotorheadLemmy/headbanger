@extends('adminlte::page')

@section('title', 'Интервью')

@section('content_header')
    <h1>Интервью
      <a href="/admin/interview/create" class="btn btn-primary btn-sm">Добавить интервью</a>
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
    			<th>Описание</th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($interviews as $interview)
    		<tr>
    			<td>{{$loop->iteration}}</td>
    			<td><img src="{{$interview->img}}" alt="{{$interview->name}}" style="width:100px"></td>
    			<td>{{$interview->name}}</td>
    			<td>{{$interview->slug}}</td>
    			<td>{{$interview->description}}</td>
    			<td>
                    <a href="/admin/interview/{{$interview->id}}/edit" class="btn btn-warning">
                    {{-- i.fa.fa-edit --}}
                    <i class="fa fa-edit"></i>
                    
                </a>
                <form action="/admin/interview/{{$interview->id}}" method="POST">
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
    {{$interviews->links()}} 
</div>
    
@stop