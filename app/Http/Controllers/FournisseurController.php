<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs           =   DB::table('fournisseurs')
                                        ->join('willayas'           , 'fournisseurs.willaya_fournisseur'        , 'willayas.id_willaya')
                                        ->join('communes'           , 'fournisseurs.commune_fournisseur'        , 'communes.id_commune')
                                        ->join('category_societes'  , 'fournisseurs.category_fournisseur'       , 'category_societes.id_category_societe')
                                        ->orderBy('id_fournisseur','desc')
                                        ->get();

        return $fournisseurs;
    }

    public function show($id_fournisseur)
    {
        return Fournisseur::find($id_fournisseur);
    }

    public function store(Request $request)
    {
        $fournisseur = new Fournisseur([
            'nom_fournisseur'               => $request->input('nom_fournisseur'),
            'adresse_fournisseur'           => $request->input('adresse_fournisseur'),
            'willaya_fournisseur'           => $request->input('willaya_fournisseur'),
            'commune_fournisseur'           => $request->input('commune_fournisseur'),
            
            'telephone_fournisseur'         => $request->input('telephone_fournisseur'),
            'email_fournisseur'             => $request->input('email_fournisseur'),
            'category_fournisseur'          => $request->input('category_fournisseur'),

            'position_fiscal_fournisseur'	=> $request->input('position_fiscal_fournisseur'),
            'n_serie_fournisseur'	        => $request->input('n_serie_fournisseur'),
            'nbr_employe_fournisseur'	    => $request->input('nbr_employe_fournisseur'),
            'chiffre_affaire_fournisseur'   => $request->input('chiffre_affaire_fournisseur')
        ]);

        $fileName   = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/fournisseurs'), $fileName);
        $fournisseur->image_fournisseur         =   $fileName;

        $fournisseur->save();

        $fournisseur->reference_fournisseur     =   "C".$fournisseur->id_fournisseur;
        $fournisseur->save();

        return response()->json('Fournisseur has been created!');
    }

    public function update(Request $request,$id_fournisseur)
    {
        $fournisseur = Fournisseur::find($id_fournisseur);

        $fournisseur->nom_fournisseur                 = $request->input('nom_fournisseur');
        $fournisseur->adresse_fournisseur             = $request->input('adresse_fournisseur');
        $fournisseur->willaya_fournisseur             = $request->input('willaya_fournisseur');
        $fournisseur->commune_fournisseur             = $request->input('commune_fournisseur');
            
        $fournisseur->telephone_fournisseur           = $request->input('telephone_fournisseur');
        $fournisseur->email_fournisseur               = $request->input('email_fournisseur');
        $fournisseur->category_fournisseur            = $request->input('category_fournisseur');

        $fournisseur->position_fiscal_fournisseur	    = $request->input('position_fiscal_fournisseur');
        $fournisseur->n_serie_fournisseur	            = $request->input('n_serie_fournisseur');
        $fournisseur->nbr_employe_fournisseur	        = $request->input('nbr_employe_fournisseur');
        $fournisseur->chiffre_affaire_fournisseur       = $request->input('chiffre_affaire_fournisseur');

        $fileName   = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/fournisseurs'), $fileName);
        $fournisseur->image_fournisseur         =   $fileName;

        $fournisseur->save();

        return response()->json('fournisseur has been updated!');
    }

    public function delete($id_fournisseur)
    {
        $fournisseur = Fournisseur::find($id_fournisseur);
        $fournisseur->delete();

        return "Fournisseur has been deleted";
    }
}
