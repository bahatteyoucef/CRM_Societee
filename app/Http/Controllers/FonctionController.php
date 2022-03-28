<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Fonction;

class FonctionController extends Controller
{
    public function index()
    {
        $fonctions   =      DB::table('fonctions')
                                ->select([ 
                                    'fonctions.id        as id', 
                                    'fonctions.nom       as nom'])
                                ->orderBy('fonctions.id','desc')
                                ->get();

        return $fonctions; 
    }

    public function combobox()
    {
        $fonctions   =      DB::table('fonctions')
                                ->select([ 
                                    'fonctions.id        as id', 
                                    'fonctions.nom       as nom'])
                                ->orderBy('fonctions.id','desc')
                                ->get();

        return $fonctions; 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $fonction = new Fonction([
            'nom'               => $request->input('nom'),
        ]);

        $fonction->save();

        return response()->json('Fonction has been created!');
    }

    public function show($id)
    {
        return  Fonction::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $fonction   =   Fonction::find($id);

        $fonction->nom               =   $request->input('nom');

        $fonction->save();

        return response()->json('Fonction has been created!');
    }

    public function delete($id)
    {
        $fonction = Fonction::find($id);
        $fonction->delete();

        return "Plan has been deleted";
    }

}
