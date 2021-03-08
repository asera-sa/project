<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\occasions;
use App\halls;
use App\reservation;
use App\bills;
use App\services;

class reservationController extends Controller
{
    public function __construct() {
        // $this->middleware(['check_owner','check_employee']);
    }
    
    public function index()
    {
        // now()->addDays(3) يزد 3 ايام ع اليوم
        // now()->subDays(3) ينقص 3 ايام ع اليوم

        $id = auth()->user()->halls_id ;
        $reservation = reservation::with('customer')->where('halls_id','=',$id)->where('flag','!=',2)->orderby('created_at','DESC')->get();
        return view('reservation.index')->with([
            'reservation' => $reservation,
        ]);
    }

    public function create()
    {
        $i=auth()->user()->halls_id;
        $customer = customer::all();
        $occasions = occasions::where('halls_id','=',$i)->get();

        $id=auth()->user()->halls_id;
        $services = services::with('halls')->where('halls_id','=',$id)->get();
       // dd($services);
        return view('reservation.create')->with([
            'customer' => $customer,
            'occasions' => $occasions,
            'services' => $services,
        ]);
    }
  
    public function store(Request $request)
    {
        $reserdate = request("date");
        $resertime=request("time");
        $i=auth()->user()->halls_id;
        $reser = reservation::where('date','=',$reserdate)->where('time','=',$resertime)->where('halls_id','=',$i)->first();
        $this->validate($request,[
            'customers_id'                  =>'required',
            'date'                  =>'required',        
            'occasions_id'                  =>'required',        
            'time'                  =>'required',        
        ]);
        if($reser != null)
        {
            return redirect()->back()->with('error',' هذا اليوم محجوز ');
        }
        else
        {          
            $id=auth()->user()->halls_id; 
            $num=rand();
            $reservation = new reservation;
            $reservation->customer_id=request("customers_id");
            $reservation->date=request("date");
            $reservation->halls_id=$id;
            $reservation->num=$num;
            $reservation->occasions_id=request("occasions_id");
            $reservation->time=request("time");
            $reservation->flag=0;
           // $reservation->flag=0;
            $reservation->save();
            // $id=reservation::max('id');
            $id = reservation::orderBy('id','desc')->first();
            $services_id = request("services_id"); // Get all services_id كل الخدمات
            $quantities = request("quantity"); // كل الكميات   
            $price= request("price");

            if (!empty($services_id))
            {
              //  dd($services_id);
              //    dd($services_id);
                foreach ($services_id as $index=>$value) 
                {
                    // $index=>  هذا طبعا نفس متغير الي في فور اللي يبدا بصفر
                    $quantity = $quantities[$index]; // جلب الكميه بحسب الخدمه 
                    $price_c=$price[$index]*$quantity; 
                    $id->services()->attach($value, ['quantity' => $quantity,'price' => $price_c]);
                }
            }

            $id=reservation::max('id');
            $reservation = reservation::with('customer')->where('id','=',$id)->first();
            $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
           //dd($servicesReservation);
            return view('reservation.show')->with([
                'reservation' => $reservation,
                'servicesReservation' => $servicesReservation,
            ]);
        }
      
    }

    public function show($id)
    {
        $i=auth()->user()->halls_id;
        $reservation = reservation::with('customer')->where('id','=',$id)->first();
        $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
       //dd($servicesReservation);
        return view('reservation.show')->with([
            'reservation' => $reservation,
            'servicesReservation' => $servicesReservation,
        ]);

    }
  
    public function edit($id)
    {
        $customer = customer::all();
        $occasions = occasions::all();
        $reservation = reservation::find($id);

        $i=auth()->user()->halls_id;
        $serviceshalls = services::with('halls')->where('halls_id','=',$i)->get();
        $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
        return view('reservation.edit')->with([
            'reservation' => $reservation,
            'customer' => $customer,
            'occasions' => $occasions,
            'serviceshalls' => $serviceshalls,
            'servicesReservation' => $servicesReservation,

        ]);
 
    }

