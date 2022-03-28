<?php

use App\Http\Controllers\ActionAuditController;
use App\Http\Controllers\AuditeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LogoutController;

//Willaya
use App\Http\Controllers\WillayaController;

//Commune
use App\Http\Controllers\CommuneController;

//Category_Societe
use App\Http\Controllers\CategorySocieteeController;

//CategoryProduitService
use App\Http\Controllers\CategoryProduitServiceController;

//TypeProduitServiceController
use App\Http\Controllers\TypeProduitServiceController;

//UniteVenteAchatController
use App\Http\Controllers\UniteVenteAchatController;

//Famille Comptable
use App\Http\Controllers\FamilleComptableController;

//Client Fournisseur
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ContactClientController;
use App\Http\Controllers\ContactFournisseurController;
use App\Http\Controllers\FonctionController;

//Produit
use App\Http\Controllers\ProduitServiceController;

//Devis
use App\Http\Controllers\DevisClientController;

//Plan
use App\Http\Controllers\PlanController;

//Process
use App\Http\Controllers\ProcessController;

//Type Process
use App\Http\Controllers\TypeProcessController;

//Champ Audit
use App\Http\Controllers\ChampAuditController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SocieteeController;
use App\Http\Controllers\TypeAuditController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\AuditeurController;
use App\Http\Controllers\ConstatController;
use App\Http\Controllers\ElementProcessController;
use App\Http\Controllers\EtatAuditController;
use App\Http\Controllers\EvaluationAuditController;

use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('logout'                                                                     ,   [LogoutController::class,'logout_user'])->name('logout');

Route::get('/'                                                                          ,   function()      {   return view('welcome'); });
Route::get('home'                                                                       ,   function()      {   return redirect('/');   });

//Willayas 
Route::post('/willayas'                                                                 ,   [WillayaController::class           ,'index']);

//Communes
Route::post('/communes'                                                                 ,   [CommuneController::class           ,'index']);
Route::post('/willayas/{id_willaya}/communes'                                           ,   [CommuneController::class           ,'willayaCommunes']);

//Category Societes
Route::post('/category_societes'                                                        ,   [CategorySocieteeController::class   ,'index']);

//Category Produit Service 
Route::post('/category_produit_services'                                                ,   [CategoryProduitServiceController::class        ,'index']);

//Fournisseur 
Route::post('/fournisseurs'                                                             ,   [FournisseurController::class                   ,'index']);

//Famille Comptable 
Route::post('/famille_comptables'                                                       ,   [FamilleComptableController::class              ,'index']);

//TypeProduit Service 
Route::post('/type_produit_services'                                                    ,   [TypeProduitServiceController::class            ,'index']);

//Unite Vente Achat
Route::post('/unite_vente_achat'                                                        ,   [UniteVenteAchatController::class            ,'index']);


//Contact Fournisseur
Route::post('/fournisseurs/{id_fournisseur}/contact_fournisseurs'                       ,   [ContactFournisseurController::class,'fournisseurContact']);

//Clients
Route::post('/clients'                                                                  ,   [ClientController::class,'index']);
Route::post('/clients/{id_client}/show'                                                 ,   [ClientController::class,'show']);
Route::post('/clients/store'                                                            ,   [ClientController::class,'store']);
Route::post('/clients/{id_client}/update'                                               ,   [ClientController::class,'update']);
Route::post('/clients/{id_client}/delete'                                               ,   [ClientController::class,'delete']);

//Fournisseurs
Route::post('/fournisseurs'                                                             ,   [FournisseurController::class,'index']);
Route::post('/fournisseurs/{id_fournisseur}/show'                                       ,   [FournisseurController::class,'show']);
Route::post('/fournisseurs/store'                                                       ,   [FournisseurController::class,'store']);
Route::post('/fournisseurs/{id_fournisseur}/update'                                     ,   [FournisseurController::class,'update']);
Route::post('/fournisseurs/{id_fournisseur}/delete'                                     ,   [FournisseurController::class,'delete']);

