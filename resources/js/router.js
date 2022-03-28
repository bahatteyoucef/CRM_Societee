import Vue      from 'vue'
import Router   from 'vue-router'

import index    from './components/index/index.vue'

//Client Fournisseur

import clients          from './components/ventes/clients/clients'
import clientsCreate    from './components/ventes/clients/create'
import clientsEdit      from './components/ventes/clients/edit'

import fournisseurs          from './components/achats/fournisseurs/fournisseurs'
import fournisseursCreate    from './components/achats/fournisseurs/create'
import fournisseursEdit      from './components/achats/fournisseurs/edit'

import clientsContacts          from './components/ventes/clients/contact_clients/contacts'
import clientsContactsCreate    from './components/ventes/clients/contact_clients/create'
import clientsContactsEdit      from './components/ventes/clients/contact_clients/edit'

import fournisseursContacts          from './components/achats/fournisseurs/contact_fournisseurs/contacts'
import fournisseursContactsCreate    from './components/achats/fournisseurs/contact_fournisseurs/create'
import fournisseursContactsEdit      from './components/achats/fournisseurs/contact_fournisseurs/edit'

///     Plans           ///

import plans                        from './components/audit/plans/plans'
import plansCreate                  from './components/audit/plans/create'
import plansEdit                    from './components/audit/plans/edit'

///     Process           ///

import process                      from './components/audit/process/process'
import processCreate                from './components/audit/process/create'
import processEdit                  from './components/audit/process/edit'

///     Programs           ///

import programs                      from './components/audit/programs/programs'
import programsCreate                from './components/audit/programs/create'
import programsEdit                  from './components/audit/programs/edit'

///     Auditees           ///

import auditees                      from './components/audit/auditees/auditees'
import auditeesCreate                from './components/audit/auditees/create'
import auditeesEdit                  from './components/audit/auditees/edit'

///     Auditees           ///

import auditeurs                      from './components/audit/auditeurs/auditeurs'
import auditeursCreate                from './components/audit/auditeurs/create'
import auditeursEdit                  from './components/audit/auditeurs/edit'

///     Fonctions           ///

import fonctions                      from './components/audit/fonctions/fonctions'
import fonctionsCreate                from './components/audit/fonctions/create'
import fonctionsEdit                  from './components/audit/fonctions/edit'

///     Structures           ///

import structures                      from './components/audit/structures/structures'
import structuresCreate                from './components/audit/structures/create'
import structuresEdit                  from './components/audit/structures/edit'

///     Societee           ///

import societees                      from './components/audit/societees/societees'
import societeesCreate                from './components/audit/societees/create'
import societeesEdit                  from './components/audit/societees/edit'

///     TypeAudit           ///

import typeAudit                      from './components/audit/type_audit/type_audit'
import typeAuditCreate                from './components/audit/type_audit/create'
import typeAuditEdit                  from './components/audit/type_audit/edit'

///     ChampAudit           ///

import champAudit                           from './components/audit/champ_audit/champ_audit'
import champAuditCreate                     from './components/audit/champ_audit/create'
import champAuditEdit                       from './components/audit/champ_audit/edit'

///     Type Process           ///

import typeProcess                          from './components/audit/type_process/type_process'
import typeProcessCreate                    from './components/audit/type_process/create'
import typeProcessEdit                      from './components/audit/type_process/edit'

///     Element Process           ///

import elementProcess                       from './components/audit/element_process/element_process'
import elementProcessCreate                 from './components/audit/element_process/create'
import elementProcessEdit                   from './components/audit/element_process/edit'

///     Evaluation Audit           ///

import evaluationAudit                      from './components/audit/evaluation_audit/evaluation_audit'
import evaluationAuditCreate                from './components/audit/evaluation_audit/create'
import evaluationAuditEdit                  from './components/audit/evaluation_audit/edit'

///     Constats           ///

import constats                             from './components/audit/constats/constats'
import constatsCreate                       from './components/audit/constats/create'
import constatsEdit                         from './components/audit/constats/edit'

///     Action Audit           ///

import actionAudit                          from './components/audit/action_audit/action_audit'
import actionAuditCreate                    from './components/audit/action_audit/create'
import actionAuditEdit                      from './components/audit/action_audit/edit'

