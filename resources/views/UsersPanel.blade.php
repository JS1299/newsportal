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
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            @if($user->image != "")<img src="{{ $user->image }}" style="width: 40px; height: 40px; border-radius: 50%; margin-bottom: 5px;"/>
                                            @else <i class="alert-danger">[No image]</i>
                                            @endif
                                        {{ $user->name }}
                                                @if(auth()->user() == $user)
                                                    <strong class="alert-danger">It's you!</strong>
                                                @endif</td>

                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->role == 0)User
                                            @elseif($user->role == 1) Administrator
                                            @else Moderator
                                        @endif
                                        </td>
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