//Contact Clients
Route::post('/clients/contacts'                                                         ,   [ContactClientController::class,'index']);
Route::post('/clients/{id_client}/contacts/{id_contact_client}/show'                    ,   [ContactClientController::class,'show']);
Route::post('/clients/{id_client}/contacts/store'                                       ,   [ContactClientController::class,'store']);
Route::post('/clients/{id_client}/contacts/{id_contact_client}/update'                  ,   [ContactClientController::class,'update']);
Route::post('/clients/{id_client}/contacts/{id_contact_client}/delete'                  ,   [ContactClientController::class,'delete']);

//Contact Fournisseurs
Route::post('/fournisseurs/contacts'                                                    ,   [ContactFournisseurController::class,'index']);
Route::post('/fournisseurs/{id_fournisseur}/contacts/{id_contact_fournisseur}/show'     ,   [ContactFournisseurController::class,'show']);
Route::post('/fournisseurs/{id_fournisseur}/contacts/store'                             ,   [ContactFournisseurController::class,'store']);
Route::post('/fournisseurs/{id_fournisseur}/contacts/{id_contact_fournisseur}/update'   ,   [ContactFournisseurController::class,'update']);
Route::post('/fournisseurs/{id_fournisseur}/contacts/{id_contact_fournisseur}/delete'   ,   [ContactFournisseurController::class,'delete']);

///

//Produits Achat
Route::post('/produits/achat'                                                           ,   [ProduitServiceController::class,'indexAchat']);

//Produits Production
Route::post('/produits/production'                                                      ,   [ProduitServiceController::class,'indexProduction']);

//Produits Vente
Route::post('/produits/vente'                                                           ,   [ProduitServiceController::class,'indexGlobal']);

//Produits CRUD
Route::post('/produits/{id_prd_srv}/show'                                               ,   [ProduitServiceController::class,'show']);
Route::post('/produits/store'                                                           ,   [ProduitServiceController::class,'store']);
Route::post('/produits/{id_prd_srv}/update'                                             ,   [ProduitServiceController::class,'update']);
Route::post('/produits/{id_prd_srv}/delete'                                             ,   [ProduitServiceController::class,'delete']);

///

//Devis Client
Route::post('/clients/devis'                                                            ,   [DevisClientController::class,'index']);
Route::post('/clients/devis/store'                                                      ,   [DevisClientController::class,'store']);
///

//Plans
Route::post('/plans'                                                                    ,   [PlanController::class,'index']);
Route::post('/plans/combobox'                                                           ,   [PlanController::class,'combobox']);
Route::post('/plans/{id}/show'                                                          ,   [PlanController::class,'show']);
Route::post('/plans/store'                                                              ,   [PlanController::class,'store']);
Route::post('/plans/{id}/update'                                                        ,   [PlanController::class,'update']);
Route::post('/plans/{id}/delete'                                                        ,   [PlanController::class,'delete']);

//Process
Route::post('/process'                                                                  ,   [ProcessController::class,'index']);
Route::post('/process/combobox'                                                         ,   [ProcessController::class,'combobox']);
Route::post('/process/{id}/show'                                                        ,   [ProcessController::class,'show']);
Route::post('/process/store'                                                            ,   [ProcessController::class,'store']);
Route::post('/process/{id}/update'                                                      ,   [ProcessController::class,'update']);
Route::post('/process/{id}/delete'                                                      ,   [ProcessController::class,'delete']);

//Programs
Route::post('/programs'                                                                 ,   [ProgramController::class,'index']);
Route::post('/programs/combobox'                                                        ,   [ProgramController::class,'combobox']);
Route::post('/programs/{id}/show'                                                       ,   [ProgramController::class,'show']);
Route::post('/programs/store'                                                           ,   [ProgramController::class,'store']);
Route::post('/programs/{id}/update'                                                     ,   [ProgramController::class,'update']);
Route::post('/programs/{id}/delete'                                                     ,   [ProgramController::class,'delete']);

