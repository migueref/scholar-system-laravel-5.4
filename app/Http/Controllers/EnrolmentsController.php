<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Enrolment;
use App\Payment;
use App\Bank;
use App\Group;
use App\Student;
use App\Module;
use DB;

class EnrolmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $enrolments = Enrolment::with('student','group')->paginate(20);
        return view("enrolments.index",["enrolments"=>$enrolments]);
    }
    public function edit($id)
    {
        $groups = Group::pluck('shortname', 'id');
        $students = Student::select(
            DB::raw("CONCAT(firstname,' ',middlename,' ',lastname) AS name"),'id')
            ->pluck('name', 'id');
        $enrolment = Enrolment::find($id);
        return view("enrolments.edit",["enrolment"=>$enrolment,"groups"=>$groups,"students"=>$students]);
    }
    public function payments($id)
    {
        $banks = Bank::pluck('name', 'id');
        $modules = Module::pluck('number', 'id');
        $enrolment = Enrolment::with('student','group')->where('id', $id)->first();
        $payments = Payment::with('bank','module','enrolment')->where('enrolment_id', $id)->paginate(1);
        return view("enrolments.payment",["enrolment"=>$enrolment,"banks"=>$banks,"modules"=>$modules,"payments"=>$payments]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::pluck('shortname', 'id');
        $students = Student::select(
            DB::raw("CONCAT(firstname,' ',middlename,' ',lastname) AS name"),'id')
            ->pluck('name', 'id');
        $enrolment = new Enrolment;
        return view("enrolments.create",["enrolment"=>$enrolment,"groups"=>$groups,"students"=>$students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $enrolment = new Enrolment;
      $enrolment->group_id = $request->group_id;
      $enrolment->student_id = $request->student_id;
      $enrolment->state = $request->state;
      $enrolment->discount = $request->discount;
      $enrolment->surcharge = $request->surcharge;
      $enrolment->registration_number = $request->registration_number;
      $enrolment->enrolment_date = $request->enrolment_date;
      $enrolment->due_date = $request->due_date;
      $enrolment->description = $request->description;
      if($enrolment->save()){
        return redirect("/enrolments");
      }else{
        return view("enrolments.create");
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $enrolment = Enrolment::find($id);
        $enrolment->group_id = $request->group_id;
        $enrolment->student_id = $request->student_id;
        $enrolment->state = $request->state;
        $enrolment->discount = $request->discount;
        $enrolment->surcharge = $request->surcharge;
        $enrolment->registration_number = $request->registration_number;
        $enrolment->enrolment_date = $request->enrolment_date;
        $enrolment->due_date = $request->due_date;
        $enrolment->description = $request->description;
        if($enrolment->save()){
          return redirect("/enrolments");
        }else{
          return view("enrolments.create");
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
      Enrolment::destroy($id);
      return redirect('/enrolments');
    }
}
