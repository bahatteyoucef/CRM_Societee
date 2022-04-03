<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\ActionAudit;

class ActionAuditController extends Controller
{
    public function index()
    {
        $action_audit   =     DB::table('action_audit')
                            ->join('evaluation_audit'                   , 'action_audit.id_evaluation_audit'        , 'evaluation_audit.id')
                            ->join('constats'                           , 'action_audit.id_constat'                 , 'constats.id')
                            ->select([ 
                                'action_audit.id            as id', 
                                'action_audit.nom           as nom', 
                                'evaluation_audit.nom       as evaluation_audit',
                                'constats.reference         as constat'])
                            ->orderBy('action_audit.id','desc')
                            ->get();

        return $action_audit; 
    }

    public function combobox()
    {
        $action_audit   =       DB::table('action_audit')
                                ->select([ 
                                    'action_audit.id            as id', 
                                    'action_audit.nom           as nom'])
                                ->orderBy('action_audit.id','desc')
                                ->get();

        return $action_audit;  
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'                   =>  'required',
            'id_evaluation_audit'   =>  'required',
            'id_constat'            =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $action_audit = new ActionAudit([
            'nom'                   => $request->input('nom'),
            'id_evaluation_audit'   => $request->input('id_evaluation_audit'),
            'id_constat'            => $request->input('id_constat')
        ]);

        $action_audit->save();

        return response()->json('Plan has been created!');
    }

    public function show($id)
    {
        return  ActionAudit::find($id);
    }

    public function details($id)
    {
        $action_audit   =   DB::table('action_audit')
                            ->where('action_audit.id',$id)
                            ->select([ 
                                'action_audit.id            as id', 
                                'action_audit.nom           as nom', 
                                'evaluation_audit.nom       as evaluation_audit',
                                'constats.reference         as constat'])

                            ->join('evaluation_audit'                   , 'action_audit.id_evaluation_audit'        , 'evaluation_audit.id')
                            ->join('constats'                           , 'action_audit.id_constat'                 , 'constats.id')
                            
                            ->orderBy('action_audit.id','desc')
                            ->first();

        return $action_audit; 
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'                   =>  'required',
            'id_evaluation_audit'   =>  'required',
            'id_constat'            =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $action_audit   =   ActionAudit::find($id);

        $action_audit->nom                  =   $request->input('nom');
        $action_audit->id_evaluation_audit  =   $request->input('id_evaluation_audit');
        $action_audit->id_constat           =   $request->input('id_constat');

        $action_audit->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $action_audit = ActionAudit::find($id);
        $action_audit->delete();

        return "Plan has been deleted";
    }
}
