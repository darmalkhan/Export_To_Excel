<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\DB;

use DB;
use Excel;

class export_excel extends Controller
{
    //

     function excel(){

     $data = DB::table('users')->get();
     return view('export')->with('data', $data);
    }
}
