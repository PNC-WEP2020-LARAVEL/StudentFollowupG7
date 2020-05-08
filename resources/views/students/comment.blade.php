   @extends('layouts.app')

   @section('content')
   <!-- Styles -->
   <div class="sidenav bg-primary">
       <a href="{{route('students.index')}}">List All Students</a>
       <a href="{{route('users.index')}}">List All User</a>

   </div>
   <div class="main">
       <div class="container">
           <div class="row mt-3">
                <div class="col-3"></div>
               <div class="col-6 mt-5">
                    <img class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}" height="180" width="180" class="img-fluid">
                    <br>
                    <div class= "card">
                        <div class="card-header">
                            @foreach($student->comments as $comment)
                            <h5>{{$comment->user['firstName']." ".$comment->user['lastName']}}</h5>
                            {{$comment->comment}}
                        @endforeach 
                        </div>
                        <div class="card-body">
                            <form action="{{route('commentStudent', $student->id)}}" method="post">
                            @csrf
                                <textarea class="form-control" rows="5" name="comment" placeholder="Comment Here"></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Send</button>
                            </form>
                        </div>
                    </div>
               </div>
               <div class="col-3"></div>
           </div>
       </div>
   </div>
   @endsection
