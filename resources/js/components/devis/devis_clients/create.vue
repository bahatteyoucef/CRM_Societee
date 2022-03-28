<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un devis de vente</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createDevisClient">
                            
                            <p class="card-description"> Devis info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Fournisseur</label>
                                        <div class="col-sm-9">
                                            <select name="id_fournisseur" v-on:change="getContactFournisseur" v-model="id_fournisseur_selectionne" class="form-control" ref="id_fournisseur">
                                                <option v-for="fournisseur in fournisseurs" :key="fournisseur.id_fournisseur" :value="fournisseur.id_fournisseur">{{ fournisseur.nom_fournisseur }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Contact Fournisseur</label>
                                        <div class="col-sm-9">
                                            <select name="id_contact_fournisseur" v-model="devis_client.id_contact_fournisseur" class="form-control" ref="id_contact_fournisseur">
                                                <option v-for="contact_fournisseur in contact_fournisseurs" :key="contact_fournisseur.id_contact_fournisseur" :value="contact_fournisseur.id_contact_fournisseur">{{ contact_fournisseur.nom_contact_fournisseur }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Adresse Facturation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="code_prd_srv" v-model="devis_client.code_prd_srv"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Adresse Livraison</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="libelle_prd_srv" v-model="devis_client.libelle_prd_srv" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Creation</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date_creation_devis_client" v-model="devis_client.date_creation_devis_client"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Annulation</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date_annulation_devis_client" v-model="devis_client.date_annulation_devis_client"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12">Commentaire</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="commentaire_devis_client" v-model="devis_client.commentaire_devis_client"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createDevisClient()">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            devis_client          :   {	
                id_contact_fournisseur      : '',
                id_contact_client           : '',
                
                adresse_facturation         : '',
                adresse_livraison           : '',
                
                etat_devis_client	        : '',

                date_creation_devis_client	: '',
                date_annulation_devis_client: '',

                commentaire_devis_client    : ''
            },

            contact_fournisseurs            : '',
            fournisseurs                    : '',
            id_fournisseur_selectionne      : '',
        };
    },

    mounted()
    {
        this.$nextTick(function () {
            this.getValues();
        });
    },

    methods: {
        async createDevisClient() {
            const res   =   await this.callApi('post',   '/clients/devis/store',   this.devis_client)
            console.log(res.data.message)
            this.$router.push('/clients/devis');
        },

        async getValues() {
            const res_1             =   await this.callApi('post' ,   '/fournisseurs'      ,   null)
            this.fournisseurs       =   res_1.data
        },

        async getContactFournisseur() {
            const res_6                     =   await this.callApi('post' ,   '/fournisseurs/'+this.id_fournisseur_selectionne+'/contact_fournisseurs'             ,   null)
            this.contact_fournisseurs       =   res_6.data
        },

    },

};
</script>