//Type Process
Route::post('/type_process'                                                             ,   [TypeProcessController::class,'index']);
Route::post('/type_process/combobox'                                                    ,   [TypeProcessController::class,'combobox']);
Route::post('/type_process/{id}/show'                                                   ,   [TypeProcessController::class,'show']);
Route::post('/type_process/store'                                                       ,   [TypeProcessController::class,'store']);
Route::post('/type_process/{id}/update'                                                 ,   [TypeProcessController::class,'update']);
Route::post('/type_process/{id}/delete'                                                 ,   [TypeProcessController::class,'delete']);

//Element Process
Route::post('/element_process'                                                          ,   [ElementProcessController::class,'index']);
Route::post('/element_process/combobox'                                                 ,   [ElementProcessController::class,'combobox']);
Route::post('/element_process/{id}/show'                                                ,   [ElementProcessController::class,'show']);
Route::post('/element_process/store'                                                    ,   [ElementProcessController::class,'store']);
Route::post('/element_process/{id}/update'                                              ,   [ElementProcessController::class,'update']);
Route::post('/element_process/{id}/delete'                                              ,   [ElementProcessController::class,'delete']);

//Etat Audit
Route::post('/etat_audit'                                                               ,   [EtatAuditController::class,'index']);
Route::post('/etat_audit/combobox'                                                      ,   [EtatAuditController::class,'combobox']);
Route::post('/etat_audit/{id}/show'                                                     ,   [EtatAuditController::class,'show']);
Route::post('/etat_audit/store'                                                         ,   [EtatAuditController::class,'store']);
Route::post('/etat_audit/{id}/update'                                                   ,   [EtatAuditController::class,'update']);
Route::post('/etat_audit/{id}/delete'                                                   ,   [EtatAuditController::class,'delete']);

//Champ Audit
Route::post('/champ_audit'                                                              ,   [ChampAuditController::class,'index']);
Route::post('/champ_audit/combobox'                                                     ,   [ChampAuditController::class,'combobox']);
Route::post('/champ_audit/{id}/show'                                                    ,   [ChampAuditController::class,'show']);
Route::post('/champ_audit/store'                                                        ,   [ChampAuditController::class,'store']);
Route::post('/champ_audit/{id}/update'                                                  ,   [ChampAuditController::class,'update']);
Route::post('/champ_audit/{id}/delete'                                                  ,   [ChampAuditController::class,'delete']);

//Champ Audit
Route::post('/evaluation_audit'                                                              ,   [EvaluationAuditController::class,'index']);
Route::post('/evaluation_audit/combobox'                                                     ,   [EvaluationAuditController::class,'combobox']);
Route::post('/evaluation_audit/{id}/show'                                                    ,   [EvaluationAuditController::class,'show']);
Route::post('/evaluation_audit/store'                                                        ,   [EvaluationAuditController::class,'store']);
Route::post('/evaluation_audit/{id}/update'                                                  ,   [EvaluationAuditController::class,'update']);
Route::post('/evaluation_audit/{id}/delete'                                                  ,   [EvaluationAuditController::class,'delete']);

//Auditees
Route::post('/auditees'                                                                 ,   [AuditeeController::class,'index']);
Route::post('/auditees/combobox'                                                        ,   [AuditeeController::class,'combobox']);
Route::post('/auditees/{id}/show'                                                       ,   [AuditeeController::class,'show']);
Route::post('/auditees/store'                                                           ,   [AuditeeController::class,'store']);
Route::post('/auditees/{id}/update'                                                     ,   [AuditeeController::class,'update']);
Route::post('/auditees/{id}/delete'                                                     ,   [AuditeeController::class,'delete']);

//Auditeurs
Route::post('/auditeurs'                                                                 ,   [AuditeurController::class,'index']);
Route::post('/auditeurs/combobox'                                                        ,   [AuditeurController::class,'combobox']);
Route::post('/auditeurs/{id}/show'                                                       ,   [AuditeurController::class,'show']);
Route::post('/auditeurs/store'                                                           ,   [AuditeurController::class,'store']);
Route::post('/auditeurs/{id}/update'                                                     ,   [AuditeurController::class,'update']);
Route::post('/auditeurs/{id}/delete'                                                     ,   [AuditeurController::class,'delete']);

