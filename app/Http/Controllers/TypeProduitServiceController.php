<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TypeProduitService;
 
class TypeProduitServiceController extends Controller
{
    public function index()
    {
        return  TypeProduitService::orderBy('id_type_prd_srv','desc')->get();
    }
}
