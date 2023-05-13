@extends('pattern')
@section('nav')
@endsection

@can('police')
    @section('main-row')
        @foreach($up as $i)
        <form method="post" action="{{ route('update_form') }}">
            {{csrf_field()}}
            <p><input name="id" type="hidden" value="{{$i->id}}" ></p>
            <p>title<input name="title" type="text" value="{{$i->title}}"></p>
            <p>lid <input name="lid" type="text" value="{{$i->lid}}"></p>
            <p>content <input name="content" type="text" value="{{$i->content}}"></p>
            <p>rubric<input type="text" value="{{$i->rubric}}"></p>
            <select name="rubric">
                @foreach($rubrics as $j)
                    @if($j->rubric == $i->rubric)
                        <option selected value="{{$j->rubric}}">{{$j->rubric}}</option>
                    @else
                        <option value="{{$j->rubric}}">{{$j->rubric}}</option>
                    @endif
                @endforeach
            </select>
            <select name="image">
                @foreach(glob('storage/images/*') as $file)
                    @if($i->image == basename($file))
                        <option selected value="{{basename($file)}}">{{basename($file)}}</option>
                    @else
                        <option value="{{basename($file)}}">{{basename($file)}}</option>
                    @endif
                @endforeach
            </select>
            <p>
                <input type="submit" value="Изменить">
            </p>
        </form>
        @endforeach
        @if(count($errors)>0)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    @endsection
@endcan

