@extends('layouts.app')
@section('title', 'Рецензии -')
@section('content')
<h2 class="text-center mb-5">{{$review->band}}</h2>
<h4 class="text-center mb-5">{{$review->album}}</h4>
<div class="container">
  {{-- <div class="row"> --}}
    @if($review->img)
            <img src="{{$review->img}}" alt="{{$review->band}}" class="float-left mr-3 mb-3" style="width:40%">
            @endif
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($review->created_at))}} <i class="fa fa-commenting-o" aria-hidden="true"></i> Комментариев:{{$review->comments->count()}}</p><br>
            <p>{!!$review->tracklist!!}</p>
    <p>{!!$review->description!!}</p>
    <b>Оценка: {{$review->rating}}</b>


      @guest
    <h5>Для того чтобы добавить комментарий
    <a href="{{ route('login') }}"> войдите</a>  или <a href="{{ route('register') }}">зарегистрируйтесь</a></h5>
    @else
    <h5>Добавить комментарий:</h5>

    <form action="/review/{{$review->slug}}" method="POST">
    	@csrf
    	<div class="form-group">
    	<textarea name="comment" cols="20" rows="3" class="form-control">
    		
    	</textarea>
    	</div>
    	<input type="hidden" name="review" value="{{$review->id}}">
    	<input type="hidden" name="user" value="{{Auth::user()->id}}">
    	<button class="btn btn-primary">Отправить</button>
    	

    </form>
    @endguest
    @foreach($review->comments as $comment)
        <div class="my-3 bordercomment">

          
        <span class="commenttext"> {{ $comment->review }}</span> <br>
         <b> {{ $comment->user->name }}</b> <br>
          {{ $comment->created_at }} <br>
        </div>
      @endforeach()


   

</div>
@endsection