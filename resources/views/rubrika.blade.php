@extends('pattern')
<title>@yield('header')Новости науки</title>

@section('nav')
@endsection
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
                                    <a href="{{ route('StatyaId', ['statya' => $i->id]) }}" class="th"><img src="{{ asset('storage/images/'.$i->image)}}" alt="desc"/></a>
                                </div>
                                <div class="nine columns">
                                    <p>{{$i->title}}</p>
                                    <p>{{$i->rubric}}</p>

                                    @can('police')
                                    <form action="{{route('delete',['id' => $i->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type=hidden name="_method" value="DELETE">
                                        <td>
                                            <div><button type="submit">Удалить</button></div>
                                        </td>
                                    </form>

                                        <form action="{{route('update',['id' => $i->id])}}" method="get">
                                            {{ csrf_field() }}
                                            <td>
                                                <div><button type="submit">Редактировать</button></div>
                                            </td>
                                        </form>
                                    @endcan

                                    @cannot('police')
                                    <p>Ошибка</p>
                                    @endcan
                                </div>
                            </article>
                        @endforeach
                    </section>

                    @can('police')
                    <section class="four columns">
                        <H3>  &nbsp; </H3>
                        <div class="panel">
                            <h3>Админ-панель</h3>
                            <ul class="accordion">
                                <li class="active">
                                    <div class="title">
                                        <a href="/main/view/add "><h5>Добавить статью</h5></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endcan
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
