<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use Illuminate\Support\Facades\Auth;

class MyInstitution extends Controller
{
    protected $institution;

    protected $currentAdminInstitutionId;


    protected function currentAdminInstitutionId(){
        return Auth::user()->institution_id;
    }

    protected function getInstitution(){
        return Institution::where('id', Auth::user()->institution_id)->first();
    }


}
