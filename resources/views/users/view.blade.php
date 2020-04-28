@extends('layouts.app')
@section('content')
    <div class="sidenav bg-primary">
       <a href="{{route('students.index')}}">List All Students</a>
       <a href="{{route('users.index')}}">List All User</a>
       
   </div>
    <div class="main">
       <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <h1 class="text-center mt-5">List of all users</h1>
                    <a class="btn btn-primary mb-3" href="{{route('users.create')}}">Create New User</a>  
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstName}}</td>
                            <td>{{$user->lastName}}</td>
                            <td>{{$user->position}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
       </div>
    </div>
@endsection