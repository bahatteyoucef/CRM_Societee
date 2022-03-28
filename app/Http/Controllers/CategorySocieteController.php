<?php

namespace App\Http\Controllers;

use App\Models\CategorySociete;
use Illuminate\Http\Request;

class CategorySocieteController extends Controller
{
    public function index()
    {
        return CategorySociete::orderBy('id_category_societe','desc')->get();
    }
}
