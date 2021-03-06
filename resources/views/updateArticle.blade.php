@extends('layouts.mainview')
@section('content')
    <div class="container" id="forma">
        @if ($errors->any())
            <div>
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <form action="{{route('updateArticle',['article'=>$article])}}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            <div class="form-group">
                <label for="title">{{ __('Title')}}</label>
                <input type="text" value="{{$article->title}}" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="categories_id">{{ __('Category') }}</label>
                <select class="form-control" id="categories_id" name="categories_id">
                    <option value="">{{__('Choose a category')}}</option>
                    @foreach($categories as $category)
                        @if($article->categories_id == $category->id)
                            <option selected="selected" value="{{$category->id}}">{{$category->category}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->category}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="brief_desc">{{ __('Brief Description')}}</label>
                <textarea class="form-control" name="brief_desc" id="brief_desc" rows="3">{{$article->brief_desc}}</textarea>
            </div>

            <div class="form-group">
                <label for="content">{{ __('Content')}}</label>
                <textarea name="content" class="form-control" id="content" rows="6">{{$article->content}}</textarea>
            </div>

            <div class="form-group">
                <label for="image">{{ __('Add Image')}}</label>
                <input id="image" type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Update Article')}}</button>
            {{csrf_field()}}
        </form>
    </div>
@endsection
