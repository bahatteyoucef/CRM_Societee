<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Constat;

class ConstatController extends Controller
{
    public function index()
    {
        $constats   =     DB::table('constats')
                            ->join('programs'                   , 'constats.id_program'                 , 'programs.id')
                            ->join('element_process'            , 'constats.id_element_process'         , 'element_process.id')
                            ->select([ 
                                'constats.id            as id', 
                                'programs.nom           as program', 
                                'element_process.nom    as element_process',])
                            ->orderBy('constats.id','desc')
                            ->get();

        return $constats; 
    }

    public function combobox()
    {

        $constats   =     DB::table('constats')
                            ->select([ 
                                'constats.id                    as id', 
                                'constats.reference             as reference'])
                            ->orderBy('constats.id','desc')
                            ->get();

        return $constats;  
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_program'                =>  'required',
            'id_element_process'        =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $constat = new Constat([
            'id_program'            => $request->input('id_program'),
            'id_element_process'    => $request->input('id_element_process')
        ]);

        $constat->save();

        return response()->json('Plan has been created!');
    }

    public function show($id)
    {
        return  Constat::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_program'                =>  'required',
            'id_element_process'        =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $constat   =   Constat::find($id);

        $constat->id_program            =   $request->input('id_program');
        $constat->id_element_process    =   $request->input('id_element_process');

        $constat->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $constat = Constat::find($id);
        $constat->delete();

        return "Plan has been deleted";
    }

}
