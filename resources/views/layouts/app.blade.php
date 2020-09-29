<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') Headbanger</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


     <link rel="shortcut icon" href="/favicon.ico" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm auth">
            <div class="container">
                <a class="headbanger" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                     
                  <li class="nav-item">
                        <form method="GET" action="{{route('search.results')}}" class="form-inline my-2 my-lg-0">
      <input name="query" class="form-control mr-sm-2 mr-3" type="text" placeholder="Поиск" aria-label="Search">
      <button class="btn btn-outline-success mr-3" type="submit">Поиск</button>
    </form>
  </li>
               
             <li class="nav-item">
            
                <button type="button" class="btn btn-secondary cartbtn" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-shopping-cart  fa-2x" aria-hidden="true" >
Корзина(<span class="count">{{ session('cart') ? array_sum(array_column(session('cart'), 'qty')) : 0}}</span>)</i>
</button>
                    

     </li>

        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Выйти') }}
          </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
  @endguest
    </ul>
</div>
</div>
</nav>
          <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-center h2">
      <a class="p-2 text-muted {{Request::is('/')?'active':''}}" href="/">Главная</a>
      <a class="p-2 text-muted {{(Request::is('news')||Request::is('news/*'))?'active':''}}" href="/news">Новости</a>
      <a class="p-2 text-muted {{(Request::is('reviews')||Request::is('reviews/*'))?'active':''}}" href="/reviews">Рецензии</a>
      <a class="p-2 text-muted {{(Request::is('interviews')||Request::is('interviews/*'))?'active':''}}" href="/interviews">Интервью</a>
      <a class="p-2 text-muted {{(Request::is('buy')||Request::is('buy/*'))?'active':''}}" href="/buy">Купить</a>
      <a class="p-2 text-muted {{(Request::is('contacts')||Request::is('contacts/*'))?'active':''}}" href="/contacts">Контакты</a>

    </nav>

  </div>

  @if(Request::is('/'))
  @include('main.hello')
  @endif

        <main class="py-2">
            @yield('content')
        </main>
    </div>
  <footer class="pt-4 my-md-5 pt-md-5 border-top">

    
    <div class="row justify-content-center">
      
      <div class="wrapper">
   <a target="_blank" href="#"><i class="fa fa-3x fa-instagram"></i></a>
   <a target="_blank" href="#"><i class="fa fa-3x fa-facebook-square"></i></a>
   <a target="_blank" href="#"><i class="fa fa-3x fa-twitter-square"></i>
</a>

      </div>

    </div>
    <div class="row justify-content-center">
      <p>2020 Headbanger</p>
    </div>
    
  </footer>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        @include('buy._cart')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        
        <a href="/checkout" type="button" class="btn btn-primary">Оформление заказа</a>
        <button type="button" class="btn btn-danger clear-cart">Очистить корзину</button>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>
