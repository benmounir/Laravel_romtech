@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb2">
        <a href="{{route('user.create')}}" class="btn btn-success">New user</a>
    </div>
    <div class="card">
        <div class="card-header">Users</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Premissions</th>
                    <th>delete</th>
                </thead>
                <tbody>
                   @if ($users->count() > 0)
                        @foreach ($users as $user)
                        <tr>
                                <td><img src="{{ asset($user->profile->avatar) }}" alt="" class="img-thumbnail" width="80" height="50"></td>
                                <td>{{ $user->name}}</td>
                                <td>
                                   @if ($user->admin)
                                        <a href="{{ route('user.not_admin', ["id" => $user->id])}}" class="btn btn-xs btn-danger">remove admin</a>
                                   @else
                                        <a href="{{ route('user.admin' , ["id" => $user->id])}}" class="btn btn-xs btn-success">make admin</a>
                                   
                                   @endif
                                <td>
                                    @if (Auth::user()->admin)
                                        <a href="{{ route('user.destroy' , ["id" => $user->id])}}" class="btn btn-xs btn-danger">deleted</a>
                                    @endif
                                </td>
                        </tr>
                            
                        @endforeach
                   @else
                        <tr>
                            <th colspan="4" class="text-center">No published posts</th>
                        </tr>
                   @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection