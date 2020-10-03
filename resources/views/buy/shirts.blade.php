@extends('layouts.app')
@section('title', 'Купить -')
@section('content')
<h2 class="text-center my-3 news">Доступные футболки</h2><br>
<div class="container">
	<div class="row">
	@foreach($shirts as $shirt)
	<div class="col-6 col-sm-3 my-3 ">
	<a href="/buy/{{$shirt->slug}}"><img src="{{$shirt->img}}" alt="{{$shirt->name}}" class="mr-3" style="width:60%"><br>
	Цена:<br>
	€{{$shirt->price}}</a><br>
	<em><b>{{$shirt->name}}</b></em>
	
</div>



	@endforeach
</div>

	</div>


@endsection
   


