<!DOCTYPE html>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en">
<html class="no-js lt-ie9 lt-ie8" lang="en">
<html class="no-js lt-ie9" lang="en">
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
{{--    <title>@yield('header')Новости науки</title>--}}
    <link rel=stylesheet href="{{ asset('storage/stylesheets/foundation.min.css') }}" type='text/css'>
    <link rel=stylesheet href="{{ asset('storage/stylesheets/main.css') }}" type='text/css'>
    <link rel=stylesheet href="{{ asset('storage/stylesheets/app.css') }}" type='text/css'>
    <script src=" {{ asset('storage/javascripts/modernizr.foundation.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('storage/fonts/ligature.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css'/>
    <script src=" {{ asset('http://html5shiv.googlecode.com/svn/trunk/html5.js') }}"></script>
</head>
<body>
<nav>
    @yield('nav')
    <div class="twelve columns header_nav">
        <div class="row">
            <ul id="menu-header" class="nav-bar horizontal">
                <li><a href="/main">Главная</a></li>
                @foreach($rubrics as $i)
                    <li><a href="{{ route('RubricId', ['rubric' => $i->rubric]) }}">{{$i->rubric}}</a></li>
                @endforeach
                <li><a href="/dashboard">Профиль</a></li>
                <li>@if(auth()->user()!=null)<a>{{auth()->user()->name}}</a>@endif</li>
                <li>@if(auth()->user()!=null)<form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();" style="color: black">
                            {{ __('Выйти') }}
                        </x-dropdown-link>
                    </form>
                    @endif
                </li>
{{--                <li><a href="{{route()}}"></a></li>--}}
            </ul>

        </div>
    </div>
</nav>

<header>
    @yield('main-header')
</header>

<section>
    @yield('main-lid')
</section>

<section style="margin-left: 100px; margin-right: 100px;">
    @yield('main-row')
</section>

<footer>
    @yield('footer')
    <div class="row">
        <div class="twelve columns footer">
            <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="twitter">Twitter</a>
            <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="facebook">Facebook</a>
            <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="pinterest">Pinterest</a>
            <a href="" class="lsf-icon" style="font-size:16px" title="instagram">Instagram</a>
        </div>
    </div>
</footer>
<script src="{{asset('storage/images/thumb2.jpg/javascripts/foundation.min.js')}}" type="text/javascript"></script>
<script src="{{asset('storage/javascripts/app.js')}}" type="text/javascript"></script>
</body>
</html>
