<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jobs;
use App\employees;
class employeesController extends Controller
{

    // $this->middleware('check_owner')->except('');
    // $this->middleware('check_owner')->only('');
    // Mern Stack
    // MongoDB , NodeJS, Exprecces Js, React Js

    public function __construct() {
        $this->middleware('check_owner');
    }

    public function index()
    {
        $id = auth()->user()->halls_id ;
        $employees = employees::with('jobs')->where('halls_id','=',$id)->get();
        return view('employee.index')->with([
            'employees' => $employees,
        ]);
    }

    public function create()
    {
        $id = auth()->user()->halls_id ;
        $jobs=jobs::where('halls_id','=',$id)->get();
        return view('employee.create')->with([
            'jobs' => $jobs,
        ]);
    }

    public function store(Request $request)
    { 
        //employees::user()->create();
        $id = auth()->user()->halls_id;
        $employees = new employees;
        $employees->name = request("name");
        $employees->address = request("address");
        $employees->phone = request("phone");
        $employees->jobs_id = request("jobs_id");
        $employees->halls_id =$id;
        $employees->salary = request("salary");
        $employees->state = request("state");
        $employees->save();

        $id = employees::max('id');
        $employees = employees::with('jobs')->find($id);  
        return view('employee.show')->with([
            'employees' => $employees,

        ]);
    }


    public function show($id)
    {
        $employees = employees::with('jobs')->find($id);  
        return view('employee.show')->with([
            'employees' => $employees,

        ]);
    }

 
    public function edit($id)
    {
        $jobs=jobs::all();
        $employees = employees::find($id);
        return view('employee.edit')->with([
            'jobs' => $jobs,
            'employees' => $employees,
        ]);
    }


    public function update(Request $request, $id)
    {
        
        $employees = employees::find($id);
        $employees->name = request("name");
        $employees->address = request("address");
        $employees->phone = request("phone");
        $employees->jobs_id = request("jobs_id");
        $employees->halls_id =$id;
        $employees->salary = request("salary");
        $employees->state = request("state");
        $employees->save();
        $employees = employees::with('jobs')->find($id);  
        return view('employee.show')->with([
            'employees' => $employees,

        ]);
    }

    public function destroy($id)
    {
        $employees = employees::find($id); //
        $employees->delete();
        $id = auth()->user()->halls_id ;
        $employees = employees::with('jobs')->where('halls_id','=',$id)->get();
        return view('employee.index')->with([
            'employees' => $employees,
        ]); 
    }
}
