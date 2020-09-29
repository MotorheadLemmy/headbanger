@if(session('cart'))
<div class="table-responsive">
<table class="table">
	<thead>
		<tr>
			<th>Фото</th>
			<th>Название</th>
			<th>Цена</th>
			<th>Размер</th>
			<th>Количество</th>
			<th>Сумма</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach(session('cart') as $shirt)
		<tr>
			<td><img src="{{$shirt['img']}}" alt="" style="width:70px"></td>
			<td>{{$shirt['name']}}</td>
			<td>{{$shirt['price']}} €</td>
			<td>{{$shirt['size']}}</td>
			<td>{{$shirt['qty']}}</td>
			<td>{{$shirt['price']*$shirt['qty']}} €</td>
			<td>
				<form class="shirt-delete">
					@csrf
					<input type="hidden" name="shirt_id" value="{{$shirt['id']}}">
					<input type="hidden" name="size" value="{{$shirt['size']}}">
					<button class="btn btn-danger">Удалить</button>
				</form>
				
			</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4" class="text-right">Общая сумма</td>
			<td colspan="2">{{session('totalSum')}} €</td>

		</tr>
	</tfoot>
</table>
</div>
<input type="hidden" class="count-in-cart" value="{{array_sum(array_column(session('cart'), 'qty'))}}">
@else
Ваша корзина пуста
@endif