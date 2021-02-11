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
        $services = services::paginate(4);
        $jobs = jobs::paginate(4);
        $Address = Address::paginate(4);
        return view('setting.index')->with([
            'services' => $services,
            'jobs' => $jobs,
            'Address' => $Address,
        ]);
    }

    public function addServices(Request $request)
    {
        $services = new services;
        $services->name=request("name");
        $services->save();
        return redirect()->back();
    }

    public function delservices($id)
    {
        $services = services::find($id)->first();
        $services->delete();
        return redirect()->back();
    }

    public function addJobs(Request $request)
    {
        $jobs = new jobs;
        $jobs->name_job=request("name_job");
        $jobs->save();
        return redirect()->back();
    }

    public function deljobs($id)
    {
        $jobs = jobs::find($id)->first();
        $jobs->delete();
        return redirect()->back();
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
