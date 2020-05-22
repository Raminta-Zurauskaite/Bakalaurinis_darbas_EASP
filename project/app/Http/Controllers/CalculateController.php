<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use PDF;
use PHPUnit\Util\Json;

class CalculateController extends Controller
{
    public function index(Request $request){
        return response()->json(array('msg'=> $request->result), 200);
    }

    public function export_pdf()
    {
        $pdf = PDF::loadView('example');
        return $pdf->download('skaiciavimai.pdf');
    }
}
