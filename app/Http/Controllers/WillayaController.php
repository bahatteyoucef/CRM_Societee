<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Willaya;
use App\Models\Auditeur;

class WillayaController extends Controller
{
    public function index()
    {
        return Willaya::orderBy('id_willaya','desc')->get();
    }

    public function testData()
    {
        $auditeurs = Auditeur::all();
        return response()->json($auditeurs);
    }
}
