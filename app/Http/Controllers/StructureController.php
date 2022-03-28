<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Structure;

class StructureController extends Controller
{
    public function index()
    {
        $structures     =   DB::table('structures')
                                ->select([ 
                                    'structures.id        as id', 
                                    'structures.nom       as nom'])
                                ->orderBy('structures.id','desc')
                                ->get();

        return $structures; 
    }

    public function combobox()
    {
        $structures   =      DB::table('structures')
                                ->select([ 
                                    'structures.id        as id', 
                                    'structures.nom       as nom'])
                                ->orderBy('structures.id','desc')
                                ->get();

        return $structures; 
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

        $structure = new Structure([
            'nom'               => $request->input('nom'),
        ]);

        $structure->save();

        return response()->json('Plan has been created!');
    }

    public function show($id)
    {
        return  Structure::find($id);
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

        $structure   =   Structure::find($id);

        $structure->nom               =   $request->input('nom');

        $structure->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $structure = Structure::find($id);
        $structure->delete();

        return "Plan has been deleted";
    }

}
