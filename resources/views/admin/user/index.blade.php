@extends('admin.master')
@section('box-title','List Users')


@section('content')
    <table class="table table-hover" id="app-table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Profile</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Actions</th>
        </thead>

        <tbody>
            @foreach ($users as $user)
        
            <tr >
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><img src="{{"$user->profile"}}" width="50"  alt=""></td>
            <td>{{$user->role}}</td>
            <td>{{$user->phone}}</td>
                <td>
                    <button class="btn btn-info">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection