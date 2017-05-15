<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Group;
use App\Enrolment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $enrolments = array();
      $groups = Group::pluck('shortname', 'id');
      return view("home.index",["groups"=>$groups,"enrolments"=>$enrolments]);
    }
    public function findByGroup() {
      $groups = Group::pluck('shortname', 'id');
      $id = Input::get('group_id');
      $enrolments = Enrolment::where('group_id',$id)
               ->orderBy('id', 'desc')
               ->take(10)
               ->get();
      return view("home.index",["groups"=>$groups,"enrolments"=>$enrolments]);
    }
    public function findByStudent() {
      $id = Input::get('student_id');
      $student = Input::get('student_name');
      if($id) {
        $groups = Group::pluck('shortname', 'id');
        $enrolments = Enrolment::orWhere('registration_number', 'like', '%' . $id . '%')
                 ->orderBy('id', 'desc')
                 ->take(10)
                 ->get();
        return view("home.index",["groups"=>$groups,"enrolments"=>$enrolments]);
      } else {
        $groups = Group::pluck('shortname', 'id');
        $enrolments = Enrolment::join('students', 'enrolments.student_id', '=', 'students.id')
                                ->orWhere('students.firstname', 'like', '%' . $student . '%')
                                ->orWhere('students.middlename', 'like', '%' . $student . '%')
                                ->orWhere('students.lastname', 'like', '%' . $student . '%')
                                ->orWhere('students.email', 'like', '%' . $student . '%')
                                ->orWhere('students.phone', 'like', '%' . $student . '%')
                                ->orWhere('students.mobile', 'like', '%' . $student . '%')

                                ->get();
        return view("home.index",["groups"=>$groups,"enrolments"=>$enrolments]);
      }

    }
}
