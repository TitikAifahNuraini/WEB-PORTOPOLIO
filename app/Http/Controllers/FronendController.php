<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Kontak;

class FronendController extends Controller
{
   public function index(){
    $biodata = Biodata::orderBy('id', 'DESC')->first();
    $biodatas = Biodata::orderBy('id', 'DESC')->get();
    $education = Education::orderBy('id', 'DESC')->get();
    $experience = Experience::orderBy('id', 'DESC')->get();
    $kontak = Kontak::orderBy('id', 'DESC')->get();
    
    return view('layouts.fronend.main', [
        'biodatas' => $biodata,
        'biodata' => $biodatas,
        'education' =>$education,
        'experience' =>$experience,
        'kontak' => $kontak,

       
    ]);

   }
}
