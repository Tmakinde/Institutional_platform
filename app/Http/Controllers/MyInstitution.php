<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyInstitution extends Controller
{
    protected $institution;

    protected $currentAdminInstitutionId;


    protected function currentAdminInstitutionId(){
        return Auth::user()->institution_id;
    }

    protected function getInstitution(Institution $institution){
        return $institution->where('id', Auth::user()->institution_id)->first();
    }


}
