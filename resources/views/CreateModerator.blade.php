@extends('layouts.mainview')
@section('content')
    <div id="forma" class="container">
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
        <div>
            <h1>Fill a new moderator's credentials:</h1>
            <form action="{{route('storeModerator')}}" method="POST">
                <div class="form-group pt-5">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control"  placeholder="Full name">
                </div>

                <div class="form-group">
                    <label>Email address</label>
                    <input name="email" type="email" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input id="pw1" name="password" type="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Add a new moderator</button>
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection
