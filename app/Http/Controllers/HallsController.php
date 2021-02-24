<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\halls;
use App\user;
use App\Address;
use File;
use Storage;
use App\reservation;

class HallsController extends Controller
{ 

    public function __construct() {
    //    $this->middleware('check_admin');
    }

    public function index()
    {
        $halls = halls::with('Address')->orderby('created_at','ASC')->get();
        return view('halls.index')->with([
            'halls' => $halls,
           ]);
    }

    public function create()
    {
        $Address = Address::all();
        return view('halls.create')->with([
            'Address' => $Address,
        ]);

    }

    public function store(Request $request)
    {

       // return 't';
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
         $halls = halls::find($id);  
         return view('halls.show')->with([
                 'halls'      => $halls ,
             ]);
        
    }

    public function show($id)
    {
        //$halls = halls::with('Address')->where('id','=',$id)->first();  
        $halls = halls::with('Address')->where('id','=',$id)->first();
       // dd($halls);
        return view('halls.show')->with([
                'halls'      => $halls ,
        ]);
    }

    public function edit($id)
    {
        $Address = Address::all();
        $halls = halls::with('Address')->find($id);  
        return view('halls.edit')->with([
            'halls' => $halls,
            'Address' => $Address,

        ]);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'    => 'required|string',
            'email'   => 'required|string',
            'phone'   => 'required|string',
            'file'    => 'image|mimes:png,jpg,jpeg,svg',
            'lat'   => 'required',
            'lng'   => 'required'
        ]);

        $halls = halls::findorfail($id);
        $halls->name =request("name");
        if (request()->hasFile('file')) {
            Storage::disk('uploads')->delete($halls->file);
            // File::delete($halls->file);
            $img = request()->file('file');

            $img_name = time() . '.' . $img->extension();
            $img->move('uploads' , $img_name);
            $halls->file = 'uploads/' .$img_name;

        };
        $halls->phone=request('phone');
        $halls->email=request('email');
        $halls->email=request('email');
        $halls->Address_id=request('Address_id');
        $halls->capacity=request('capacity');
        $halls->state=1;
        $halls->lat=request('lat');
        $halls->lng=request('lng');
        $halls->save();
         
         $halls = halls::find($id);  
         return view('halls.show')->with([
                 'halls'      => $halls ,
             ]);


    }

    public function destroy($id)
    {
        $reservation = reservation::where('halls_id','=',$id)->where('flag','=',1)->first();
        if($reservation == null)
        {
            return redirect()->back()->with('success','لايمكن حدف بيانات صالة يوجد حجوزات مؤكدة');
        }
        else
        {
            $reservation = reservation::where('halls_id','=',$id)->get();
            foreach($reservation as $item)
            {
                $item->delete();
            }
            $pic = pic::where('halls_id','=',$id)->get();
            foreach($pic as $item)
            {
                $item->delete();
            }
            $news = news::where('halls_id','=',$id)->get();
            foreach($news as $item)
            {
                $item->delete();
            }

            $services = services::where('halls_id','=',$id)->get();
            foreach($services as $item)
            {
                $item->delete();
            }
            $halls = halls::findorfail($id);
            $halls->delete();
        }
    }

    public function open($id)
    {
        $halls = halls::findorfail($id);
        $halls->state=1;
        $halls->save();
        return redirect()->back();
    }
    public function close($id)
    {
        $halls = halls::findorfail($id);
        $halls->state=0;
        $halls->save();
        return redirect()->back();
    }

}
