@extends('layouts.app')
@section('title', 'Результаты поиска -')
@section('content')
<h2 class="text-center mb-5">Результаты поиска {{Request::input('query')}}:</h2>
<div class="container">
	@if(!$news->count() && !$reviews->count() && !$interviews->count() && !$shirts->count())
	<p>Ничего не найдено</p>
	@else
	<div class="row">
	@foreach($news as $onenews)
	<div class="col-12">
      <div>
        	<h3 class="text-center mb-3 mt-3">{{$onenews->name}}</h3><br>
        	@if($onenews->img)
        	<img src="{{$onenews->img}}" alt="{{$onenews->name}}" class="float-left mr-3" style="width:30%">
        	@endif
        	<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($onenews->created_at))}}  <i class="fa fa-commenting-o" aria-hidden="true"></i>  Комментариев:{{$onenews->comments->count()}}</p>
        	<p>{!!\Str::words($onenews->description, 40)!!}
        	<a href="/news/{{$onenews->slug}}">Читать далее</a></p>

        </div>
        

    </div>
	@endforeach
	@foreach($reviews as $review)
	<div class="col-12">
      <div>
        	<h3 class="text-center mb-3 mt-3">{{$review->band}}</h3><br>
            <h4 class="text-center mb-5">{{$review->album}}</h4>
        	@if($review->img)
        	<img src="{{$review->img}}" alt="{{$review->band}}" class="float-left mr-3" style="width:30%">
        	@endif
        	<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($review->created_at))}} <i class="fa fa-commenting-o" aria-hidden="true"></i>  Комментариев:{{$review->comments->count()}}</p>
        	<p>{!!\Str::words($review->description, 40)!!}
        	<a href="/reviews/{{$review->slug}}">Читать далее</a></p>
        </div>
    </div>
	@endforeach
	@foreach($interviews as $interview)
	
	<div class="col-12">
      <div>
        	<h3 class="text-center mb-3 mt-3">{{$interview->name}}</h3><br>
        	@if($interview->img)
        	<img src="{{$interview->img}}" alt="{{$interview->name}}" class="float-left mr-3" style="width:30%">
        	@endif
        	<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d.m.Y H:i', strtotime($interview->created_at))}} <i class="fa fa-commenting-o" aria-hidden="true"></i> Комментариев:{{$interview->comments->count()}}</p>
        	<p>{!!\Str::words($interview->description, 80)!!}
        	<a href="/interviews/{{$interview->slug}}">Читать далее</a></p>
        </div>
    </div>
	@endforeach
	    @foreach($shirts as $shirt)
	
		<div>
			<br>
			<div class="row my-5">
			<div class="col-5">


		<a href="/buy/{{$shirt->slug}}" class="linkshirt"><img src="{{$shirt->img}}" alt="{{$shirt->name}}" class="mr-3" style="width:80%"></a><br>
	
      </div>

  <div class="col-7">
  	<h3 class="text-center mb-3 mt-3"><a href="/buy/{{$shirt->slug}}" class="linkshirt">

  		{{$shirt->name}}</a></h3>
			
			
			<a href="/buy/{{$shirt->slug}}" class="linkshirt"><b><em>{{$shirt->description}}</em><br>
			<span class="priceshirt"> Цена:<br>
	€ {{$shirt->price}}<br></span></a></b>
	
		</div>
		
	</div>
</div>

	@endforeach
</div>

	@endif	
</div>


	


@endsection