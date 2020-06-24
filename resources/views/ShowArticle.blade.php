@extends('layouts.mainview')
@section('content')
    <div class="container">
        <div class="row">
            @if($article)
                <div id="article">
                    <h1>{{$article->title}}</h1>
                    <h4>{{ ('Category') }}: {{$category->category}}</h4>
                    <h6>{{ ('Added') }}: {{$article->created_at}}</h6>
                    <h6>{{ ('Added by') }}: {{$article->author}}</h6>
                    <img id="articleimg" src="{{$article->image}}" />
                    <p>{!!$article->content!!}</p>
                </div>
        </div>
        <div class="comments">
            <h1 class="center">Comments</h1>
        </div>
        <div class="comments">
            @if(count($comments) > 0)
                <ul class="list-group">
                    @foreach($comments as $comment)
                        <li class="list-group-item">
                            <strong>{{ $comment->created_at }}</strong>
                            {{$comment->author}}:
                            {{$comment->comm_content}}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>There are no comments yet!</p>
            @endif
        </div>

        <div class="comments">
            <h1 class="center">Leave comment!</h1>
        </div>
        @auth
            @if (auth()->user()->role == 0 || auth()->user()->role == 1 || auth()->user()->role == 2)
                <div class="comments1">
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
            <h5 class="center"><a id="comments2" href="{{route('login')}}">Register to add comments!</a></h5>
        @endguest
    </div>
    @endif
@endsection
