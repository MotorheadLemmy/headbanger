@extends('layouts.app')
@section('title', 'Рецензии -')
@section('content')
<h2 class="text-center news">Рецензии</h2>
<div class="container">
  <div class="row">
    
    @foreach($reviews as $review)
    <div class="col-12">
      <div>
        	<h3 class="text-center mb-3 mt-3">{{$review->band}}</h3><br>
            <h4 class="text-center mb-5">{{$review->album}}</h4>
        	@if($review->img)
        	<img src="{{$review->img}}" alt="{{$review->band}}" class="float-left mr-3" style="width:30%">
        	@endif
        	<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($review->created_at))}} <i class="fa fa-commenting-o" aria-hidden="true"></i>  Комментариев:{{$review->comments->count()}}</p>
        	<p>{!!\Str::words($review->description, 40)!!}
        	<a href="/reviews/{{$review->slug}}">Читать далее</a>
        </div>
    </div>
        	@endforeach
        </div>
    </div>
    <div class ="mt-5 d-flex justify-content-center">
    {{$reviews->links()}} 
</div>


@endsection