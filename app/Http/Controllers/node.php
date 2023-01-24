<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class node extends Controller
{
    public $item;

    public $nextItem;

    public function __construct($newitem){    
       $this->item = $newitem;
    }

    public function setNextItem($newNextItem){
        $this->nextItem = $newNextItem;
    }

    public function getNextItem(){
        return $this->nextItem;
    }

    public function getItem(){
        return $this->item;
    }

}
