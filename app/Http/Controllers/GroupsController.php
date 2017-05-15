<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Group;
use App\Course;
use DB;


class GroupsController extends Controller
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
        $groups = Group::with('course')->get();
        return view("groups.index",["groups"=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::select(
            DB::raw("CONCAT(shortname,' - ',name) AS name"),'id')
            ->pluck('name', 'id');
        $group = new Group;
        return view("groups.create",["group"=>$group,"courses"=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $group = new Group;
      $group->shortname = $request->shortname;
      $group->course_id = $request->course_id;
      if($group->save()){
        return redirect("/groups");
      }else{
        return view("groups.create");
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
      $group = Group::find($id);
      return view("home.index",["group"=>$group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::select(
            DB::raw("CONCAT(shortname,' - ',name) AS name"),'id')
            ->pluck('name', 'id');
        $group = Group::find($id);
        return view("groups.edit",["group"=>$group,"courses"=>$courses]);
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
      $group = Group::find($id);
      $group->shortname = $request->shortname;
      $group->course_id = $request->course_id;
      if($group->save()){
        return redirect("/groups");
      }else{
        return view("groups.edit",["group"=>$group]);
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
      Group::destroy($id);
      return redirect('/groups');
    }
}
