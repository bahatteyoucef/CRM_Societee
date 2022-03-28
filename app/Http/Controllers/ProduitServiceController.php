<?php

namespace App\Http\Controllers;

use App\Models\ProduitService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProduitServiceController extends Controller
{

    public function indexAchat()
    {
        $produits           =   DB::table('produit_services')
                                    ->join('category_produit_services'          , 'produit_services.id_category_prd_srv'        , 'category_produit_services.id_category_prd_srv')
                                    ->join('contact_fournisseurs'               , 'produit_services.id_contact_fournisseur'     , 'contact_fournisseurs.id_contact_fournisseur')
                                    ->join('fournisseurs'                       , 'contact_fournisseurs.id_societe_fournisseur' , 'fournisseurs.id_fournisseur')

                                    ->join('famille_comptables'                 , 'produit_services.id_famille_cmpt'            , 'famille_comptables.id_famille_cmpt')
                                    ->join('type_produit_services'              , 'produit_services.id_type_prd_srv'            , 'type_produit_services.id_type_prd_srv')

                                    ->join('unite_vente_achats'                 , 'produit_services.unite_vente_prd_srv'        , 'unite_vente_achats.id_unite_vente_achat')

                                    ->orderBy('id_fournisseur','desc')
                                    ->get();

        return $produits;
    }

    public function indexProduction()
    {
        return ProduitService::where('id_type_prd_srv',2)->orderBy('id_prd_srv', 'desc')->get();
    }

    public function indexGlobal()
    {
        return ProduitService::orderBy('id_prd_srv', 'desc')->get();  
    }

    //    
    public function show($id_prd_srv)
    {
        return  DB::table('produit_services')
                    ->where('id_prd_srv',$id_prd_srv)
                    ->join('contact_fournisseurs'   , 'produit_services.id_contact_fournisseur'         , 'contact_fournisseurs.id_contact_fournisseur')
                    ->join('fournisseurs'           , 'contact_fournisseurs.id_societe_fournisseur'     , 'fournisseurs.id_fournisseur')
                    ->first();
    }

    public function store(Request $request)
    {
        $produit = new ProduitService([
            'id_contact_fournisseur'        => $request->input('id_contact_fournisseur'),
            'id_famille_cmpt'               => $request->input('id_famille_cmpt'),
            'id_category_prd_srv'           => $request->input('id_category_prd_srv'),
            'id_type_prd_srv'               => $request->input('id_type_prd_srv'),
            'id_societe'                    => $request->input('id_societe'),

            'code_prd_srv'                  => $request->input('code_prd_srv'),
            'libelle_prd_srv'               => $request->input('libelle_prd_srv'),
            'description_prd_srv'           => $request->input('description_prd_srv'),

            'prix_vente_prd_srv'	        => $request->input('prix_vente_prd_srv'),
            'unite_vente_prd_srv'	        => $request->input('unite_vente_prd_srv'),
            'prix_achat_prd_srv'	        => $request->input('prix_achat_prd_srv'),
            'unite_achat_prd_srv'           => $request->input('unite_achat_prd_srv'),

            'quantite_disponible_prd_srv'   => $request->input('quantite_disponible_prd_srv')
        ]);

        $fileName   = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/produit_services'), $fileName);
        $produit->image_prd_srv             =   $fileName;
        
        $produit->save();

        return response()->json('produit has been created!');
    }

    public function update($id_prd_srv,Request $request)
    {
        $produit = ProduitService::find($id_prd_srv);

        $produit->id_contact_fournisseur        = $request->input('id_contact_fournisseur');
        $produit->id_famille_cmpt               = $request->input('id_famille_cmpt');
        $produit->id_category_prd_srv           = $request->input('id_category_prd_srv');
        $produit->id_type_prd_srv               = $request->input('id_type_prd_srv');
        $produit->id_societe                    = Auth::user()->id;
    
        $produit->code_prd_srv                  = $request->input('code_prd_srv');
        $produit->libelle_prd_srv               = $request->input('libelle_prd_srv');
        $produit->description_prd_srv           = $request->input('description_prd_srv');

        $produit->prix_vente_prd_srv	        = $request->input('prix_vente_prd_srv');
        $produit->unite_vente_prd_srv	        = $request->input('unite_vente_prd_srv');
        $produit->prix_achat_prd_srv	        = $request->input('prix_achat_prd_srv');
        $produit->unite_achat_prd_srv           = $request->input('unite_achat_prd_srv');

        $produit->quantite_disponible_prd_srv   = $request->input('quantite_disponible_prd_srv');

        $fileName   = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/produit_services'), $fileName);
        $produit->image_prd_srv             =   $fileName;

        $produit->save();

        return response()->json('produit has been updated!');
    }

    public function delete($id_prd_srv)
    {
        $produit = ProduitService::find($id_prd_srv);
        $produit->delete();

        return "produit has been deleted";
    }
}
