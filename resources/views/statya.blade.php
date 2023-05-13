@extends('pattern')
@foreach($news as $news)
<title>{{$news->title}}</title>
@section('main-lid')
    <section class="section_light">
        <div class="row">
            <p><img src="{{ asset('storage/images/' . $news->image)}}" alt="desc" width=400 align=left hspace=30>{{$news->content}}</p>
        </div>
    </section>

@endsection

@section('main-header')
    <div class="row">
        <h4>{{$news->rubric}}</h4>
        <article>
            <div class="twelve columns">
                <h1>{{$news->title}}</h1>
                <p class="excerpt">{{$news->lid}}</p>
            </div>
        </article>
    </div>
@endsection
@endforeach