//Societees
Route::post('/societees'                                                                 ,   [SocieteeController::class,'index']);
Route::post('/societees/combobox'                                                        ,   [SocieteeController::class,'combobox']);
Route::post('/societees/{id}/show'                                                       ,   [SocieteeController::class,'show']);
Route::post('/societees/store'                                                           ,   [SocieteeController::class,'store']);
Route::post('/societees/{id}/update'                                                     ,   [SocieteeController::class,'update']);
Route::post('/societees/{id}/delete'                                                     ,   [SocieteeController::class,'delete']);

//Type Audit
Route::post('/type_audit'                                                               ,   [TypeAuditController::class,'index']);
Route::post('/type_audit/combobox'                                                      ,   [TypeAuditController::class,'combobox']);
Route::post('/type_audit/{id}/show'                                                     ,   [TypeAuditController::class,'show']);
Route::post('/type_audit/store'                                                         ,   [TypeAuditController::class,'store']);
Route::post('/type_audit/{id}/update'                                                   ,   [TypeAuditController::class,'update']);
Route::post('/type_audit/{id}/delete'                                                   ,   [TypeAuditController::class,'delete']);

//fonctions
Route::post('/fonctions'                                                                ,   [FonctionController::class,'index']);
Route::post('/fonctions/combobox'                                                       ,   [FonctionController::class,'combobox']);
Route::post('/fonctions/{id}/show'                                                      ,   [FonctionController::class,'show']);
Route::post('/fonctions/store'                                                          ,   [FonctionController::class,'store']);
Route::post('/fonctions/{id}/update'                                                    ,   [FonctionController::class,'update']);
Route::post('/fonctions/{id}/delete'                                                    ,   [FonctionController::class,'delete']);

//Structures
Route::post('/structures'                                                               ,   [StructureController::class,'index']);
Route::post('/structures/combobox'                                                      ,   [StructureController::class,'combobox']);
Route::post('/structures/{id}/show'                                                     ,   [StructureController::class,'show']);
Route::post('/structures/store'                                                         ,   [StructureController::class,'store']);
Route::post('/structures/{id}/update'                                                   ,   [StructureController::class,'update']);
Route::post('/structures/{id}/delete'                                                   ,   [StructureController::class,'delete']);
///

//Constats
Route::post('/constats'                                                                 ,   [ConstatController::class,'index']);
Route::post('/constats/combobox'                                                        ,   [ConstatController::class,'combobox']);
Route::post('/constats/{id}/show'                                                       ,   [ConstatController::class,'show']);
Route::post('/constats/store'                                                           ,   [ConstatController::class,'store']);
Route::post('/constats/{id}/update'                                                     ,   [ConstatController::class,'update']);
Route::post('/constats/{id}/delete'                                                     ,   [ConstatController::class,'delete']);
///

//Constats
Route::post('/action_audit'                                                             ,   [ActionAuditController::class,'index']);
Route::post('/action_audit/combobox'                                                    ,   [ActionAuditController::class,'combobox']);
Route::post('/action_audit/{id}/show'                                                   ,   [ActionAuditController::class,'show']);
Route::post('/action_audit/store'                                                       ,   [ActionAuditController::class,'store']);
Route::post('/action_audit/{id}/update'                                                 ,   [ActionAuditController::class,'update']);
Route::post('/action_audit/{id}/delete'                                                 ,   [ActionAuditController::class,'delete']);
///

// Programs
Route::post('/plans/{id}/programs'                                                      ,   [PlanController::class,'planPrograms']);

// Process Element 
Route::post('/process/{id}/element_process'                                             ,   [ProcessController::class,'processElements']);

Route::any('{slug}', function () {
    return view('welcome');
})->where('slug', '.*');

//
