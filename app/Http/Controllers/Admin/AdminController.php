<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Institution;
use App\User;
use Hash;
use Gate;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    protected function validator(array $data)
    {
        $this->validate($request, [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
           
        ]);
            
      
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function masterBlade()
    {
        $currentAdmin = Auth::user();
        /*
            getting current admin details
        */
        $Admin = Admin::where('id', $currentAdmin->id)->first();
        /*
            getting current admin institution id
        */
        $adminInstitutionId = $Admin->institution_id;
        /*
            getting current admin institution details
        */
        $currentInstitution = Institution::where('id', $adminInstitutionId)->first();
        return view('Admin.layouts.master',compact( 'currentInstitution'));
    }
    public function index()
    {
        $currentAdmin = Auth::user();
        /*
            getting current admin details
        */
        $Admin = Admin::where('id', $currentAdmin->id)->first();
        /*
            getting current admin institution id
        */
        $adminInstitutionId = $Admin->institution_id;
        /*
            getting current admin institution details
        */
        $currentInstitution = Institution::where('id', $adminInstitutionId)->first();
        return view('Admin.Dashboard',compact( 'currentInstitution'));
    }
     public function Admin()
    {
        /*
            getting current admin
        */
        $currentAdmin = Auth::user();
        /*
            getting current admin details
        */
        $Admin = Admin::where('id', $currentAdmin->id)->first();
        /*
            getting current admin institution id
        */
        $adminInstitutionId = $Admin->institution_id;
        /*
            getting current admin institution details
        */
        $currentInstitution = Institution::where('id', $adminInstitutionId)->first();
        /*
            getting admins under current institution
        */
        $currentInstitutionAdmins = $currentInstitution->admins;
       // $institutionUsersDetails = $currentInstitution->users()->first();
       // $institution = Institution::all();
    
        return view('Admin.Admin', compact('currentInstitutionAdmins', 'currentInstitution'));
      //  return dd($currentInstitutionAdmins);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function create(Request $request)
    {
        // create new admin using the institution id of the current admin
        $newAdmin = new Admin;
        $newAdmin->username = $request->username;
        $newAdmin->password = Hash::make($request->password);
        $newAdmin->institution_id = Auth::user()->institution_id;
        $newAdmin->is_activated = 1;
        $newAdmin->save();
        return redirect()->to('/admin/AdminSection');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
     //   $admin = Admin::where('id', $request->id)->first();
     //   $admin->username = $request->username;
     //   $admin->password = $request->password;
     //   $admin->save();
        dd($request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $admins = Admin::where('id', $request->id)->first();
        $admins->delete();
        return redirect()->to('/admin/AdminSection');
      }
  

}



