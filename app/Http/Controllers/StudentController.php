<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\Comment;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $students = Student::all();
        return view('students.view', compact('students', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->gender = $request->gender;
        $student->class = $request->class;
        $student->year = $request->year;
        $student->province = $request->province;
        $student->status = "Normal";
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('img/', $filename);
            $student->picture = $filename;
        }
        $student->save();
        return redirect('students'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.detail', compact('student'));
    }

    public function addTutor(Request $request, $id){
        $student = Student::find($id);
        $student->user_id = $request->tutor;
        $student->status = "Follow up";
        $student->save();
        return redirect('students'); 
    }
    public function outFollowUp($id){
        $student = Student::find($id);
        $student->status = "Out follow up";
        $student->user_id = null;
        $student->save();
        return redirect('students'); 
    }
    public function getCommentForm($id){
        $student = Student::find($id);
        return view('students.comment', compact('student'));
    }
    public function commentStudent(Request $request, $id){
        $student = Student::find($id);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->student_id = $student->id;
        $comment->user_id = auth::id();
        $comment->save();
        return redirect('getCommentForm/'.$student->id); 
    }
}
