@extends('layouts.app')
@section('content')

@include('admin._messages')

<div class="container">
    <div class="row">
        <div class="col-sm">

<h2 class="text-center mb-5 news"> Новости</h2>
	
	<h2 class="text-center mb-5">{{$news->name}}</h2>

 
    @if($news->img)
            <img src="{{$news->img}}" alt="{{$news->name}}" class="float-left mr-3 mb-3" style="width:42%">
            @endif

            <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($news->created_at))}}  </p>
    <p>{!!\Str::words($news->description, 90)!!}
        	<a href="/news/{{$news->slug}}">Читать далее</a></p>
        </div>


	
<div class="col-sm">

<h2 class="text-center mb-5 news">Рецензии</h2>

<h2 class="text-center mb-5">{{$review->band}}</h2>
<h4 class="text-center mb-5">{{$review->album}}</h4>

 
    @if($review->img)
            <img src="{{$review->img}}" alt="{{$review->band}}" class="float-left mr-3 mb-3" style="width:45%">
            @endif
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($review->created_at))}}</p>
    <p>{!!\Str::words($review->description, 90)!!}
    	<a href="/reviews/{{$review->slug}}">Читать далее</a></p>
    </div>
   
<div class="col-sm">

	<h2 class="text-center mb-5 news">Интервью</h2>
	<h2 class="text-center mb-5">{{$interview->name}}</h2>

 
    @if($interview->img)
            <img src="{{$interview->img}}" alt="{{$interview->name}}" class="float-left mr-3 mb-3" style="width:46%">
            @endif

            <p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($interview->created_at))}}  </p>
    <p>{!!\Str::words($interview->description, 80)!!}
            {{-- {{$interview->description}} --}}
        	<a href="/interviews/{{$interview->slug}}">Читать далее</a></p>
</div>
</div>
</div>







@endsection
