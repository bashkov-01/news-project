@extends('pattern')
@section('nav')
@endsection

@can('police')
@section('main-row')
    <form method="post" action="{{route('add_news')}}">
        {{csrf_field()}}
        <p>title<input name="title" type="text" ></p>
        <p>lid <input name="lid" type="text"></p>
        <p>content <input name="content" type="text"></p>
        <select name="rubric">
            @foreach($news as $j)
                <option selected value="{{$j->rubric}}">{{$j->rubric}}</option>
            @endforeach
        </select>
        <select name="image">
            @foreach(glob('storage/images/*') as $file)
                <option selected value="{{basename($file)}}">{{basename($file)}}</option>
            @endforeach
        </select>
        <p>
            <input type="submit" value="Добавить">
        </p>
    </form>
    @if(count($errors)>0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
@endsection
@endcan

