<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Payment;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()) {
        $payments = Payment::with('bank','module','enrolment')->paginate(15);
        return view("payments.index",["payments"=>$payments]);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         // Validate the request...

         $payment = new Payment;

         $payment->number = $request->number;
         $payment->amount = $request->amount;
         $payment->type = $request->type;
         $payment->reference = $request->reference;
         $payment->bank_id = $request->bank_id;
         $payment->bill = $request->bill;
         $payment->description = $request->description;
         $payment->payment_date = $request->payment_date;
         $payment->module_id = $request->module_id;
         $payment->enrolment_id = $request->enrolment_id;

         if($payment->save()){
          return redirect("/enrolments");
        }else{
          return view("/enrolments");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
