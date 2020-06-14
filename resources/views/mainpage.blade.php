@extends('layouts.mainview')
@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
        @foreach($articles as $article)
            <div class="col-md-4">
                <h2>{{$article->title}}</h2>
                <p>{{$article->brief_desc}}</p>
                <p><a class="btn btn-secondary" href="#" role="button">Lasīt vairāk&raquo;</a></p>
            </div>
        @endforeach
        </div>
    </div>
@endsection
