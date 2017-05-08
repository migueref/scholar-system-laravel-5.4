<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()) {
        $students = Student::all();
        return view("students.index",["students"=>$students]);
      } else {
        return view("auth.login");
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Auth::user()) {
        $student = new Student;
        return view("students.create",["student"=>$student]);
      } else {
        return view("auth.login");
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $student = new Student;
      $student->firstname = $request->firstname;
      $student->middlename = $request->middlename;
      $student->lastname = $request->lastname;
      $student->email = $request->email;
      $student->phone = $request->phone;
      $student->mobile = $request->mobile;
      if($student->save()){
        return redirect("/students");
      }else{
        return view("students.create");
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Auth::user()) {
        $student = Student::find($id);
        return view("students.edit",["student"=>$student]);
      } else {
        return view("auth.login");
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if(Auth::user()) {
        $student = Student::find($id);
        $student->firstname = $request->firstname;
        $student->middlename = $request->middlename;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->mobile = $request->mobile;
        if($student->save()){
          return redirect("/students");
        }else{
          return view("students.edit",["student"=>$student]);
        }
      } else {
        return view("auth.login");
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Student::destroy($id);
      return redirect('/students');
    }
}
