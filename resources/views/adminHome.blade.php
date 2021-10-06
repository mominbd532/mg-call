@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}
                        <a href="{{route('add.user')}}" class="btn btn-sm btn-info float-right">Add User</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as  $key => $user)
                                <tr>

                                    <th scope="row">{{$key +1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->status == 1)
                                            <span style="color: green;">Active</span>
                                        @else
                                            <span style="color: red;">Deactive</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if($user->status == 1)
                                            <a href="#" class="btn btn-sm btn-danger">Dective Use</a>
                                        @else
                                            <a href="#" class="btn btn-sm btn-success">Active User</a>
                                        @endif

                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
