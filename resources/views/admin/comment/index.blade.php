@extends('adminlte::page')

@section('title', 'Comments')

@section('content_header')
    <h1>Комментарии
      
    </h1>
@stop

@section('content')
@include('admin._messages')
    <table class="table">
    	<thead>
    		<tr>
    			<th>#</th>
    			<th>Комментарий</th>
    			<th>Кто оставил комментарий</th>
    			<th>Новость/Рецензия/Интервью</th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($comments as $comment)
    		<tr>
    			<td>{{$loop->iteration}}</td>
    	
    			<td>{{$comment->review}}</td>
    			<td>{{$comment->user->name}}</td>
    			<td>{{$comment->commenttable->name ??
                 $comment->commenttable->album }}</td>
    			<td>
                    <a href="/admin/comment/{{$comment->id}}/edit" class="btn btn-warning">
                    {{-- i.fa.fa-edit --}}
                    <i class="fa fa-edit"></i>
                    
                </a>
                <form action="/admin/comment/{{$comment->id}}" method="POST">
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
    {{$comments->links()}} 
</div>
@stop