<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalculateController extends Controller
{
    public function index(){
        $msg = "Veikia";
        return response()->json(array('msg'=> $msg), 200);
    }
}
