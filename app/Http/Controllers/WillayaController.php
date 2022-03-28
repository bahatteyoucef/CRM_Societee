<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Willaya;

class WillayaController extends Controller
{
    public function index()
    {
        return Willaya::orderBy('id_willaya','desc')->get();
    }
}
