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

    @if(auth()->user()->status == 1)
        <h2 class="center alert-danger">Sorry, you cannot post an article, because you are blocked!</h2>
    @else
    <form method="POST" enctype="multipart/form-data" action="{{route('storeArticle')}}">
        <div class="form-group">
            <label for="title">{{ __('Title')}}</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="categories_id">{{ __('Category')}}</label>
            <select class="form-control" id="categories_id" name="categories_id">
                <option>{{__('Choose Category')}}</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="brief_desc">{{ __('Brief Description')}}</label>
            <textarea class="form-control" name="brief_desc" id="brief_desc" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="content">{{ __('Content')}}</label>
            <textarea name="content" class="form-control" id="content" rows="6"></textarea>
        </div>

    {{--    <div class="form-group row">--}}
    {{--        <label for="image" class="col-md-4 col-form-label text-md-right">Article Image</label>--}}
    {{--        <div class="col-md-6">--}}
    {{--            <input id="image" type="file" class="form-control" name="image">--}}
    {{--        </div>--}}
    {{--    </div>--}}

        <div class="form-group">
            <label for="image">{{ __('Add Image')}}</label>
            <input id="image" type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Add Article') }}</button>
        {{csrf_field()}}
    </form>
    @endif
</div>
@endsection
