@extends('layouts.mainview')
@section('content')
    @if(count($articles) > 0)
        <div>
            <h2 class="center category">Sorted by {{$category}}</h2>
        </div>
        <div class="container" id="ots">
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-4" id="articlepadding">
                        <a class="articles" href="{{ route('showArticle', ['id'=>$article->id]) }}"><h2>{{$article->title}}</h2></a>
                        <img class="photos" src="{{$article->image}}">
                        <p>{{$article->brief_desc}}</p>
                        {{--                <p><a class="btn btn-secondary" href="#" role="button">Lasīt vairāk&raquo;</a></p>--}}
                        @auth()
                            @if(auth()->user()->role == 1 || auth()->user()->role == 2)
                                <a href="{{route('showArticleEdit',['article'=>$article->id])}}" id="edita"><img id="edit" src="https://img.icons8.com/fluent/48/000000/edit.png"/></a>
                                <form action="{{route('deleteArticle', ['article'=>$article->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button id="wborder" type="submit">
                                        <img alt="Delete" id="edit" src="https://img.icons8.com/flat_round/64/000000/delete-sign.png"/>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="category">
            <h2 class="alert-danger center">There are no articles with category {{$category}}</h2>
        </div>
    @endif
    <hr>
    <p class="center">This site was developed by Jurijs Šļuncevs (js19100) and Jevgenijs Rubcovs (jr19024)</p>
@endsection
