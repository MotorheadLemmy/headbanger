@extends('layouts.app')
@section('title', 'Новости -')
@section('content')
<h2 class="text-center news">Новости</h2>
<div class="container">
  <div class="row">
    
    @foreach($news as $item)
    <div class="col-12">
      <div>
        	<h3 class="text-center mb-3 mt-3">{{$item->name}}</h3><br>
        	@if($item->img)
        	<img src="{{$item->img}}" alt="{{$item->name}}" class="float-left mr-3" style="width:30%">
        	@endif
        	<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($item->created_at))}}  <i class="fa fa-commenting-o" aria-hidden="true"></i>  Комментариев:{{$item->comments->count()}}</p>
        	<p>{!!\Str::words($item->description, 40)!!}
        	<a href="/news/{{$item->slug}}">Читать далее</a>

        </div>
        

    </div>

        	@endforeach

        </div>
    </div>
    <div class ="mt-5 d-flex justify-content-center">
    {{$news->links()}} 
</div>


@endsection