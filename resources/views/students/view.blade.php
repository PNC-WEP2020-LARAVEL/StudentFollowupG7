@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{route('students.create')}}" class="btn btn-primary text-light">Add Student</a>
    
        <table class="table table-bordered mt-3">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Year</th>
                <th>Status</th>
                <th>Tutor</th>
                <th>Action</th>
            </tr>
            @foreach($students as $student)
                 <tr>
                    <td>{{$student->firstName}}</td>
                    <td>{{$student->lastName}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->class}}</td>
                    <td>{{$student->year}}</td>
                    <td>{{$student->status}}</td>
                    <td>{{$student->user_id}}</td>
                   
                    <td>
                       
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary text-light" data-toggle="modal" data-target="#myModal">
                        In
                        </button>
                        <a class="btn btn-danger text-light">Out</a>
                    </td>
                </tr>
            @endforeach
           
        </table>
    
</div>
@endsection
