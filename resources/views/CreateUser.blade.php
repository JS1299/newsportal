@extends('layouts.mainview')
@section('content')
    <div class="pt-5 position-absolute m-5">
        <h1>Fill a new user's credentials:</h1>
        <form method="POST" action="/newuser">
            <div class="form-group pt-5">
                <label for="exampleInputEmail1">Name</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Full name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="pw" type="email" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" >
            </div>
            <div class="form-check">
            </div>
            <button type="submit" class="btn btn-primary">Add a new user</button>
        </form>
    </div>
@endsection
