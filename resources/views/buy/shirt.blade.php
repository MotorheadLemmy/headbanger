@extends('layouts.app')
@section('title', 'Купить -')
@section('content')
<h2 class="text-center mb-5">{{$shirt->name}}</h2>

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-6">
				<div class="zoom-img my-3">
					<img src="{{$shirt->img}}" alt="{{$shirt->name}}" class="image minimized" data-big='{{$shirt->img}}'>
				</div>



				@if($shirt->img1)
				
					<img src="{{$shirt->img1}}" alt="{{$shirt->name}}" class="mr-3 image minimized" style="width:20%">

				 @endif
				 @if($shirt->img2)
					<img src="{{$shirt->img2}}" alt="{{$shirt->name}}" class="mr-3 image minimized" style="width:20%">
					
				 @endif

		</div>
		<div class="col-12 col-sm-6">
			
			<span class="priceshirt">Цена:<br>
			€ {{$shirt->price}}</span><br>
			<em><b>{{$shirt->description}}</b></em>


			<form action="/" class="add-to-cart">
				@csrf
			   <p><b>Выберите размер футболки</b></p>
			    <p><input name="size" type="radio" value="S">S</p>
			    <p><input name="size" type="radio" value="M">M</p>
			    <p><input name="size" type="radio" value="L" checked>L</p>
			    <p><input name="size" type="radio" value="XL">XL</p>
				
				<input type="number" name="qty" value="1" class="widthinput">
				<input type="hidden" name="shirt_id" value="{{$shirt->id}}">
				<button class="btn btn-primary">Добавить в корзину</button>
			</form>
		</div>
	</div>





</div>









@endsection