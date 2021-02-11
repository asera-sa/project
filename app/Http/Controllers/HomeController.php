<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\halls;
use App\Address;
use App\reservation;
use App\employees;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
     //   $this->middleware('check_owner')->only('index');
    }

    public function index()
    {
        $id=auth()->user()->halls_id;
        $reservation=reservation::where('halls_id','=',$id)->get();
        //    $date = date();
        //  dd($date);
        $f_0 =reservation::where('halls_id','=',$id)->where('flag','=',0)->get();
        $f_1 =reservation::where('halls_id','=',$id)->where('flag','=',1)->get();
        $emp =employees::where('halls_id','=',$id)->get();
        return view('home')->with([
            'reservation' => $reservation,
            'f_0' => $f_0,
            'f_1' => $f_1,
            'emp' => $emp,
        ]);
    }
    
    public function homeAdmin()
    {
        $halls = halls::with('Address')->get();
     //   dd($halls);
        $Address = Address::all();
        return view('halls.halls')->with([
            'halls' => $halls,
            'Address' => $Address,
           ]);
    }

    public function search(Request $request)
    {
        $Address = request("Address_id");
        $halls = halls::where('Address_id','=',$Address)->orderby('created_at','ASC')->get();
        $Address = Address::all();
        return view('halls.halls')->with([
            'halls' => $halls,
            'Address' => $Address,
           ]);
    }
    
}
