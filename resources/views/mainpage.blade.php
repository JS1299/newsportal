@extends('layouts.mainview')
@section('content')
    <div class="container" id="ots">
        <div class="row">
        @foreach($articles as $article)
            <div class="col-md-4" id="articlepadding">
                <a class="articles" href="{{ route('showArticle', ['id'=>$article->id]) }}"><h2>{{$article->title}}</h2></a>
                <img class="photos" src="{{$article->image}}">
                <p>{{$article->brief_desc}}</p>
{{--                <p><a class="btn btn-secondary" href="#" role="button">Lasīt vairāk&raquo;</a></p>--}}
                @auth()
                        @if (auth()->user()->role == 0 || auth()->user()->role == 1 || auth()->user()->role == 2)
                            <div>
                                <div>
                                    <form method="POST" action="/article/{{ $article->id }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea name="cm" placeholder="Your comment" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Add comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                    @endif
                @endauth
            </div>
        @endforeach
        </div>
    </div>
    <hr>
    <p class="center">This site was developed by Jurijs Šļuncevs (js19100) and Jevgenijs Rubcovs (jr19024)</p>
@endsection
