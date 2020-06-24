@extends('layouts.mainview')
@section('content')
    <div class="container">
        <div class="row">
            @if($article)
                <div id="article">
                    <h2>{{$article->title}}</h2>
                    <h5>{{ ('Category') }}: {{$category->category}}</h5>
                    <h6>{{ ('Added') }}: {{$article->created_at}}</h6>
                    <img id="articleimg" src="{{$article->image}}" />
                    <p>{!!$article->content!!}</p>
                </div>
        </div>
        <div class="comments">
            <ul class="list-group">
                @foreach($comments as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment->created_at }}</strong>
                        {{$comment->comm_content}}
                    </li>
                @endforeach
            </ul>
        </div>
        @auth
            @if (auth()->user()->role == 0 || auth()->user()->role == 1 || auth()->user()->role == 2)
                <div>
                    <form method="POST" action="{{route('storeComment',['id'=>$id])}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="comm_content" placeholder="Your comment" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add comment</button>
                        </div>
                    </form>
                </div>
            @endif
        @endauth
        @guest
            <h1 class = "center"><a href="{{route('login')}}">Register to add comment</a></h1>
        @endguest
    </div>
    @endif
@endsection