    public function update(Request $request, $id)
    {

        request()->validate([
            'customers_id'                  =>'required',
            'date'                  =>'required',        
            'occasions_id'                  =>'required',        
            'time'                  =>'required',        
        ]);
        $reservation = reservation::findorfail($id); //
        
        $reserdate = request("date");
        $resertime=request("time");
        $i=auth()->user()->halls_id;
        $reser = reservation::where('date','=',$reserdate)->where('time','=',$resertime)->where('halls_id','=',$i)->first();
     
        if ($reservation->date == $reserdate && $reservation->time == $resertime)
        { //
            // $reservation = reservation::findorfail($id); //
            $reservation->customer_id=request("customers_id");
            $reservation->date=request("date");
            $reservation->occasions_id=request("occasions_id");
            $reservation->time=request("time");
            $reservation->save();

            $services_id = request("services_id"); // Get all services كل الخدمات
            $quantities = request("quantity"); // كل الكميات
            $price= request("price");
         //   dd($priceservices);
            if (!empty($services_id)) {
                \DB::table('reservation_services')->where('reservation_id', $reservation->id)->delete();
                foreach ($services_id as $index=>$value) 
                {//dd(9);
                   $quantity = $quantities[$index];
                    $price_c=$price[$index]*$quantity;
                    $reservation->services()->attach($value, ['quantity' => $quantity,'price' => $price_c]);
                }
            } else {
                \DB::table('reservation_services')->where('reservation_id', $reservation->id)->delete();
            }
                //return..
                $i=auth()->user()->halls_id;
                $reservation = reservation::with('customer')->where('id','=',$id)->first();
                $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
                return view('reservation.show')->with([
                    'reservation' => $reservation,
                    'servicesReservation' => $servicesReservation,
                ]);     
         } 
        else {
           
            if($reser != null)
            { 
                return redirect()->back()->with('error',' هذا اليوم محجوز ');
            }
            else
            {           
               // $reservation = reservation::findorfail($id); //
            $reservation->customer_id=request("customers_id");
            $reservation->date=request("date");
            $reservation->occasions_id=request("occasions_id");
            $reservation->time=request("time");
            $reservation->save();

            $services_id = request("services_id"); // Get all services كل الخدمات
            $quantities = request("quantity"); // كل الكميات
            $price= request("price");
         //   dd($priceservices);
            if (!empty($services_id)) {
                \DB::table('reservation_services')->where('reservation_id', $reservation->id)->delete();
                foreach ($services_id as $index=>$value) 
                {
                    $quantity = $quantities[$index];
                    $price_c=$price[$index]*$quantity;
                    $reservation->services()->attach($value, ['quantity' => $quantity,'price' => $price_c]);
                }
            } else {
                \DB::table('reservation_services')->where('reservation_id', $reservation->id)->delete();
            }
                  //return..
                  $i=auth()->user()->halls_id;
                  $reservation = reservation::with('customer')->where('id','=',$id)->first();
                  $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
                  return view('reservation.show')->with([
                      'reservation' => $reservation,
                      'servicesReservation' => $servicesReservation,
                  ]);          
             }
        }
        

        //return..
         $i=auth()->user()->halls_id;
        $reservation = reservation::with('customer')->where('id','=',$id)->first();
        $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
       //dd($servicesReservation);
        return view('reservation.show')->with([
            'reservation' => $reservation,
            'servicesReservation' => $servicesReservation,
        ]);

    }

    public function destroy($id)
    {
        $reservation=reservation::find($id);
        $bills = bills::where('reservation_id','=',$id)->get();
        foreach($bills as $item)
            $item->delete();
        $servicesReservation = reservation::with('services')->where('id','=',$id)->first();
        \DB::table('reservation_services')->where('reservation_id', $reservation->id)->delete();
        $reservation->delete();



         $id = auth()->user()->halls_id ;
        $reservation = reservation::with('customer')->where('halls_id','=',$id)->where('flag','!=',2)->get();
      //  dd($reservation);
        return view('reservation.index')->with([
            'reservation' => $reservation,
        ]);
    }

}
