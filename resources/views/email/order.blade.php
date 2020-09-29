<h1> Новый заказ #{{$order->id}}</h1>
Пользователь:{{$order->user->name}}<br>
Общая сумма:{{$order->total_sum}}
<hr>

<table class="table">
	<thead>
		<tr>
			<th>Фото</th>
			<th>Название</th>
			<th>Цена</th>
			<th>Размер</th>
			<th>Количество</th>
			<th>Сумма</th>
		</tr>
	</thead>
	<tbody>
		@foreach(session('cart') as $shirt)
		<tr>
			<td><img src="{{env('APP_URL')}}/{{$shirt['img']}}" alt="" style="width:70px"></td>
			<td>{{$shirt['name']}}</td>
			<td>{{$shirt['price']}}</td>
			<td>{{$shirt['size']}}</td>
			<td>{{$shirt['qty']}}</td>
			<td>{{$shirt['price']*$shirt['qty']}}</td>
		</tr>
		@endforeach
	</tbody>
	
</table>