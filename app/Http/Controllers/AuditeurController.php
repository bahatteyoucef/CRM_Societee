<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Auditeur;

use Illuminate\Support\Facades\Validator;

class AuditeurController extends Controller
{
    public function index()
    {
        $auditeurs      =   DB::table('auditeurs')
                                ->select([ 
                                    'auditeurs.id       as id', 
                                    'auditeurs.nom      as nom',
                                    'auditeurs.prenom   as prenom',
                                    'auditeurs.email    as email',
                                    
                                    'fonctions.id       as id_fonction', 
                                    'fonctions.nom      as fonction',

                                    'structures.id      as id_structure', 
                                    'structures.nom     as structure',
                                    
                                    'societees.nom      as societee',])
                                
                                ->join('fonctions'                  , 'auditeurs.id_fonction'               , 'fonctions.id')
                                ->join('structures'                 , 'auditeurs.id_structure'              , 'structures.id')
                                ->join('societees'                  , 'auditeurs.id_societee'               , 'societees.id')

                                ->orderBy('auditeurs.id','desc')
                                ->get();

        return $auditeurs; 
    }

    public function combobox()
    {
        $auditeurs   =     DB::table('auditeurs')
                            ->select([ 
                                'auditeurs.id        as id', 
                                'auditeurs.nom       as nom'])
                            ->orderBy('auditeurs.id','desc')
                            ->get();

        return $auditeurs; 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => "required",
            'prenom'            => "required",
            'email'             => "required",
            'password'          => "required",
            'id_fonction'       => "required",
            'id_structure'      => "required",
            'id_societee'       => "required",
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $auditeurs = new Auditeur([
            'nom'               => $request->input('nom'),
            'prenom'            => $request->input('prenom'),
            'email'             => $request->input('email'),
            'password'          => Hash::make($request->input('password')),

            'id_fonction'       => $request->input('id_fonction'),
            'id_structure'      => $request->input('id_structure'),
            'id_societee'       => $request->input('id_societee')
        ]);

        $auditeurs->save();

        return response()->json('Plan has been created!');
    }

    public function show($id)
    {
        return  Auditeur::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => "required",
            'prenom'            => "required",
            'email'             => "required",
            'id_fonction'       => "required",
            'id_structure'      => "required",
            'id_societee'       => "required"
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $auditee   =   Auditeur::find($id);

        $auditee->nom               =   $request->input('nom');
        $auditee->prenom            =   $request->input('prenom');
        $auditee->email             =   $request->input('email');

        $auditee->id_fonction       =   $request->input('id_fonction');
        $auditee->id_structure      =   $request->input('id_structure');
        $auditee->id_societee       =   $request->input('id_societee');

        $auditee->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $auditee = Auditeur::find($id);
        $auditee->delete();

        return "Plan has been deleted";
    }

}
