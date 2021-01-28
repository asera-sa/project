<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services;
use App\halls;
use App\occasions;
use App\reservation;

class HallsDataController extends Controller
{
    public function __construct() {
       // $this->middleware('check_owner');
    }

    public function indexS()
    {
        $id=auth()->user()->halls_id;
        $serviceshalls = halls::with('services')->where('id','=',$id)->first();
        $services = services::all();
        return view('hallsData.hallsServices')->with([
            'services' => $services,
            'serviceshalls' => $serviceshalls,
        ]);
    }
    public function storeS(Request $request)
    {
        $id=auth()->user()->halls_id;
        $halls= halls::where('id','=',$id)->first();
        $price=request("price");
        $services= request("services_id");  
        $halls->services()->attach($services,['price' => $price]);
        
       
        return redirect()->back();
    }

    public function destroyS($id)
    {
        // $i=auth()->user()->halls_id;
        // $serviceshalls = halls::with('services')->where('id','=',$i)->first();
        // $servicesReservation = reservation::with('services')->where('halls_id','=',$i)->first();

        // dd($servicesReservation->services);
        // if($serviceshalls->services == null)
        // {
            
        //     $occasions->delete();
        //     return redirect()->back()->with('success',' تم حدف الخدمة بنجاح ');
        // }
        // else
        // {
        //     return redirect()->back()->with('error',' لايمكن حدف الخدمة  ');
        // }
    }

/*-----------------المناسبات----------------------*/

    public function indexO()
    {
        $id=auth()->user()->halls_id;
        $occasions = occasions::with('halls')->where('halls_id','=',$id)->get();
        return view('hallsData.hallOccasions')->with([
            'occasions' => $occasions,
        ]);
    }
    public function storeO(Request $request)
    {
       
        $id=auth()->user()->halls_id;
        $occasions = new occasions;
        
        $occasions->name= request("name");
        $occasions->st_fr_price= request("st_fr_price");
        $occasions->thu_price= request("thu_price");
        $occasions->halls_id= $id;
        $occasions->save();
        return redirect()->back();
    }

    public function destroyO($id)
    {
      //  dd($id);
        $occasions = occasions::find($id); 
        $reservation = reservation::where('occasions_id','=',$id)->first();
       // dd($reservation);
        if($reservation == null)
        {
            $occasions->delete();
            return redirect()->back()->with('success',' تم حدف مناسبة بنجاح ');
        }
        else
        {
            return redirect()->back()->with('error',' لايمكن حدف المناسبة  ');
        }
    }

    /*-----------------الصور----------------------*/
  
}
