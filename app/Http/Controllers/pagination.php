<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\node;

class pagination extends Controller
{
    public $current;

    public function __construct(){
        $this->current = NULL;
    }

    public function getCurrent(){

        return $this->current;
        
    }

    public function setCurrent($setCurrent){
        $newData = new node($setCurrent);

        $this->current = $newData;
    }

    public function setNext($setNext){
        $newData = new node($setNext);
        $this->current->setNextItem($newData);
    }

    public function getNext(){
        return $this->current->getNextItem();
    }

}
