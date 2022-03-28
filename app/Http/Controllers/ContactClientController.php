<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ContactClient;

class ContactClientController extends Controller
{
    public function index()
    {
        $contact_clients            =   DB::table('contact_clients')
                                    ->join('willayas'           , 'contact_clients.willaya_contact_client'          , 'willayas.id_willaya')
                                    ->join('communes'           , 'contact_clients.commune_contact_client'          , 'communes.id_commune')
                                    ->join('fonctions'          , 'contact_clients.fonction_contact_client'         , 'fonctions.id_fonction')
                                    ->orderBy('id_contact_client', 'desc')
                                    ->get();

        return $contact_clients;
    }

    public function show($id_client,$id_contact_client)
    {
        return ContactClient::find($id_contact_client);
    }

    public function store($id_client,Request $request)
    {
        $contact_client = new ContactClient([
            'id_societe_client'             => $request->input('id_societe_client'),
            
            'nom_contact_client'            => $request->input('nom_contact_client'),
            'prenom_contact_client'         => $request->input('prenom_contact_client'),
            
            'tel1_contact_client'           => $request->input('tel1_contact_client'),
            'tel2_contact_client'           => $request->input('tel2_contact_client'),

            'email_contact_client'          => $request->input('email_contact_client'),
            
            'adresse_contact_client'        => $request->input('adresse_contact_client'),
            'commune_contact_client'        => $request->input('commune_contact_client'),
            'willaya_contact_client'        => $request->input('willaya_contact_client'),
            
            'fonction_contact_client'       => $request->input('fonction_contact_client'),
        ]);

        $fileName   = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/clients/contact'), $fileName);
        $contact_client->image_contact_client           =   $fileName;
        								
        $contact_client->save();

        return response()->json('Contact client has been created!');
    }

    public function update($id_client,$id_contact_client,Request $request)
    {
        $contact_client = ContactClient::find($id_contact_client);

        $contact_client->id_societe_client              = $request->input('id_societe_client');
        $contact_client->image_contact_client           = $request->input('image_contact_client');
        $contact_client->nom_contact_client             = $request->input('nom_contact_client');
        $contact_client->prenom_contact_client          = $request->input('prenom_contact_client');
        $contact_client->tel1_contact_client            = $request->input('tel1_contact_client');
            
        $contact_client->tel2_contact_client            = $request->input('tel2_contact_client');
        $contact_client->email_contact_client           = $request->input('email_contact_client');
        $contact_client->adresse_contact_client         = $request->input('adresse_contact_client');
        $contact_client->commune_contact_client         = $request->input('commune_contact_client');
        $contact_client->willaya_contact_client         = $request->input('willaya_contact_client');

        $contact_client->fonction_contact_client        = $request->input('fonction_contact_client');

        $fileName   = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/clients/contact'), $fileName);
        $contact_client->image_contact_client           =   $fileName;

        $contact_client->save();

        return response()->json('Client Contact has been updated!');
    }

    public function delete($id_client,$id_contact_client)
    {
        $contact_client = ContactClient::find($id_contact_client);
        $contact_client->delete();

        return "Contact client has been deleted";
    }
}
