<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Process;

class ProcessController extends Controller
{
    public function index()
    {
        $process            =   DB::table('process')
                                ->select(['champ_audit.nom as champ_audit', 
                                    'type_process.nom   as type_process',
                                    'process.ref        as ref',
                                    'process.duree      as duree',              
                                    'process.nom        as nom',
                                    'process.id         as id'])
                         
                                ->join('champ_audit'                , 'process.id_champ_audit'          , 'champ_audit.id')
                                ->join('type_process'               , 'process.id_type_process'         , 'type_process.id')
                                ->orderBy('process.id','desc')
                                ->get();

        return $process; 
    }

    public function combobox()
    {
        $process            =   DB::table('process')
                                ->select(['process.nom        as nom',
                                    'process.id         as id'])
                                ->orderBy('process.id','desc')
                                ->get();

        return $process; 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => 'required',
            'duree'             => 'required',
            'id_champ_audit'    => 'required',
            'id_type_process'   => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $process = new Process([
            'nom'                       => $request->input('nom'),
            'duree'                     => $request->input('duree'),
            'id_champ_audit'            => $request->input('id_champ_audit'),
            'id_type_process'           => $request->input('id_type_process'),
        ]);

        $process->save();

        return response()->json('Process has been created!');
    }

    public function show($id)
    {
        return  Process::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => 'required',
            'duree'             => 'required',
            'id_champ_audit'    => 'required',
            'id_type_process'   => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $process   =   Process::find($id);

        $process->nom               =   $request->input('nom');
        $process->duree             =   $request->input('duree');
        $process->id_champ_audit    =   $request->input('id_champ_audit');
        $process->id_type_process   =   $request->input('id_type_process');

        $process->save();

        return response()->json('Process has been created!');
    }

    public function delete($id)
    {
        $process = Process::find($id);
        $process->delete();

        return "Process has been deleted";
    }

    //

    public function processElements($id)
    {
        $element_process    =   DB::table('element_process')
                                ->where('process.id',$id)
                                
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
}
