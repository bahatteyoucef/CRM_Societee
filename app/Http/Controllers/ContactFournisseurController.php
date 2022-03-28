<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ContactFournisseur;

class ContactFournisseurController extends Controller
{
    public function index()
    {
        $contact_fournisseurs       =   DB::table('contact_fournisseurs')
                                        ->join('willayas'           , 'contact_fournisseurs.willaya_contact_fournisseur'          , 'willayas.id_willaya')
                                        ->join('communes'           , 'contact_fournisseurs.commune_contact_fournisseur'          , 'communes.id_commune')
                                        ->join('fonctions'          , 'contact_fournisseurs.fonction_contact_fournisseur'         , 'fonctions.id_fonction')
                                        ->orderBy('id_contact_fournisseur', 'desc')
                                        ->get();

        return $contact_fournisseurs;
    }

    public function show($id_fournisseur,$id_contact_fournisseur)
    {
        return ContactFournisseur::find($id_contact_fournisseur);
    }

    public function store($id_fournisseur,Request $request)
    {
        $contact_fournisseur = new ContactFournisseur([
            'id_societe_fournisseur'             => $request->input('id_societe_fournisseur'),
            
            'nom_contact_fournisseur'            => $request->input('nom_contact_fournisseur'),
            'prenom_contact_fournisseur'         => $request->input('prenom_contact_fournisseur'),
            
            'tel1_contact_fournisseur'           => $request->input('tel1_contact_fournisseur'),
            'tel2_contact_fournisseur'           => $request->input('tel2_contact_fournisseur'),

            'email_contact_fournisseur'          => $request->input('email_contact_fournisseur'),
            
            'adresse_contact_fournisseur'        => $request->input('adresse_contact_fournisseur'),
            'commune_contact_fournisseur'        => $request->input('commune_contact_fournisseur'),
            'willaya_contact_fournisseur'        => $request->input('willaya_contact_fournisseur'),
            
            'fonction_contact_fournisseur'       => $request->input('fonction_contact_fournisseur'),
        ]);

        $fileName   = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/fournisseurs/contact'), $fileName);
        $contact_fournisseur->image_contact_fournisseur           =   $fileName;

        $contact_fournisseur->save();

        return response()->json('Contact fournisseur has been created!');
    }

    public function update($id_fournisseur,$id_contact_fournisseur,Request $request)
    {
        $contact_fournisseur = ContactFournisseur::find($id_contact_fournisseur);

        $contact_fournisseur->id_societe_fournisseur              = $request->input('id_societe_fournisseur');
        
        $contact_fournisseur->nom_contact_fournisseur             = $request->input('nom_contact_fournisseur');
        $contact_fournisseur->prenom_contact_fournisseur          = $request->input('prenom_contact_fournisseur');
        
        $contact_fournisseur->tel1_contact_fournisseur            = $request->input('tel1_contact_fournisseur');    
        $contact_fournisseur->tel2_contact_fournisseur            = $request->input('tel2_contact_fournisseur');

        $contact_fournisseur->email_contact_fournisseur           = $request->input('email_contact_fournisseur');
        
        $contact_fournisseur->adresse_contact_fournisseur         = $request->input('adresse_contact_fournisseur');
        $contact_fournisseur->commune_contact_fournisseur         = $request->input('commune_contact_fournisseur');
        $contact_fournisseur->willaya_contact_fournisseur         = $request->input('willaya_contact_fournisseur');
        
        $contact_fournisseur->fonction_contact_fournisseur        = $request->input('fonction_contact_fournisseur');

        $fileName   = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/fournisseurs/contact'), $fileName);
        $contact_fournisseur->image_contact_fournisseur           =   $fileName;

        $contact_fournisseur->save();

        return response()->json('Fournisseur Contact has been updated!');
    }

    public function delete($id_fournisseur,$id_contact_fournisseur)
    {
        $contact_fournisseur = ContactFournisseur::find($id_contact_fournisseur);
        $contact_fournisseur->delete();

        return "Contact fournisseur has been deleted";
    }

    //

    public function fournisseurContact($id_fournisseur) {
        return ContactFournisseur::where('id_societe_fournisseur',$id_fournisseur)->orderBy('id_contact_fournisseur','desc')->get();
    } 
    
}