///     Produits        ///

import produitServiceAchat                  from './components/produits_services/acheter/produitServiceAchat'
import produitServiceProduction             from './components/produits_services/produire/produitServiceProduction'
import produitServiceVente                  from './components/produits_services/vendre/produitServiceVente'

import produitServiceCreate             from './components/produits_services/create'
import produitServiceEdit               from './components/produits_services/edit'

///     Devis           ///

import devisClients                     from './components/devis/devis_clients/devisClients'
import devisClientsCreate               from './components/devis/devis_clients/create'
import devisClientsEdit                 from './components/devis/devis_clients/edit'

import devisFournisseurs                from './components/devis/devis_fournisseurs/devisFournisseurs'

Vue.use(Router)

const routes = [
    {
        path        :   '/', 
        component   :   index
    },

    //Clients
    {
        path        :   '/clients', 
        component   :   clients
    },
    {
        path        :   '/clients/create',
        component   :   clientsCreate
    },
    {
        path        :   '/clients/:id_client/edit',
        component   :   clientsEdit
    },

    //Fournisseurs
    {
        path        :   '/fournisseurs', 
        component   :   fournisseurs
    },
    {
        path        :   '/fournisseurs/create',
        component   :   fournisseursCreate
    },
    {
        path        :   '/fournisseurs/:id_fournisseur/edit',
        component   :   fournisseursEdit
    },

    //Contact Clients
    {
        path        :   '/clients/contacts', 
        component   :   clientsContacts
    },
    {
        path        :   '/clients/contacts/create',
        component   :   clientsContactsCreate
    },
    {
        path        :   '/clients/:id_societe_client/contacts/:id_contact_client/edit',
        component   :   clientsContactsEdit
    },

    //Contact Fournisseurs
    {
        path        :   '/fournisseurs/contacts', 
        component   :   fournisseursContacts
    },
    {
        path        :   '/fournisseurs/contacts/create',
        component   :   fournisseursContactsCreate
    },
    {
        path        :   '/fournisseurs/:id_societe_fournisseur/contacts/:id_contact_fournisseur/edit',
        component   :   fournisseursContactsEdit
    },

    ///////////////////////// Audit

    //Plan
    {
        path        :   '/plans', 
        component   :   plans
    },

    //Plan Ajout
    {
        path        :   '/plans/create', 
        component   :   plansCreate
    },

    //Plan Edit
    {
        path        :   '/plans/:id/edit', 
        component   :   plansEdit
    },

    ///

    //Process
    {
        path        :   '/process', 
        component   :   process
    },

    //Process Ajout
    {
        path        :   '/process/create', 
        component   :   processCreate
    },

    //Process Edit
    {
        path        :   '/process/:id/edit', 
        component   :   processEdit
    },

    ///

    //Program
    {
        path        :   '/programs', 
        component   :   programs
    },

    //Program Ajout
    {
        path        :   '/programs/create', 
        component   :   programsCreate
    },

    //Program Edit
    {
        path        :   '/programs/:id/edit', 
        component   :   programsEdit
    },

    ///

    //Auditees
    {
        path        :   '/auditees', 
        component   :   auditees
    },

    //Auditees Ajout
    {
        path        :   '/auditees/create', 
        component   :   auditeesCreate
    },

    //Auditees Edit
    {
        path        :   '/auditees/:id/edit', 
        component   :   auditeesEdit
    },

    ///

    //Auditeurs
    {
        path        :   '/auditeurs', 
        component   :   auditeurs
    },

    //Auditeurs Ajout
    {
        path        :   '/auditeurs/create', 
        component   :   auditeursCreate
    },

    //Auditeurs Edit
    {
        path        :   '/auditeurs/:id/edit', 
        component   :   auditeursEdit
    },

    ///
    
    //Fonctions
    {
        path        :   '/fonctions', 
        component   :   fonctions
    },

    //Fonctions Ajout
    {
        path        :   '/fonctions/create', 
        component   :   fonctionsCreate
    },

    //Fonctions Edit
    {
        path        :   '/fonctions/:id/edit', 
        component   :   fonctionsEdit
    },

    ///

    //Structures
    {
        path        :   '/structures', 
        component   :   structures
    },

    //Structures Ajout
    {
        path        :   '/structures/create', 
        component   :   structuresCreate
    },

    //Structures Edit
    {
        path        :   '/structures/:id/edit', 
        component   :   structuresEdit
    },

    ///

    //Societee
    {
        path        :   '/societees', 
        component   :   societees
    },

    //Societee Ajout
    {
        path        :   '/societees/create', 
        component   :   societeesCreate
    },

    //Societee Edit
    {
        path        :   '/societees/:id/edit', 
        component   :   societeesEdit
    },

    ///

    //Type Audit
    {
        path        :   '/type_audit', 
        component   :   typeAudit
    },

    //Type Audit Ajout
    {
        path        :   '/type_audit/create', 
        component   :   typeAuditCreate
    },

    //Type Audit Edit
    {
        path        :   '/type_audit/:id/edit', 
        component   :   typeAuditEdit
    },

    ///

    //Champ Audit
    {
        path        :   '/champ_audit', 
        component   :   champAudit
    },

    //Champ Audit Ajout
    {
        path        :   '/champ_audit/create', 
        component   :   champAuditCreate
    },

    //Champ Audit Edit
    {
        path        :   '/champ_audit/:id/edit', 
        component   :   champAuditEdit
    },

    ///

    //Type Process
    {
        path        :   '/type_process', 
        component   :   typeProcess
    },

    //Type Process Ajout
    {
        path        :   '/type_process/create', 
        component   :   typeProcessCreate
    },

    //Type Process Edit
    {
        path        :   '/type_process/:id/edit', 
        component   :   typeProcessEdit
    },

    ///

    //Element Process
    {
        path        :   '/element_process', 
        component   :   elementProcess
    },

    //Element Process Ajout
    {
        path        :   '/element_process/create', 
        component   :   elementProcessCreate
    },

    //Element Process Edit
    {
        path        :   '/element_process/:id/edit', 
        component   :   elementProcessEdit
    },

    ///

    //Evaluation Audit
    {
        path        :   '/evaluation_audit', 
        component   :   evaluationAudit
    },

    //Evaluation Audit Ajout
    {
        path        :   '/evaluation_audit/create', 
        component   :   evaluationAuditCreate
    },

    //Evaluation Audit Edit
    {
        path        :   '/evaluation_audit/:id/edit', 
        component   :   evaluationAuditEdit
    },


    ///

    //Constat
    {
        path        :   '/constats', 
        component   :   constats
    },

    //Constat Ajout
    {
        path        :   '/constats/create', 
        component   :   constatsCreate
    },

    //Constat Edit
    {
        path        :   '/constats/:id/edit', 
        component   :   constatsEdit
    },

    ///

    //Action Audit
    {
        path        :   '/action_audit', 
        component   :   actionAudit
    },

    //Action Audit Ajout
    {
        path        :   '/action_audit/create', 
        component   :   actionAuditCreate
    },

    //Action Audit Edit
    {
        path        :   '/action_audit/:id/edit', 
        component   :   actionAuditEdit
    },

    ///////////////////////// Produit

    //Produit Achat
    {
        path        :   '/produits/achat', 
        component   :   produitServiceAchat
    },

    //Produit Produire
    {
        path        :   '/produits/production', 
        component   :   produitServiceProduction
    },

    //Produit Vendre
    {
        path        :   '/produits/vente', 
        component   :   produitServiceVente
    },

    //Produit
    {
        path        :   '/produits/create',
        component   :   produitServiceCreate
    },
    {
        path        :   '/produits/:id_prd_srv/edit',
        component   :   produitServiceEdit
    },

    ///////////////////////// Devis

    //Devis Client
    {
        path        :   '/clients/devis',
        component   :   devisClients
    },
    {
        path        :   '/clients/devis/create',
        component   :   devisClientsCreate
    },
    {
        path        :   '/clients/devis/:id_devis_client/edit',
        component   :   devisClientsEdit
    },

    //Devis Fournisseur
    {
        path        :   '/fournisseurs/devis',
        component   :   devisFournisseurs
    },

]

export default new Router ({
    mode : 'history',
    routes
})