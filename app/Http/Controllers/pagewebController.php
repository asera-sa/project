<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;
use App\halls;
use App\Address;
use App\reservation;
use App\services;
use App\pic;
use App\customer;
use App\occasions;
use App\User;
use App\news;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminContactNotify;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

Use Alert;

class pagewebController extends Controller
{

    public function index()
    {
        $halls1=halls::orderby('id','DESC')->first();
        if($halls1 != null)
        {
            $halls2=halls::where('id','!=',$halls1->id)->orderby('id','DESC')->first();
            if($halls2 != null)
            {
                $halls3=halls::where('id','!=',$halls1->id)->where('id','!=',$halls2->id)->orderby('id','DESC')->first();
            }
            else
            {
                $halls3=null;
            }
        }
        else
        {
            $halls2=null;
            $halls3=null;
        }

        return view('web.index')->with([
            'halls1' => $halls1,
            'halls2' => $halls2,
            'halls3' => $halls3,
        ]);
    }

    public function about()
    {
        $halls = halls::all();
        return view('web.about')->with([
            'halls' => $halls,
        ]);
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function send()
    {
        $messages = new messages;
        $messages->halls_id=request("halls_id");
        $messages->email=request("email");
        $messages->name=request("name");
        $messages->title=request("title");
        $messages->content=request("content");
        $messages->save();

        if (request("halls_id") == 0) {
            $users = User::where('prive', 0)->get();
            $tokens = User::where('prive', 0)->pluck('fcm_token')->toArray();
        }
         else {
            $users = User::where('halls_id','=',request('halls_id'))->where('prive', 1)->get();
            $tokens = User::where('prive', 1)->pluck('fcm_token')->toArray();
        }
        
        Notification::send($users, new AdminContactNotify("لديك رسالة جديدة",request("title"),request("content") ));
        try {
            $this->boradcastNotify('مراسلة من موقع', "لديك رسالة جديدة", $tokens);
        } catch (\Exception $ex) {
        }
        return redirect()->back()->with('success','تم الإرسال بنجاح ');
    }

    // Send notifications to user
    private function boradcastNotify($title, $body, $tokens)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
                    ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['title' => $title,'body' => $body]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        return $downstreamResponse->numberSuccess();
    }

/*----------------------------قاعات--------------------------*/
    public function halls()
    {
        $Address = Address::all();
        $halls = halls::with('Address')->paginate(9);
        return view('web.halls')->with([
            'halls' => $halls,
            'Address' => $Address,
        ]);
    }

    public function search(Request $request)
    {
        $Address = Address::all();
        $search = request("search");
        $halls = halls::with('Address')->paginate(9);

            $Address = Address::where('name','=',$search)->first();
            if($Address!=null)
            {
                $result = halls::with('Address')->where('Address_id','=',$Address->id)->get();
                if($result==null)       
                   $result = halls::with('Address')->where('name','=',$search)->get();
            }
            else
                $result = halls::with('Address')->where('name','=',$search)->get();

        return view('web.resultsearch')->with([
            'result' => $result,
            // 'halls' => $halls,       
        ]);
    }

    public function sort(Request $request)
    {
      
        $num =request("filter");
     //   dd($num);
        if($num == 0)
        {
            $result = occasions::with('halls')->orderby('st_fr_price','DESC')->get();//تصاعدي;
            return view('web.resultsort')->with([
                 'result' => $result,
             ]);
        }
        else if($num ==1)
        {
           $result = occasions::with('halls')->orderby('st_fr_price','ASC')->get();//تصاعدي;
           return view('web.resultsort')->with([
                'result' => $result,
            ]);
        }
        else
        {
            $result=halls::orderby('name','ASC')->get();
            return view('web.resultsearch')->with([
                'result' => $result,
            ]);
        }
        
       
    }
    public function showhalls($id)//صفحة لقاعة
    {
        $halls =halls::find($id);
        $pic=pic::where('halls_id','=',$halls->id)->get();
        $occasions = occasions::with('halls')->where('halls_id','=',$id)->get();
        $services = services::with('halls')->where('halls_id','=',$id)->get();

        $news = news::where('halls_id','=',$id)->get();
        $reservation=reservation::where('halls_id','=',$id)->get();

        return view('web.show')->with([
            'pic' => $pic,
            'halls' => $halls,
            'occasions' => $occasions,
            'services' => $services,
            'news' => $news,
            'reservation' => $reservation,

        ]);
    }

    public function createRes($id)//حجز
    {
        $customer = customer::all();
        $occasions = occasions::all();
       // $serviceshalls = halls::with('services')->where('id','=',$id)->first();
     //   $services = services::with('halls')->where('halls_id','=',$id)->first();
        $services = services::with('halls')->where('halls_id','=',$id)->get();

     //   dd($services);
        return view('web.createRes')->with([
            'customer' => session()->get('customers.res'),
            'occasions' => $occasions,
            'services' => $services,
            'id' => $id,
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
        session()->put('customers.res', $customer->number);
        return redirect()->back();
    }

    public function insertRes($id)
    {
        //dd($id);
        $reserdate = request("date");
        $resertime=request("time");
        $reser = reservation::where('date','=',$reserdate)->where('halls_id','=',$id)->where('time','=',$resertime)->first();
        request()->validate([
            'date'                  =>'required',        
            'occasions_id'          =>'required',        
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
                session()->forget('customers.res');
                Alert::success('تم الحجز بنجاح', 'رقم الحجز هو : ' . $reservation->num);
                return redirect()->back();

            }
    
            
        }
    }

    public function createhalls()
    {
        $Address = Address::all();
        return view('web.createhalls')->with([
            'Address' => $Address,
        ]);
    }
  
    public function inserthalls()
    {
        // dd(request("lat"));
        request()->validate([
            'name'    => 'required|string',
            'email'   => 'required|string',
            'phone'   => 'required|string',
             'file'     => 'required|image|mimes:png,jpg,jpeg,svg',
             'lat'   => 'required',
             'lng'   => 'required'

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
        $halls->Address_id=request('Address_id');
        $halls->capacity=request('capacity');
        $halls->state=1;
        $halls->lat=request('lat');
        $halls->lng=request('lng');

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
            return redirect()->back()->with('error','رقم الحجز غير صحيح');
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
