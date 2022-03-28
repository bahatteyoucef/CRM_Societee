<?php

namespace App\Http\Controllers;

use App\Models\ElementProcess;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ElementProcessController extends Controller
{
    public function index()
    {
        $element_process    =   DB::table('element_process')
        
                                ->select(['element_process.id       as id', 
                                'element_process.nom                as nom',
                                'element_process.desc               as desc',
                                'process.nom                        as process',
                                'etat_audit.nom                     as etat_audit'
                                ])

                                ->join('process'    ,'element_process.id_process'       ,'process.id')
                                ->join('etat_audit' ,'element_process.id_etat_audit'    ,'etat_audit.id')
                                ->orderBy('element_process.id','desc')
                                ->get();

        return $element_process;
    }

    public function combobox()
    {
        return ElementProcess::select([ 
                'element_process.id     as id', 
                'element_process.nom    as nom'])
            ->orderBy('element_process.id','desc')
            ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
            'id_process'        =>  'required',
            'id_etat_audit'     =>  'required',
            'desc'              =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $element_process = new ElementProcess([
            'nom'               =>  $request->input('nom'),
            'id_process'        =>  $request->input('id_process'),	
            'id_etat_audit'     =>  $request->input('id_etat_audit'),
            'desc'              =>  $request->input('desc'),
        ]);

        $element_process->save();

        return response()->json('Plan has been created!');
    }

    public function show($id)
    {
        return  ElementProcess::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
            'id_process'        =>  'required',
            'id_etat_audit'     =>  'required',
            'desc'              =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $element_process                    =   ElementProcess::find($id);

        $element_process->nom               =   $request->input('nom');
        $element_process->id_process        =   $request->input('id_process');
        $element_process->id_etat_audit     =   $request->input('id_etat_audit');
        $element_process->desc              =  $request->input('desc');

        $element_process->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $element_process    = ElementProcess::find($id);
        $element_process->delete();

        return "Plan has been deleted";
    }
}
