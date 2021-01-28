<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;
use App\halls;
use App\city;
use App\reservation;
use App\pic;
use App\customer;
use App\occasions;
use App\User;
use App\news;

class pagewebController extends Controller
{
    public function contact()
    {
        return view('web.contact');
    }
    public function send()
    {
        // return 't';
        $messages = new messages;
        $messages->halls_id=request("halls_id");
        $messages->email=request("email");
        $messages->name=request("name");
        $messages->title=request("title");
        $messages->content=request("content");
        $messages->save();
        return redirect()->back()->with('success','تم الإرسال بنجاح ');
    }
/*----------------------------قاعات--------------------------*/
    public function halls()
    {
        $city = city::all();
        $halls = halls::with('city')->paginate(9);
        return view('web.halls')->with([
            'halls' => $halls,
            'city' => $city,
        ]);
    }

    public function search(Request $request)
    {
        $city = city::all();
        $search = request("search");
        $halls = halls::with('city')->paginate(9);

            $city = city::where('name','=',$search)->first();
            if($city!=null)
            {
                $result = halls::with('city')->where('city_id','=',$city->id)->get();
                if($result==null)       
                   $result = halls::with('city')->where('name','=',$search)->get();
            }
            else
                $result = halls::with('city')->where('name','=',$search)->get();

        return view('web.resultsearch')->with([
            'result' => $result,
            'halls' => $halls,
            
        ]);
    }

    public function showhalls($id)//صفحة لقاعة
    {
        $halls =halls::find($id);
        $pic=pic::where('halls_id','=',$halls->id)->get();
        $occasions = occasions::with('halls')->where('halls_id','=',$id)->get();
        $serviceshalls = halls::with('services')->where('id','=',$id)->first();
        $news = news::where('halls_id','=',$id)->get();
        $reservation=reservation::where('halls_id','=',$id)->get();

        return view('web.show')->with([
            'pic' => $pic,
            'halls' => $halls,
            'occasions' => $occasions,
            'serviceshalls' => $serviceshalls,
            'news' => $news,
            'reservation' => $reservation,

        ]);
    }

    public function createRes($id)//حجز
    {
        $customer = customer::all();
        $occasions = occasions::all();
        $serviceshalls = halls::with('services')->where('id','=',$id)->first();
        return view('web.createRes')->with([
            'customer' => $customer,
            'occasions' => $occasions,
            'serviceshalls' => $serviceshalls,
        ]);
    }


    public function insertcustomer()
    {
        $number=rand();    
        $customer = new customer;
        $customer->number = $number;
        $customer->name=request("name");
        $customer->email=request("email");
        $customer->phone=request("phone");
        $customer->address=request("address");
        $customer->save();

        $id=customer::max('id');
        $customer = customer::find($id);
        return redirect()->back()->with('success',':  رقم الزبون هو'.$customer->number);
    }

    public function insertRes($id)
    {
        //dd($id);
        $reserdate = request("date");
        $resertime=request("time");
        $reser = reservation::where('date','=',$reserdate)->where('halls_id','=',$id)->where('time','=',$resertime)->first();
        request()->validate([
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
            $number=request("number");
            $customer=customer::where('number','=',$number)->first();
            if($customer == null)
            {
                return redirect()->back()->with('error',' رقم زبون غير صحيح ');

            }   
            else
            {
                $num=rand();
                $reservation = new reservation;
                $reservation->customer_id=$customer->id;
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
                $reservation = reservation::find($id);
                return redirect()->back()->with('success',':  رقم الحجز هو'.$reservation->num);

            }
    
            
        }
    }

    public function createhalls()
    {
        $city = city::all();
        return view('web.createhalls')->with([
            'city' => $city,
        ]);
    }
  
    public function inserthalls()
    {
        
        request()->validate([
            'name'    => 'required|string',
            'email'   => 'required|string',
            'address' => 'required|string',
            'phone'   => 'required|string',
           'file'     => 'required|image|mimes:png,jpg,jpeg,svg'
        ]);
 
        $halls =new halls;
        $halls->name =request("name");
        if (request()->hasFile('file')) {
            // File::delete($halls->file);
            $img = request()->file('file');

            $img_name = time() . '.' . $img->extension();
            $img->move('uploads' , $img_name);
            $halls->file = 'uploads/' .$img_name;
        };
        $halls->phone=request('phone');
        $halls->email=request('email');
        $halls->city_id=request('city_id');
        $halls->address=request('address');
        $halls->capacity=request('capacity');
        $halls->state=1;

         $halls->save();
         $id=halls::max('id');
         $user =new User;
         $user->name =request("uname");
         $user->halls_id=$id;
         $user->email=request("uemail");
         $user->password=bcrypt(request('upassword'));
         $user->address=request('uaddress');
         $user->phone=request('uphone');
         $user->prive=1;
         $user->save();
         return redirect()->back()->with('success','تم تسجيل بنجاح');

        

    }
    /*---------------------------حجوزات ملغية--------------------------------*/
    public function cancelres()
    {
        $reser = reservation::with('customer','halls')->where('flag','=',2)->get();
        return view('web.cancel')->with([
            'reser' => $reser,
        ]);
    }

    public function delres(Request $request)
    {
        $num = request("number");
        $delres = reservation::where('num','=',$num)->first();
        if($delres == null)
        {
            return redirect()->back()->with('success','رقم الحجز غير صحيح');
        }
        else
        {  
            $delres->flag=2;
            $delres->save();
            return redirect()->back();
        }


        $reser = reservation::with('customer','halls')->where('flag','=',2)->get();
        return view('web.cancel')->with([
            'reser' => $reser,
        ]);
    }

}
