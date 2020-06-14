@extends('layouts.mainview')
@section('content')

    <div class="container" id="ots">
        <div class="row">
        @foreach($articles as $article)
            <div class="col-md-4">
                <img class="photos" src="{{$article->image}}">
                <a class="articles" href="{{ route('showArticle', ['id'=>$article->id]) }}"><h2>{{$article->title}}</h2></a>
                <p>{{$article->brief_desc}}</p>
{{--                <p><a class="btn btn-secondary" href="#" role="button">Lasīt vairāk&raquo;</a></p>--}}
            </div>
        @endforeach
        </div>
    </div>
@endsection
