<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FamilleComptable;

class FamilleComptableController extends Controller
{
    public function index()
    {
        return  FamilleComptable::orderBy('id_famille_cmpt','desc')->get();
    }
}
