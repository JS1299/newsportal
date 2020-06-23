@extends('layouts.mainview')
@section('content')
    <div class="pt-5 position-absolute m-5">
        <h1>Fill a new user's credentials:</h1>
        <form method="POST" action="#" oninput='pw1.setCustomValidity(pw1.value != pw2.value ? "Passwords do not match!" : "")'>
            <div class="form-group pt-5">
                <label>Name</label>
                <input name="nm" type="text" class="form-control"  placeholder="Full name">
            </div>

            <div class="form-group">
                <label>Role</label>
                <input class="form-control" placeholder="0-2">
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input name="email" type="email" class="form-control" >
            </div>
            <div class="form-group">
                <label>Password</label>
                <input id="pw1" name="pw" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label>Confirm password</label>
                <input id="pw2" name="pw" type="password" name="pw" class="form-control" id="exampleInputPassword1" >
            </div>
            <button type="submit" class="btn btn-primary">Add a new user</button>
        </form>
    </div>
@endsection
