@extends('pattern')
<title>@yield('header')Новости науки</title>

@section('main-header')
    <div class="row">
        <h1>@yield('header')Новости науки</h1>
        @endsection

        @section('main-lid')
            <div class="section_main">
                <div class="row">
                    <section class="eight columns">
                        @foreach($news as $i)
                            <article class="blog_post">
                                <div class="three columns">
                                    <a href="{{ route('RubricId', ['rubric' => $i->rubric]) }}" class="th"><img src="{{ asset('storage/images/' . $i->image)}}" alt="desc"/></a>
{{--                                    <x-slot name="trigger">--}}
{{--                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">--}}
{{--                                            <div>{{ Auth::user()->name }}</div>--}}

{{--                                            <div class="ml-1">--}}
{{--                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                        </button>--}}
{{--                                    </x-slot>--}}
                                </div>
                                <div class="nine columns">
                                    <a href="{{ route('RubricId', ['rubric' => $i->rubric]) }}"><h4>{{$i->title}}</h4></a>
                                    <p>{{$i->rubric}}</p>
                                </div>
                            </article>
                        @endforeach
                    </section>
                </div>
            </div>
        @endsection

        @section('main-row')
            <div class="section_dark">
                <div class="row">
                    <h2></h2>
                    <div class="two columns">
                        <img src="{{asset('storage/images/thumb1.jpg')}}" alt="desc"/>
                    </div>
                    <div class="two columns">
                        <img src="{{asset('storage/images/thumb2.jpg')}}" alt="desc"/>
                    </div>
                    <div class="two columns">
                        <img src="{{asset('storage/images/thumb3.jpg')}}" alt="desc"/>
                    </div>
                    <div class="two columns">
                        <img src="{{asset('storage/images/thumb4.jpg')}}" alt="desc"/>
                    </div>
                    <div class="two columns">
                        <img src="{{asset('storage/images/thumb5.jpg')}}" alt="desc"/>
                    </div>
                    <div class="two columns">
                        <img src="{{asset('storage/images/thumb6.jpg')}}" alt="desc"/>
                    </div>
                </div>
            </div>
@endsection
