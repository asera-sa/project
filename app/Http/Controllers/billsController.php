<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bills;
use App\reservation;
use App\customer;
use App\services;
use App\occasions;
use App\halls;

class billsController extends Controller
{

    public function __construct() {
   //     $this->middleware('check_owner');
    }
    

    public function create($id)
    {  

        $i=auth()->user()->halls_id;
        $reservation = reservation::with('customer','occasions')->where('id','=',$id)->first();
        $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
        $bills = bills::where('reservation_id','=',$id)->get();

      //  $i = auth()->user()->halls_id ;
        $halls = halls::where('id','=',$i)->first();
        //dd($bills);
        return view('bills.create')->with([
            'reservation' => $reservation,
            'servicesReservation' => $servicesReservation,  
            'bills' => $bills,  
            'halls' => $halls,  
        ]);

    }


    public function store(Request $request )//دفع
    {

        $total=request("total");
        $old_credit=request("old_credit");
        $old_debit=request("old_debit");
        $credit=request("credit");
        $reservation_id = request("reservation_id");

        $s=$old_credit+$credit;
        if($s > $total)
        {
            return redirect()->back();
        }
        else
        {
            $debit = $old_debit-$s;
            $bills = new bills;
            $bills->reservation_id = $reservation_id;
            $bills->credit=$credit;
            $bills->debit=$debit;
            $bills->type=request("type");
            $bills->note=request("note");
            $bills->date=request("date");
            $bills->save();
            $reservation = reservation::find($reservation_id);
            $reservation->flag=1;
            $reservation->save();
             


            $bills_id = bills::max('id');;
            $bills = bills::where('id','=',$bills_id)->first();
            $id=$bills->reservation_id;      
            $reservation = reservation::with('customer','occasions')->where('id','=',$id)->first();
            $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
            $i = auth()->user()->halls_id ;
            $halls = halls::where('id','=',$i)->first();
            return view('report.billsView')->with([
                'reservation' => $reservation,
                'servicesReservation' => $servicesReservation,  
                'bills' => $bills,  
                'halls' => $halls,  
            ]);       
         }
    }
    

    public function index()
    {
       $id=request("reservation_id");
       $reservation = reservation::with('services','customer')->where('id','=',$id)->first(); 
       $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
       $bills = bills::where('reservation_id','=',$id)->get();
      
       return view('bills.index')->with([
        'reservation' => $reservation,
        'servicesReservation' => $servicesReservation,  
        'bills' => $bills,
      ]);
    }


    public function delete($id)
    {
        $bills = bills::find($id);
        $bills->delete();
        return redirect()->back();
    }
}
