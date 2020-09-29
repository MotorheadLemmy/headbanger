@extends('layouts.app')
@section('title', 'Интервью -')
@section('content')
<h2 class="text-center mb-5">{{$interview->name}}</h2>
<div class="container">
 
    @if($interview->img)
            <img src="{{$interview->img}}" alt="{{$interview->name}}" class="float-left mr-3 mb-3" style="width:40%">
            @endif

            <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($interview->created_at))}} <i class="fa fa-commenting-o" aria-hidden="true"></i>  Комментариев:{{$interview->comments->count()}} </p>
    <p>{!!$interview->description!!}</p>


      @guest
    <h5>Для того чтобы добавить комментарий
    <a href="{{ route('login') }}"> войдите</a>  или <a href="{{ route('register') }}">зарегистрируйтесь</a></h5>
    @else
    <h5>Добавить комментарий:</h5>

    <form action="/interview/{{$interview->slug}}" method="POST">
    	@csrf
    	<div class="form-group">
    	<textarea name="comment" cols="20" rows="3" class="form-control">
    		
    	</textarea>
    	</div>
    	<input type="hidden" name="interview" value="{{$interview->id}}">
    	<input type="hidden" name="user" value="{{Auth::user()->id}}">
    	<button class="btn btn-primary">Отправить</button>
    	

    </form>
    @endguest
     @foreach($interview->comments as $comment)
        <div class="my-3 bordercomment">

          
        <span class="commenttext"> {{ $comment->review }}</span> <br>
          <b>{{ $comment->user->name }}</b> <br>
          {{ $comment->created_at }} <br>
        </div>
      @endforeach()




</div>


    



@endsection