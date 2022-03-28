<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un contact fournisseur</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createContactFournisseur">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom_contact_fournisseur" v-model="contact_fournisseur.nom_contact_fournisseur" />
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Prenom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="prenom_contact_fournisseur" v-model="contact_fournisseur.prenom_contact_fournisseur"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telephone1</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tel1_contact_fournisseur" v-model="contact_fournisseur.tel1_contact_fournisseur" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telephone2</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tel2_contact_fournisseur" v-model="contact_fournisseur.tel2_contact_fournisseur" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email_contact_fournisseur" v-model="contact_fournisseur.email_contact_fournisseur" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Societe</label>
                                        <div class="col-sm-9">
                                            <select name="id_societe_fournisseur" v-model="contact_fournisseur.id_societe_fournisseur" class="form-control">
                                                <option value="1">Societe1</option>
                                                <option value="2">Societe2</option>
                                                <option value="3">Societe3</option>
                                                <option value="4">Societe4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Fonction</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="fonction_contact_fournisseur" v-model="contact_fournisseur.fonction_contact_fournisseur">
                                                <option v-for="fonction in fonctions" :key="fonction.id_fonction" :value="fonction.id_fonction">{{ fonction.libelle_fonction }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="form-group">
                                <label>File upload</label>
                                
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control" v-on:change="imageContactFournisseurChange" placeholder="Upload Image" name="image_contact_fournisseur" ref="image_contact_fournisseur" id="image_contact_fournisseur">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button" v-on:click="triggerFileUpload">Upload</button>
                                    </span>
                                </div>
                                
                            </div>

                            <hr />

                            <p class="card-description"> Address </p>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Adresse</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="adresse_contact_fournisseur" v-model="contact_fournisseur.adresse_contact_fournisseur" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Willaya</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="willaya_contact_fournisseur" v-on:change="getCommunes" v-model="contact_fournisseur.willaya_contact_fournisseur">
                                                <option v-for="willaya in willayas" :key="willaya.id_willaya" :value="willaya.id_willaya">{{ willaya.libelle_willaya }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Commune</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="commune_contact_fournisseur" v-model="contact_fournisseur.commune_contact_fournisseur">
                                                <option v-for="commune in communes" :key="commune.id_commune" :value="commune.id_commune">{{ commune.libelle_commune }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr/>
                        
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createfournisseur()">Submit</button>
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
            contact_fournisseur      :   {

                id_societe_fournisseur      : '',
                image_contact_fournisseur   : '',
                
                nom_contact_fournisseur      : '',
                prenom_contact_fournisseur   : '',
                
                tel1_contact_fournisseur     : '',
                tel2_contact_fournisseur     : '',

                email_contact_fournisseur    : '',
                
                adresse_contact_fournisseur  : '',
                commune_contact_fournisseur  : '',
                willaya_contact_fournisseur  : '',

                fonction_contact_fournisseur : ''
            },
            
            willayas            : '',
            communes            : '',
            fonctions           : ''
        };
    },
    
    mounted()
    {
        this.$nextTick(function () {
            this.getValues();
        });
    },

    methods: {
        async createContactFournisseur()
        {   
            let formData = new FormData();
            
            formData.append('file'                              , this.contact_fournisseur.image_contact_fournisseur);
            formData.append("id_societe_fournisseur"            , this.contact_fournisseur.id_societe_fournisseur)
            formData.append('nom_contact_fournisseur'           , this.contact_fournisseur.nom_contact_fournisseur)
            formData.append("prenom_contact_fournisseur"        , this.contact_fournisseur.prenom_contact_fournisseur)
            formData.append('tel1_contact_fournisseur'          , this.contact_fournisseur.tel1_contact_fournisseur);
            formData.append("tel2_contact_fournisseur"          , this.contact_fournisseur.tel2_contact_fournisseur)
            formData.append('email_contact_fournisseur'         , this.contact_fournisseur.email_contact_fournisseur)
            formData.append("adresse_contact_fournisseur"       , this.contact_fournisseur.adresse_contact_fournisseur)
            formData.append('commune_contact_fournisseur'       , this.contact_fournisseur.commune_contact_fournisseur)
            formData.append("willaya_contact_fournisseur"       , this.contact_fournisseur.willaya_contact_fournisseur)
            formData.append('fonction_contact_fournisseur'      , this.contact_fournisseur.fonction_contact_fournisseur)

            const res               =   await this.callApi('post' ,   '/fournisseurs/'+this.contact_fournisseur.id_societe_fournisseur+'/contacts/store'    ,   formData)
            this.contact_fournisseur     =   res.data

            if(res.status===201){
				
			}else{
				
			}

            this.$router.push('/fournisseurs/contacts');
        },

        async getValues(){

            const res_1     = await this.callApi('post' ,   '/willayas'             ,   null)
            const res_3     = await this.callApi('post' ,   '/fonctions'            ,   null)

            this.willayas           =   res_1.data
            this.fonctions          =   res_3.data

            if(res_1.status===201){

			}else{

			}

            if(res_3.status===201){

			}else{

			}
        },

        async getCommunes(){
            const res_2         = await this.callApi('post' ,   '/willayas/'+this.contact_fournisseur.willaya_contact_fournisseur+'/communes'             ,   null)
            this.communes       =   res_2.data
        },

        triggerFileUpload(){
            this.$refs.image_contact_fournisseur.click()
        },

        imageContactFournisseurChange(e){
            this.contact_fournisseur.image_contact_fournisseur    =   e.target.files[0];
        }
    },

};
</script>
