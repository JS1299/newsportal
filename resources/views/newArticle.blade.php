@extends('layouts.mainview')
@section('content')
{{--    <div class="jumbotron">--}}
{{--        <div class="container">--}}
{{--            <div class="form">--}}
{{--                <form method="POST" action="{{route('storeArticle')}}">--}}
{{--                    <div class="form">--}}
{{--                        <label for="title">Virsraksts</label>--}}
{{--                        <input type="text" class="form_control" id="title" name="title">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="category" type="text">Kategorija</label>--}}
{{--                        <input type="text" class="form_control" id="category" name="category">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="brief_desc" type="text">Īss apraksts</label>--}}
{{--                        <input type="text" class="form_control" id="brief_desc" name="brief_desc">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="content" type="text">Saturs</label>--}}
{{--                        <input type="text" class="form_control" id="content" name="content">--}}
{{--                    </div>--}}

{{--                    <button type="submit" class="btn btn-default">Pievienot</button>--}}

{{--                    {{csrf_field()}}--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="container" id="forma">
<form method="POST" action="{{route('storeArticle')}}">
    <div class="form-group">
        <label for="title">Virsraksts</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="categories_id">Kategorija</label>
        <select class="form-control" id="categories_id" name="categories_id">
            <option>Izvēlēties kategoriju</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="brief_desc">Īss apraksts</label>
        <textarea class="form-control" name="brief_desc" id="brief_desc" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="content">Saturs</label>
        <textarea name="content" class="form-control" id="content" rows="8"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Pievienot</button>
    {{csrf_field()}}
</form>
</div>
@endsection
