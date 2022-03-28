<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoryProduitService;

class CategoryProduitServiceController extends Controller
{
    public function index()
    {
        return  CategoryProduitService::orderBy('id_category_prd_srv','desc')->get();
    }
}
