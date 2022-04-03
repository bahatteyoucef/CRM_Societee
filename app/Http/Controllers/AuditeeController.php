<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Auditee;

class AuditeeController extends Controller
{
    public function index()
    {
        $auditees   =   DB::table('auditees')
                        ->select([ 
                            'auditees.id        as id', 
                            'auditees.nom       as nom',
                            'auditees.prenom    as prenom',
                            
                            'fonctions.id       as id_fonction', 
                            'fonctions.nom      as fonction',

                            'structures.id      as id_structure', 
                            'structures.nom     as structure',
                            
                            'societees.nom      as societee'])

                            ->join('fonctions'                  , 'auditees.id_fonction'            , 'fonctions.id')
                            ->join('structures'                 , 'auditees.id_structure'           , 'structures.id')
                            ->join('societees'                  , 'auditees.id_societee'            , 'societees.id')

                            ->orderBy('auditees.id','desc')
                            ->get();

        return $auditees; 
    }

    public function combobox()
    {
        $auditees   =     DB::table('auditees')
                            ->select([ 
                                'auditees.id        as id', 
                                'auditees.nom       as nom'])
                            ->orderBy('auditees.id','desc')
                            ->get();

        return $auditees; 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
            'prenom'            =>  'required',
            'id_fonction'       =>  'required',
            'id_structure'      =>  'required',
            'id_societee'       =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $auditee = new Auditee([
            'nom'               => $request->input('nom'),
            'prenom'            => $request->input('prenom'),
            'id_fonction'       => $request->input('id_fonction'),
            'id_structure'      => $request->input('id_structure'),
            'id_societee'       => $request->input('id_societee')
        ]);

        $auditee->save();

        return response()->json('Auditee has been created!');
    }

    public function details($id)
    {
        $auditees   =   DB::table('auditees')
                        ->where('auditees.id',$id)

                        ->select([ 
                            'auditees.id        as id', 
                            'auditees.nom       as nom',
                            'auditees.prenom    as prenom',
                            
                            'fonctions.id       as id_fonction', 
                            'fonctions.nom      as fonction',

                            'structures.id      as id_structure', 
                            'structures.nom     as structure',
                            
                            'societees.nom      as societee'])

                            ->join('fonctions'                  , 'auditees.id_fonction'            , 'fonctions.id')
                            ->join('structures'                 , 'auditees.id_structure'           , 'structures.id')
                            ->join('societees'                  , 'auditees.id_societee'            , 'societees.id')

                        ->first();

        return $auditees; 
    }

    public function show($id)
    {
        return  Auditee::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
            'prenom'            =>  'required',
            'id_fonction'       =>  'required',
            'id_structure'      =>  'required',
            'id_societee'       =>  'required'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $auditee   =   Auditee::find($id);

        $auditee->nom               =   $request->input('nom');
        $auditee->prenom            =   $request->input('prenom');
        $auditee->id_fonction       =   $request->input('id_fonction');
        $auditee->id_structure      =   $request->input('id_structure');
        $auditee->id_societee       =   $request->input('id_societee');
        
        $auditee->save();

        return response()->json('Auditee has been created!');
    }

    public function delete($id)
    {
        $auditee = Auditee::find($id);
        $auditee->delete();

        return "Plan has been deleted";
    }


}
