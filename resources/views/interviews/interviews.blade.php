@extends('layouts.app')
@section('title', 'Интервью-')
@section('content')
<h2 class="text-center news">Интервью</h2>
<div class="container">
  <div class="row">
    
    @foreach($interviews as $interview)
    <div class="col-12">
      <div>
        	<h3 class="text-center mb-3 mt-3">{{$interview->name}}</h3><br>
        	@if($interview->img)
        	<img src="{{$interview->img}}" alt="{{$interview->name}}" class="float-left mr-3" style="width:30%">
        	@endif
        	<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($interview->created_at))}} <i class="fa fa-commenting-o" aria-hidden="true"></i> Комментариев:{{$interview->comments->count()}}</p>
        	<p>{!!\Str::words($interview->description, 80)!!}
        	<a href="/interviews/{{$interview->slug}}">Читать далее</a>
        </div>
    </div>
        	@endforeach
        </div>
    </div>
    <div class ="mt-5 d-flex justify-content-center">
    {{$interviews->links()}} 
</div>


@endsection