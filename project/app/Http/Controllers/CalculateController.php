<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalculateController extends Controller
{
    public function index(Request $request){
        return response()->json(array('msg'=> $request->result), 200);
    }
}
