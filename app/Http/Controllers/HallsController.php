<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\halls;
use App\user;
use App\city;
use File;
use Storage;

class HallsController extends Controller
{ 

    public function __construct() {
    //    $this->middleware('check_admin');
    }

    public function index()
    {
        $halls = halls::with('city')->orderby('created_at','ASC')->get();
        return view('halls.index')->with([
            'halls' => $halls,
           ]);
    }

    public function create()
    {
        $city = city::all();
        return view('halls.create')->with([
            'city' => $city,
        ]);

    }

    public function store(Request $request)
    {

       // return 't';
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
         $halls = halls::find($id);  
         return view('halls.show')->with([
                 'halls'      => $halls ,
             ]);
        
    }

    public function show($id)
    {
        $halls = halls::find($id);  
        return view('halls.show')->with([
                'halls'      => $halls ,
            ]);
    }

    public function edit($id)
    {
        $city = city::all();
        $halls = halls::with('city')->find($id);  
        return view('halls.edit')->with([
            'halls' => $halls,
            'city' => $city,

        ]);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'    => 'required|string',
            'email'   => 'required|string',
            'address' => 'required|string',
            'phone'   => 'required|string',
            'file'    => 'image|mimes:png,jpg,jpeg,svg'
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
        $halls->city_id=request('city_id');
        $halls->address=request('address');
        $halls->capacity=request('capacity');
        $halls->state=1;

        $halls->save();
         
         $halls = halls::find($id);  
         return view('halls.show')->with([
                 'halls'      => $halls ,
             ]);


    }

    public function destroy($id)
    {
        //
    }

}
