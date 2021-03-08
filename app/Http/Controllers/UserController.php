<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\halls;
use Hash;

class UserController extends Controller
{
   
    public function index()
    {
        $id = auth()->user()->halls_id ;
        $user = User::with('halls')->orderby('prive','ASC')->where('halls_id','=',$id)->orderby('created_at','DESC')->get();
        return view('users.index')->with([
            'user' => $user,
           ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'                  =>'required',
            'email'                 => 'required|unique:users',
            'password'              =>'required',
            'password_confirmation' =>'required|same:password',   
            'address'                  =>'required',
            'phone'                  =>'required',
        ]);
        
        $id = auth()->user()->halls_id ;
        $user =new User;
        $user->name =request("name");
        $user->halls_id=$id;
        $user->email=request("email");
        $user->password=bcrypt(request('password'));
        $user->address=request('address');
        $user->phone=request('phone');
        $user->prive=request('prive');
        $user->save();
        
        $id=User::max('id');
        $user = User::find($id);  
        return view('users.show')->with([
                'user'      => $user ,
            ]);
    }

    public function show($id)
    {
        $user = User::find($id);  
        return view('users.show')->with([
                'user'      => $user ,
            ]);
    }

    public function edit($id)
    {
        $user = User::find($id);  
        return view('users.edit')->with([
            'user' => $user,

        ]);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'current_password' =>'required',
            'new_password' =>'required',
            'password_confirmation' =>'required',

        ]);

        $user= \Auth::user(); //user login 
         if((Hash::check($request->current_password,$user->password)) && ($request->new_password != $request->password_confirmation))
        {
           
            return redirect()->back()->with('error','كلمتا السر غير متطابقتان');
        }
        else if(Hash::check($request->current_password,$user->password))
        {

            $user->password=bcrypt(request('new_password'));
            $user->save();
            return redirect()->back()->with('success','تم تغيير كلمة السر');
        }
       
        else
        {
            return redirect()->back()->with('error','   كلمة السر  القديمة غير صحيحة');
        }  
    }

    public function destroy($id)
    {
        $users = User::findorfail($id); //
        if($users->id != auth()->user()->id && $users->id != null ) {
            $users->delete();
            $i = auth()->user()->halls_id ;
            $user = User::with('halls')->orderby('prive','ASC')->where('halls_id','=',$i)->get();
            return view('users.index')->with([
                'user' => $user,
               ]);       
        }else {
            return redirect()->back()->with('error', 'لا يمكن حذف الحساب');
        }
    }
  
}
