<?php 
namespace App\Http\Services;
use Session;
class CartService{
	public function add($shirt,$size,$qty)
	{
		if(Session::get("cart.shirt_{$shirt->id}_{$size}")){
			$oldQty=Session::get("cart.shirt_{$shirt->id}_{$size}.qty");
			Session::put("cart.shirt_{$shirt->id}_{$size}.qty",$qty+$oldQty);
		}
		else{
	  Session::put("cart.shirt_{$shirt->id}_{$size}.name",$shirt->name);
	  Session::put("cart.shirt_{$shirt->id}_{$size}.img",$shirt->img);
	  Session::put("cart.shirt_{$shirt->id}_{$size}.price",$shirt->price);
	  Session::put("cart.shirt_{$shirt->id}_{$size}.size",$size);
	  Session::put("cart.shirt_{$shirt->id}_{$size}.id",$shirt->id);
	  Session::put("cart.shirt_{$shirt->id}_{$size}.qty",$qty);
	}
	self::totalSum();
	}
	public static function totalSum()
	{
		$summa=0;
		foreach(session('cart') as $shirt){
			$summa+=$shirt['price']*$shirt['qty'];
		}
		Session::put('totalSum',$summa);
	}
	public static function clear()
	{
		Session::forget('cart');
		Session::forget('totalSum');
	}
	public static function remove($id,$size)
	{
		Session::forget('cart.shirt_'. $id .'_'. $size);
		self::totalSum();
		
	}

		
	}
