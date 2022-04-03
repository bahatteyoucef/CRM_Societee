<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans           =   DB::table('plans')
                                ->select([  'plans.id as id', 
                                            'plans.nom          as nom',
                                            'plans.date_debut   as date_debut',
                                            'plans.date_fin     as date_fin',
                                            'plans.desc         as desc',

                                            'societees.id       as id_societee',
                                            'societees.nom      as societee',

                                            'auditeurs.id       as id_auditeur',
                                            'auditeurs.nom      as auditeur'])

                                ->join('auditeurs'              , 'plans.id_auditeur'        , 'auditeurs.id')
                                ->join('societees'              , 'plans.id_societee'        , 'societees.id')
                                
                                ->orderBy('plans.id','desc')
                                ->get();

        return $plans; 
    }

    public function combobox()
    {
        $plans           =   DB::table('plans')
                                ->select(['plans.id as id', 
                                        'plans.nom          as nom'])
                                ->orderBy('plans.id','desc')
                                ->get();

        return $plans; 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
            'date_debut'        =>  'required',
            'date_fin'          =>  'required',
            'id_type_audit'     =>  'required',
            'id_societee'       =>  'required',
            'desc'              =>  'required'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $plan = new Plan([
            'nom'                   => $request->input('nom'),
            'date_debut'            => $request->input('date_debut'),
            'date_fin'              => $request->input('date_fin'),
            'desc'                  => $request->input('desc'),
            'id_type_audit'         => $request->input('id_type_audit'),
            'id_societee'           => $request->input('id_societee'),
            'id_auditeur'           => Auth::user()->id,
        ]);

        $plan->save();

        return response()->json('Plan has been created!');
    }

    public function show($id)
    {
        return  Plan::find($id);
    }

    public function details($id)
    {
        $plans           =   DB::table('plans')
                                ->where('plans.id',$id)
                                ->select(['plans.id as id', 
                                                                'plans.nom          as nom',
                                                                'plans.date_debut   as date_debut',
                                                                'plans.date_fin     as date_fin',
                                                                'plans.desc         as desc',

                                                                'societees.id       as id_societee',
                                                                'societees.nom      as societee',

                                                                'auditeurs.id       as id_auditeur',
                                                                'auditeurs.nom      as auditeur',
                                                                
                                                                'type_audit.nom     as type_audit'])

                                ->join('auditeurs'              , 'plans.id_auditeur'           , 'auditeurs.id')
                                ->join('societees'              , 'plans.id_societee'           , 'societees.id')
                                ->join('type_audit'             , 'plans.id_type_audit'         , 'type_audit.id')
                                ->first();

        return $plans; 
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => 'required',
            'date_debut'        => 'required',
            'date_fin'          => 'required',
            'id_type_audit'     => 'required',
            'id_societee'       => 'required',
            'desc'              => 'required'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $plan   =   Plan::find($id);

        $plan->nom              =   $request->input('nom');
        $plan->date_debut       =   $request->input('date_debut');
        $plan->date_fin         =   $request->input('date_fin');
        $plan->desc             =   $request->input('desc');
        $plan->id_type_audit    =   $request->input('id_type_audit');
        $plan->id_societee      =   $request->input('id_societee');

        $plan->save();

        return response()->json('Plan has been created!');
    }

    public function delete($id)
    {
        $plan = Plan::find($id);
        $plan->delete();

        return "Plan has been deleted";
    }

    //

    public function planPrograms($id)
    {
        $programs           =   DB::table('programs')
                                ->select(['programs.id      as id', 
                                    'programs.nom           as nom',
                                    'programs.ordre         as ordre',

                                    'programs.date_debut    as date_debut',
                                    'programs.date_fin      as date_fin',
                                    'programs.heure_debut   as heure_debut', 
                                    'programs.heure_fin     as heure_fin',
                                    'programs.description   as description',
                                    
                                    'plans.nom              as plan',     
                                    'process.nom            as process',
                                    'auditeurs.nom          as auditeur',
                                    'auditees.nom           as auditee',              
                                    'type_audit.nom         as type_audit'
                                ])
                                
                                ->join('plans'                  , 'programs.id_plan'            , 'plans.id')
                                ->join('process'                , 'programs.id_process'         , 'process.id')
                                ->join('auditeurs'              , 'programs.id_auditeur'        , 'auditeurs.id')
                                ->join('auditees'               , 'programs.id_auditee'         , 'auditees.id')
                                ->join('type_audit'             , 'programs.id_type_audit'      , 'type_audit.id')
                                ->join('societees'              , 'programs.id_societee'        , 'societees.id')

                                ->where('plans.id'      ,   $id)
                                ->orderBy('programs.ordre' ,   'desc')
                                ->get();

        return $programs; 
    }
}
