<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modifier un produit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editProduit">
                            
                            <p class="card-description"> Produit info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="code_prd_srv" v-model="produit.code_prd_srv"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Libelle</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="libelle_prd_srv" v-model="produit.libelle_prd_srv" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="id_category_prd_srv" v-on:change="hideShowAchat" v-model="produit.id_category_prd_srv" class="form-control">
                                                <option v-for="category in category_produit_services" :key="category.id_category_prd_srv" :value="category.id_category_prd_srv">{{ category.libelle_category_prd_srv }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Quantite disponible</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="quantite_disponible_prd_srv" v-model="produit.quantite_disponible_prd_srv"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Type Produit</label>
                                        <div class="col-sm-9">
                                            <select name="id_type_prd_srv" v-model="produit.id_type_prd_srv" class="form-control">
                                                <option v-for="type in type_produit_services" :key="type.id_type_prd_srv" :value="type.id_type_prd_srv">{{ type.libelle_type_prd_srv }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Famille comptable</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_famille_cmpt" v-model="produit.id_famille_cmpt" >
                                                <option v-for="famille in famille_comptables" :key="famille.id_famille_cmpt" :value="famille.id_famille_cmpt">{{ famille.libelle_famille_cmpt }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="form-group">
                                <label>Image</label>
                                
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control" v-on:change="imageProduitChange" placeholder="Upload Image" name="image_prd_srv" ref="image_prd_srv" id="image_prd_srv">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button" v-on:click="triggerFileUpload">Upload</button>
                                    </span>
                                </div>
                                
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12">Description Produit</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="description_prd_srv" v-model="produit.description_prd_srv"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div v-if="achat">

                                <p class="card-description"> Achat </p>

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
                                                <select name="id_contact_fournisseur" v-model="produit.id_contact_fournisseur" class="form-control" ref="id_contact_fournisseur">
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
                                            <label class="col-sm-3 col-form-label">Prix achat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="prix_achat_prd_srv" ref="prix_achat_prd_srv" v-model="produit.prix_achat_prd_srv" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Unite achat</label>
                                            <div class="col-sm-9">
                                                <select name="unite_achat_prd_srv" v-model="produit.unite_achat_prd_srv" class="form-control" ref="unite_achat_prd_srv">
                                                    <option v-for="unite_vente_achat in unite_vente_achats" :key="unite_vente_achat.id_unite_vente_achat" :value="unite_vente_achat.id_unite_vente_achat">{{ unite_vente_achat.libelle_unite_vente_achat }} </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr />

                            </div>

                            <p class="card-description"> Vente </p>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Prix vente</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="prix_vente_prd_srv" v-model="produit.prix_vente_prd_srv" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Unite vente</label>
                                        <div class="col-sm-9">
                                            <select name="unite_vente_prd_srv" v-model="produit.unite_vente_prd_srv" class="form-control" ref="unite_vente_prd_srv">
                                                <option v-for="unite_vente_achat in unite_vente_achats" :key="unite_vente_achat.id_unite_vente_achat" :value="unite_vente_achat.id_unite_vente_achat">{{ unite_vente_achat.libelle_unite_vente_achat }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                      
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="editProduit()">Submit</button>
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
            produit          :   {
													
                id_contact_fournisseur      : '',
                id_famille_cmpt             : '',
                id_category_prd_srv         : '',
                id_type_prd_srv             : '',
                id_societe                  : '',

                image_prd_srv               : null,
                
                code_prd_srv                : '',
                libelle_prd_srv             : '',
                description_prd_srv         : '',
                
                prix_vente_prd_srv	        : '',
                unite_vente_prd_srv	        : '',
                prix_achat_prd_srv	        : '',
                unite_achat_prd_srv         : '',

                quantite_disponible_prd_srv : ''
            },

            category_produit_services       : '',
            contact_fournisseurs            : '',
            fournisseurs                    : '',
            famille_comptables              : '',
            type_produit_services           : '',
            unite_vente_achats              : '',

            id_fournisseur_selectionne      : '',

            achat                           : true

        };
    },

    mounted(){
        this.$nextTick(function () {
            this.produitShow();
        });
    },

    methods: {

        async produitShow()
        {
            this.getValues()

            const res   = await this.callApi('post' ,   '/produits/'+this.$route.params.id_prd_srv+'/show'    ,   null)
            console.log(res.data)

            this.id_fournisseur_selectionne             =   res.data.id_fournisseur
            this.produit.id_contact_fournisseur         =   res.data.id_contact_fournisseur
            this.produit.id_famille_cmpt                =   res.data.id_famille_cmpt
            this.produit.id_category_prd_srv            =   res.data.id_category_prd_srv
            this.produit.id_type_prd_srv                =   res.data.id_type_prd_srv
            this.produit.id_societe                     =   res.data.id_societe
                
            this.produit.code_prd_srv                   =   res.data.code_prd_srv

            this.produit.libelle_prd_srv                =   res.data.libelle_prd_srv
            this.produit.description_prd_srv            =   res.data.description_prd_srv

            this.produit.prix_vente_prd_srv             =   res.data.prix_vente_prd_srv
            this.produit.unite_vente_prd_srv            =   res.data.unite_vente_prd_srv
            this.produit.prix_achat_prd_srv	            =   res.data.prix_achat_prd_srv
            this.produit.unite_achat_prd_srv	        =   res.data.unite_achat_prd_srv

            this.produit.quantite_disponible_prd_srv    =   res.data.quantite_disponible_prd_srv
        },

        async editProduit()
        {   
            let formData = new FormData();
            
            formData.append('file'                      , this.produit.image_prd_srv)
            formData.append("id_contact_fournisseur"    , this.produit.id_contact_fournisseur)
            formData.append('id_famille_cmpt'           , this.produit.id_famille_cmpt)
            formData.append("id_category_prd_srv"       , this.produit.id_category_prd_srv)
            formData.append('id_type_prd_srv'           , this.produit.id_type_prd_srv);
            formData.append("id_societe"                , this.produit.id_societe)
            formData.append('code_prd_srv'              , this.produit.code_prd_srv)
            formData.append("libelle_prd_srv"           , this.produit.libelle_prd_srv)
            formData.append('description_prd_srv'       , this.produit.description_prd_srv)
            formData.append("prix_vente_prd_srv"        , this.produit.prix_vente_prd_srv)
            formData.append('unite_vente_prd_srv'       , this.produit.unite_vente_prd_srv)
            formData.append("prix_achat_prd_srv"        , this.produit.prix_achat_prd_srv)
            formData.append('unite_achat_prd_srv'       , this.produit.unite_achat_prd_srv)
            formData.append("quantite_disponible_prd_srv", this.produit.quantite_disponible_prd_srv)

            const res   = await this.callApi('post' ,   '/produits/'+this.$route.params.id_prd_srv+'/update'    ,   formData)
            console.log(res.data)

            if(res.status===201){

            }else{
			
            }

            this.$router.push('/produits/achat');
        },

        async getValues() {

            const res_1     =   await this.callApi('post' ,   '/category_produit_services'      ,   null)
            const res_2     =   await this.callApi('post' ,   '/fournisseurs'                   ,   null)
            const res_3     =   await this.callApi('post' ,   '/famille_comptables'             ,   null)
            const res_4     =   await this.callApi('post' ,   '/type_produit_services'          ,   null)
            const res_5     =   await this.callApi('post' ,   '/unite_vente_achat'              ,   null)

            this.category_produit_services      =   res_1.data
            this.fournisseurs                   =   res_2.data
            this.famille_comptables             =   res_3.data
            this.type_produit_services          =   res_4.data
            this.unite_vente_achats             =   res_5.data

            this.getContactFournisseur()
        },

        async getContactFournisseur() {
            const res_6                     =   await this.callApi('post' ,   '/fournisseurs/'+this.id_fournisseur_selectionne+'/contact_fournisseurs'             ,   null)
            this.contact_fournisseurs       =   res_6.data
        },

        hideShowAchat() {

            if(this.produit.id_category_prd_srv   ==  1)
            {
                this.achat  =   true
            }

            if(this.produit.id_category_prd_srv   ==  2)
            {
                this.unite_achat_prd_srv            =   ""
                this.prix_achat_prd_srv             =   ""
                this.id_contact_fournisseur         =   ""
                this.id_fournisseur_selectionne     =   ""

                this.achat  =   false
            }
        },

        triggerFileUpload()
        {
            this.$refs.image_prd_srv.click()
        },

        imageProduitChange(e)
        {
            this.produit.image_prd_srv    =   e.target.files[0];
        }
    },

};
</script>
