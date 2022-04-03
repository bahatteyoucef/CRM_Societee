<?php

namespace App\Http\Controllers;

use App\Models\Program;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    public function index()
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
                                    'type_audit.nom         as type_audit',
                                    'societees.nom           as societe'
                                ])

                                ->join('plans'                  , 'programs.id_plan'            , 'plans.id')
                                ->join('process'                , 'programs.id_process'         , 'process.id')
                                ->join('auditeurs'              , 'programs.id_auditeur'        , 'auditeurs.id')
                                ->join('auditees'               , 'programs.id_auditee'         , 'auditees.id')
                                ->join('type_audit'             , 'programs.id_type_audit'      , 'type_audit.id')
                                ->join('societees'              , 'programs.id_societee'        , 'societees.id')

                                ->orderBy('programs.id','desc')
                                ->get();

        return $programs; 
    }

    public function combobox()
    {
        $programs           =   DB::table('programs')
                                ->select(['programs.id      as id', 
                                    'programs.nom           as nom',
                                ])
                                ->orderBy('programs.id','desc')
                                ->get();

        return $programs; 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'                   => "required"   ,  
            'ordre'                 => "required"   ,    
            'date_debut'            => "required"   ,
            'date_fin'              => "required"   ,
            'heure_debut'           => "required"   ,
            'heure_fin'             => "required"   ,
            'description'           => "required"   ,
            
            'id_plan'               => "required"   ,
            'id_process'            => "required"   ,
            'id_auditee'            => "required"   ,
            'id_type_audit'         => "required"   ,
            'id_societee'            => "required"   ,
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $program = new Program([
            'nom'                   => $request->input('nom'),
            'ordre'                 => $request->input('ordre'),
            
            'date_debut'            => $request->input('date_debut'),
            'date_fin'              => $request->input('date_fin'),
            'heure_debut'           => $request->input('heure_debut'),
            'heure_fin'             => $request->input('heure_fin'),

            'description'           => $request->input('description'),

            'id_plan'               => $request->input('id_plan'),
            'id_process'            => $request->input('id_process'),
            'id_auditeur'           => Auth::user()->id,
            'id_auditee'            => $request->input('id_auditee'),
            'id_type_audit'         => $request->input('id_type_audit'),
            'id_societee'            => $request->input('id_societee'),
        ]);

        $program->save();

        return response()->json('Process has been created!');
    }

    public function show($id)
    {
        $programs           =   DB::table('programs')
                                ->where('programs.id',$id)
                                ->join('plans'                  , 'programs.id_plan'            , 'plans.id')
                                ->join('process'                , 'programs.id_process'         , 'process.id')
                                ->join('auditeurs'              , 'programs.id_auditeur'        , 'auditeurs.id')
                                ->join('auditees'               , 'programs.id_auditee'         , 'auditees.id')
                                ->join('type_audit'             , 'programs.id_type_audit'      , 'type_audit.id')
                                ->join('societees'              , 'programs.id_societee'        , 'societees.id')

                                ->select(['programs.id      as id', 
                                    'programs.nom           as nom',
                                    'programs.ordre         as ordre',

                                    'programs.date_debut    as date_debut',
                                    'programs.date_fin      as date_fin',
                                    'programs.heure_debut   as heure_debut', 
                                    'programs.heure_fin     as heure_fin',
                                    'programs.description   as description',
                                    
                                    'plans.nom              as plan',
                                    'plans.id               as id_plan',     

                                    'process.nom            as process',
                                    'process.id             as id_process',     

                                    'auditeurs.nom          as auditeur',
                                    'auditeurs.id           as id_auditeur',     

                                    'auditees.nom           as auditee',     
                                    'auditees.id            as id_auditee',     
         
                                    'type_audit.nom         as type_audit',
                                    'type_audit.id          as id_type_audit',     

                                    'societees.nom           as societe',
                                    'societees.id            as id_societee'     
                                    ])

                                ->first();

        return $programs; 
    }

    public function details($id)
    {
        $programs           =   DB::table('programs')
                                ->where('programs.id',$id)

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
                                    'type_audit.nom         as type_audit',
                                    'societees.nom          as societee'
                                ])

                                ->join('plans'                  , 'programs.id_plan'            , 'plans.id')
                                ->join('process'                , 'programs.id_process'         , 'process.id')
                                ->join('auditeurs'              , 'programs.id_auditeur'        , 'auditeurs.id')
                                ->join('auditees'               , 'programs.id_auditee'         , 'auditees.id')
                                ->join('type_audit'             , 'programs.id_type_audit'      , 'type_audit.id')
                                ->join('societees'              , 'programs.id_societee'        , 'societees.id')

                                ->first();

        return $programs;    
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'                   => "required"   ,  
            'ordre'                 => "required"   ,    
            'date_debut'            => "required"   ,
            'date_fin'              => "required"   ,
            'heure_debut'           => "required"   ,
            'heure_fin'             => "required"   ,
            'description'           => "required"   ,
            
            'id_plan'               => "required"   ,
            'id_process'            => "required"   ,
            'id_auditee'            => "required"   ,
            'id_type_audit'         => "required"   ,
            'id_societee'           => "required"   ,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $program                =   Program::find($id);

        $program->nom                   = $request->input('nom');
        $program->ordre                 = $request->input('ordre');
        
        $program->date_debut            = $request->input('date_debut');
        $program->date_fin              = $request->input('date_fin');
        
        $program->heure_debut           = $request->input('heure_debut');
        $program->heure_fin             = $request->input('heure_fin');

        $program->description           = $request->input('description');

        $program->id_plan               = $request->input('id_plan');
        $program->id_process            = $request->input('id_process');
        $program->id_auditeur           = Auth::user()->id;
        
        $program->id_auditee            = $request->input('id_auditee');
        $program->id_type_audit         = $request->input('id_type_audit');
        $program->id_societee            = $request->input('id_societee');

        $program->save();

        return response()->json('Program has been created!');
    }

    public function delete($id)
    {
        $program = Program::find($id);
        $program->delete();

        return "Program has been deleted";
    }
}
