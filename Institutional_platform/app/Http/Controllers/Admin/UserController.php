<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Classes;
use App\Institution;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('guest:admins');
    }
    
    protected function validator(array $data ){
        return Validator::make($data, [

            'class'=> ['required'], 

        ]);
    }

    protected function register(array $data ){
        return Classes::create([
           'class' => $data['class'],

           'institution_id' => Auth::user()->institution_id,
        ]);
    }

    public function create()
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
        /*
            getting users using the current admin under the admin institution
        */
        $institutionUsersDetails = $currentInstitution->users()->first();
       // $institution = Institution::all();
    
        return view('Admin.Dashboard', compact('institutionUsersDetails', 'currentInstitution'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addClass(Request $request)
    {
        // allow admin to create a new clas that will be register with admin 
        $validator =$this->validator($request->all());
        if($validator->passes()){

            $this->register($request->all());

        }
    }

    public function editClass(Request $request)
    {
        // allow admin to edit class 
        
        // get the institution id of the current admin
        $currentInstitutionId = Auth::user()->institution_id;
        $currentInstitution = Institution::find($currentInstitution);
        $class = $currentInstitution->classes->class;
    //    return view();

    }

    public function deleteClass(Request $request)
    {
        // allow admin to delete student
        $class = Classes::where('id', $request->id)->first();
        $class->delete();
       
    }
}
