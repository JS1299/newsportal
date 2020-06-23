@extends('layouts.mainview')
@section('content')
    <div class="pt-5 container">
        <div class="row">
            <div class="pt-5 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><a href="#">Suspend user</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                         <td colspan="2">No user available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
