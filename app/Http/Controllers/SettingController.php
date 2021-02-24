<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\services;
use App\jobs;
use App\Address;

class SettingController extends Controller
{
    public function __construct() {
        $this->middleware('check_admin');
    }

    public function index()
    {
        $Address = Address::paginate(4);
        return view('setting.index')->with([
            'Address' => $Address,
        ]);
    }

    public function addAddress(Request $request)
    {
        $Address = new Address;
        $Address->name=request("name");
        $Address->save();
        return redirect()->back();
    }

    public function delAddress($id)
    {
        $Address = Address::find($id)->first();
        $Address->delete();
        return redirect()->back();
    }
    /************************************************** */

   

}
