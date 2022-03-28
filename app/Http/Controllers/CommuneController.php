<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;

class CommuneController extends Controller
{
    public function index()
    {
        return Commune::orderBy('id_commune','desc')->get();
    }

    public function willayaCommunes($id_willaya)
    {
        return Commune::where('id_willaya',$id_willaya)->orderBy('id_commune','desc')->get();
    }

    
}
