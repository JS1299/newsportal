@extends('layouts.mainview')
@section('content')
    <div class="container">
        <div class="row">
        @if($article)
            <div id="article">
                <h2>{{$article->title}}</h2>
                <h5>Kategorija: {{$article->category}}</h5>
                <h6>Pievienots: {{$article->created_at}}</h6>
                <img id="articleimg" src="{{$article->image}}" />
                <p>{!!$article->content!!}</p>
            </div>
        </div>
    </div>
    @endif
@endsection
