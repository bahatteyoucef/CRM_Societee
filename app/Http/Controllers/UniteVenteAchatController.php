<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UniteVenteAchat;

class UniteVenteAchatController extends Controller
{
    public function index()
    {
        return UniteVenteAchat::orderBy('id_unite_vente_achat','desc')->get();
    }
}
