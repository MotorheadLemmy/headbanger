@extends('layouts.app')
@section('title', 'Оформление заказа -')
@section('content')
<div class="container">
	
<h1>Оформление заказа</h1>

	<div class="modal-body">
		@include('buy._cart')
	</div>

@guest
<p><a href="{{route('login')}}">Войдите</a> или <a href="{{route('register')}}">Зарегистрируйтесь</a></p>
@else
@if(session('cart'))
<a href="/end-checkout" class="btn btn-primary">Завершить оформление заказа</a>
</div>
@endif

@endguest




@endsection