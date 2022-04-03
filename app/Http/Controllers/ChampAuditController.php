<?php

namespace App\Http\Controllers;

use App\Models\ChampAudit;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ChampAuditController extends Controller
{
    public function index()
    {
        $champ_audit        =   DB::table('champ_audit')

                                    ->select([    
                                            'champ_audit.id     as id', 
                                            'champ_audit.nom    as nom'
                                        ])
                        
                                ->orderBy('champ_audit.id','desc')
                                ->get();

        return $champ_audit;  
    }

    public function combobox()
    {
        return ChampAudit::select([ 'champ_audit.id     as id', 
                                    'champ_audit.nom    as nom'])
                        ->orderBy('id','desc')
                        ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => "required",
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $champ_audit = new ChampAudit([
            'nom'               => $request->input('nom'),
        ]);

        $champ_audit->save();

        return response()->json('Plan has been created!');
    }

    public function details($id)
    {
        $champ_audit        =   DB::table('champ_audit')
                                    ->where("champ_audit.id",$id)

                                    ->select([    
                                            'champ_audit.id     as id', 
                                            'champ_audit.nom    as nom'
                                    ])
                        
                                ->first();

        return $champ_audit;  
    }

    public function show($id)
    {
        return  ChampAudit::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => "required",
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $champ_audit            =   ChampAudit::find($id);

        $champ_audit->nom       =   $request->input('nom');

        $champ_audit->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $champ_audit    = ChampAudit::find($id);
        $champ_audit->delete();

        return "Plan has been deleted";
    }
}
