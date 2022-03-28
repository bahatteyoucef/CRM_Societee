<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DevisClient;

class DevisClientController extends Controller
{
    public function index()
    {
        $clients_devis          =   DB::table('devis_clients')
                                    ->join('contact_clients'                    , 'devis_clients.id_contact_client'         , 'contact_clients.id_contact_client')
                                    ->join('clients'                            , 'contact_clients.id_societe_client'       , 'clients.id_client')
                                    ->join('commande_ventes'                    , 'devis_clients.id_commande_vente'         , 'commande_ventes.id_commande_vente')

                                    ->orderBy('id_devis_client','desc')
                                    ->get();

        return $clients_devis;
    }

    public function store(Request $request)
    {
        $devis_client = new DevisClient([
            'id_contact_client'             => $request->input('id_contact_client'),
            
            'adresse_facturation'           => $request->input('adresse_facturation'),
            'adresse_livraison'             => $request->input('adresse_livraison'),
            
            'etat_devis_client'             => 1,

            'date_creation_devis_client'    => $request->input('date_creation_devis_client'),
            'date_annulation_devis_client'  => $request->input('date_annulation_devis_client'),

            'commentaire_devis_client'      => $request->input('commentaire_devis_client'),
        ]);
        
        $devis_client->save();

        $devis_client->reference_devis_client   =   "D".$devis_client->id_devis_client;
        $devis_client->save();

        return response()->json('devis has been created!');
    }
}
