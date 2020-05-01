   @extends('layouts.app')

   @section('content')
   <!-- Styles -->
   <div class="sidenav bg-primary">
        <a href="{{route('students.index')}}">List All Students</a>
        <a href="{{route('users.index')}}">List All User</a>
        
   </div>
   <div class="main">
       <div class="container">
           <div class="row">
               <div class="col-12 mt-5">
                    <h1 class="mt-5 text-center">List of all Studnets</h1>
                   <a href="{{route('students.create')}}" class="btn btn-primary text-light">Add Student</a>
                   <table class="table table-bordered mt-3">
                       <tr>
                           <th>ID</th>
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
                           <td >
                                <a href="{{route('students.show', $student->id)}}"><i class="material-icons float-left">remove_red_eye</i></a> &nbsp;
                                {{$student->id}}
                           </td>
                           <td>{{$student->firstName}}</td>
                           <td>{{$student->lastName}}</td>
                           <td>{{$student->gender}}</td>
                           <td>{{$student->class}}</td>
                           <td>{{$student->year}}</td>
                           <td class="text-danger">{{$student->status}}</td>
                           <td>{{$student->user['firstName']." ".$student->user['lastName']}}</td>
                           <td>
                               <div class="form-inline">
                                   <!-- Button to Open the Modal -->
                                   <button type="button" class="btn btn-primary text-light" data-toggle="modal" data-target="#myModal{{$student->id}}">
                                       In
                                   </button>

                                   <!-- The Modal -->
                                   <div class="modal" id="myModal{{$student->id}}">

                                       <div class="modal-dialog">
                                           <div class="modal-content">

                                               <!-- Modal Header -->
                                               <div class="modal-header">
                                                   <h4 class="modal-title">Choose Tutor</h4>
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               </div>

                                               <!-- Modal body -->
                                               <div class="modal-body">

                                                   <form action="{{route('addTutor', $student->id)}}" method="post">

                                                       @method('POST')
                                                       @csrf

                                                       <div class="form-group">
                                                           <select class="form-control" name="tutor">
                                                               @foreach($users as $user)
                                                               @if($user->role_id == 2)
                                                               <option value="{{$user->id}}">{{$user->firstName." ".$user->lastName}}</option>
                                                               @endif
                                                               @endforeach
                                                           </select>
                                                       </div>
                                                       <br>
                                                       <button class="btn btn-primary">In follow up</button>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                   </div>&nbsp;
                                   <form action="{{route('outFollowUp', $student->id)}}" method="post">
                                       @csrf
                                       @method('post')
                                       <button class="btn btn-danger text-light">Out</button>
                                   </form>
                               </div>
                           </td>
                       </tr>
                       @endforeach
                   </table>

               </div>
           </div>
       </div>

   </div>
   @endsection
