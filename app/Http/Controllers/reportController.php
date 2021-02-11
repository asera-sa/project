<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employees;
use App\jobs;
use App\reservation;
use App\bills;
use App\halls;

class reportController extends Controller
{
    public function __construct() {
   //     $this->middleware('check_owner');
    }
     
    public function index()
    {
        $jobs = jobs::all();
        $reservation = reservation::all();
        $employees = employees::groupBy('salary')->get();
        return view('report.index')->with([
            'employees' => $employees,
            'jobs' => $jobs,
            'reservation' => $reservation,
        ]);
    }

    public function allEmp()
    {
        $employee = employees::all();
        $title ="قائمة بأسماء جميع الموظفين";
        $value ="";
        return view('report.allEmpView')->with([
            'employee' => $employee,
            'title' => $title,
            'value' => $value,
        ]);
    }

    public function allEmp_jobs()
    {
        $jobs_id = request("jobs_id");
        $v= jobs::where('id','=',$jobs_id)->first();
        $value=$v->name_job;
        $employee = employees::where('jobs_id','=',$jobs_id)->get();
        $title = "قائمة بأسماء الموظفين التابعين لـ" ; 
    
        return view('report.allEmpView')->with([
            'employee' => $employee,
            'title' => $title,
            'value' => $value,
        ]);
    }

    public function allEmp_salary()
    {
        $value = request("salary");
        $employee = employees::where('salary','=',$value)->get();
        $title = " قائمة بأسماء الموظفين الدين رواتبهم ";
        return view('report.allEmpView')->with([
            'employee' => $employee,
            'title' => $title,
            'value' => $value,
        ]);
    }

    public function bills_id()
    {
        $bills_id = request("bills_id");
        $bills = bills::where('id','=',$bills_id)->first();
        if($bills == null)
          return view('404');
        $id=$bills->reservation_id;  
            
        $i = auth()->user()->halls_id ;
        $halls = halls::where('id','=',$i)->first();

        $reservation = reservation::with('customer','occasions')->where('id','=',$id)->first();
        $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
        return view('report.billsView')->with([
            'reservation' => $reservation,
            'servicesReservation' => $servicesReservation,  
            'bills' => $bills,  
            'halls' => $halls,  
        ]);
    }
}
