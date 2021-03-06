<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\occasions;
use App\halls;
use App\services;


class customerController extends Controller
{
    // public function __construct() {
    //     $this->middleware('check_admin');
    // }
    
    public function index()
    {
        $customer = customer::orderby('created_at','DESC')->get();
      //  dd($customer);
      
        return view('customer.index')->with([
            'customer' => $customer,
           ]); 
    }

    public function create()
    {        
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $number=rand();
        
        $customer = new customer;
        $customer->number = $number;
        $customer->name=request("name");
        $customer->email=request("email");
        $customer->phone=request("phone");
        $customer->address=request("address");
        $customer->save();
       
        $customer = customer::all();
        $occasions = occasions::all();
        $id=auth()->user()->halls_id;
        $services = services::with('halls')->where('halls_id','=',$id)->get();

        return view('reservation.create')->with([
            'customer' => $customer,
            'occasions' => $occasions,
            'services' => $services,
        ]);
    }

    public function show($id)
    {
        $customer = customer::find($id)->first();
        //dd($customer);
        return view('customer.show')->with([
            'customer' => $customer,
        ]);
    }

    public function edit($id)
    {
        $customer = customer::find($id)->first();

        return view('customer.edit')->with([
            'customer' => $customer,
        ]);

    }

    
    public function update(Request $request, $id)
    {
        $customer = customer::find($id)->first();
        $customer->name=request("name");
        $customer->email=request("email");
        $customer->phone=request("phone");
        $customer->address=request("address");
        $customer->save();
        return view('customer.show')->with([
            'customer' => $customer,
        ]);

    }

    public function destroy($id)
    {
        $customer = customer::find($id)->first();
        $customer->delete();
        return redirect()->back();
    }
}
