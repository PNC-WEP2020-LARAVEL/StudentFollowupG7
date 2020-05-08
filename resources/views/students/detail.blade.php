@extends('layouts.app')

   @section('content')
   <!-- Styles -->
   <div class="sidenav bg-primary">
        <a href="{{route('students.index')}}">List All Students</a>
        <a href="{{route('users.index')}}">List All User</a>  
   </div>
   <div class="main">
        <div class="container mt-5"> 
            <div class="row">
                <div class="col-3">
                    <a href="{{route('students.index')}}" class="btn btn-primary">Back</a>
                </div>
                <div class="col-6 mt-3">
                   <div class="card">
                        <div class="card-body">
                             <img class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}" height="180" width="180" class="img-fluid">
                            <br>
                            <p>Firstname: {{$student->firstName}}</p>
                            <p>Lastname: {{$student->lastName}}</p>
                            <p>Gender: {{$student->gender}}</p>
                            <p>Class: {{$student->class}}</p>
                            <p>Year: {{$student->year}}</p>
                            <p>Province: {{$student->province}}</p>
                            <p>Status: {{$student->status}}</p>
                            @if ($student->user_id != null)
                             <p>Tutor: {{$student->user['firstName']." ".$student->user['lastName']}}</p>
                                
                            @else
                                 <p>Tutor: No</p>
                            @endif
                           
                        </div>
                   </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
   </div>
@endsection
