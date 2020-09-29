<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Shirt;
use App\Order;
use App\OrderItem;
use Mail;



class CartController extends Controller
{
    public function add(Request $request)
    {

    	//\Session::put('cart','hello');
    	$shirt=Shirt::find($request->shirt_id);

    	$cart=new CartService();
    	$cart->add($shirt,$request->size,$request->qty);
    	return view('buy._cart');
    	//return $request->all();
    }
     public function clear()
    {
    	CartService::clear();
    	return view('buy._cart');
    
    	
    }
    public function remove(Request $request)
    {
        CartService::remove($request->shirt_id,$request->size);

        return view('buy._cart');
        
    }
    public function checkout()
    {
        return view('buy.checkout');
    }
     public function endCheckout()
    {
        $order=new Order();
        $order->user_id=\Auth::user()->id;
        $order->total_sum=session('totalSum');
        $order->save();

        foreach(session('cart') as $shirt){
            $item=new OrderItem();
            $item->name=$shirt['name'];
            $item->img=$shirt['img'];
            $item->price=$shirt['price'];
            $item->qty=$shirt['qty'];
            $item->size=$shirt['size'];
            $item->order_id=$order->id;
            $item->save();
        }
        Mail::send('email.order',compact('order'),function($m){
            $m->to('lose2240@gmail.com');
            

        });
        CartService::clear();
        return redirect('/')->with('success','Спасибо за покупку.Проверьте письмо на почте!');
        
    }

}
