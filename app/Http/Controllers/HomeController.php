<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\halls;
use App\city;
use App\reservation;
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
     //   $this->middleware('check_owner')->only('index');

    }

    public function index()
    {
        $reservation=reservation::all();
        return view('home')->with([
            'reservation' => $reservation,
           ]);
    }
    public function homeAdmin()
    {
        $halls = halls::orderby('created_at','ASC')->get();
        $city = city::all();
        return view('halls.halls')->with([
            'halls' => $halls,
            'city' => $city,
           ]);
    }
    public function search(Request $request)
    {
        $city = request("city_id");
        $halls = halls::where('city_id','=',$city)->orderby('created_at','ASC')->get();
        $city = city::all();
        return view('halls.halls')->with([
            'halls' => $halls,
            'city' => $city,
           ]);
    }
}
