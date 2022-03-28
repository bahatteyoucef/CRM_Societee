<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients            =   DB::table('clients')
                                    ->join('willayas'           , 'clients.willaya_client'          , 'willayas.id_willaya')
                                    ->join('communes'           , 'clients.commune_client'          , 'communes.id_commune')
                                    ->join('category_societes'  , 'clients.category_client'     , 'category_societes.id_category_societe')
                                    ->orderBy('id_client')
                                    ->get();

        return $clients;
    }

    public function show($id_client)
    {
        return Client::find($id_client);
    }

    public function store(Request $request)
    {
        $client = new Client([
            'nom_client'                => $request->input('nom_client'),
            'adresse_client'            => $request->input('adresse_client'),
            'willaya_client'            => $request->input('willaya_client'),
            'commune_client'            => $request->input('commune_client'),
            
            'telephone_client'          => $request->input('telephone_client'),
            'email_client'              => $request->input('email_client'),
            'category_client'           => $request->input('category_client'),

            'position_fiscal_client'	=> $request->input('position_fiscal_client'),
            'n_serie_client'	        => $request->input('n_serie_client'),
            'nbr_employe_client'	    => $request->input('nbr_employe_client'),
            'chiffre_affaire_client'    => $request->input('chiffre_affaire_client')
        ]);

        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/clients'), $fileName);
        $client->image_client           =   $fileName;

        $client->save();

        $client->reference_client       =   "C".$client->id_client;
        $client->save();

        return response()->json('Client has been created!');
    }

    public function update(Request $request,$id_client)
    {
        $client = Client::find($id_client);

        $client->nom_client                 = $request->input('nom_client');
        $client->image_client               = $request->input('image_client');
        $client->adresse_client             = $request->input('adresse_client');
        $client->willaya_client             = $request->input('willaya_client');
        $client->commune_client             = $request->input('commune_client');
            
        $client->telephone_client           = $request->input('telephone_client');
        $client->email_client               = $request->input('email_client');
        $client->category_client            = $request->input('category_client');

        $client->position_fiscal_client	    = $request->input('position_fiscal_client');
        $client->n_serie_client	            = $request->input('n_serie_client');
        $client->nbr_employe_client	        = $request->input('nbr_employe_client');
        $client->chiffre_affaire_client     = $request->input('chiffre_affaire_client');

        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/clients'), $fileName);
        $client->image_client           =   $fileName;

        $client->save();

        return response()->json('Client has been updated!');
    }

    public function delete($id_client)
    {
        $client = Client::find($id_client);
        $client->delete();

        return "client has been deleted";
    }
}
