<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un contact client</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editContactClient">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom_contact_client" v-model="contact_client.nom_contact_client" />
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Prenom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="prenom_contact_client" v-model="contact_client.prenom_contact_client"/>
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
                                            <input type="text" class="form-control" name="tel1_contact_client" v-model="contact_client.tel1_contact_client" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telephone2</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tel2_contact_client" v-model="contact_client.tel2_contact_client" />
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
                                            <input type="email" class="form-control" name="email_contact_client" v-model="contact_client.email_contact_client" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Societe</label>
                                        <div class="col-sm-9">
                                            <select name="id_societe_client" v-model="contact_client.id_societe_client" class="form-control">
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
                                            <select class="form-control" name="fonction_contact_client" v-model="contact_client.fonction_contact_client">
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
                                    <input type="file" class="form-control" v-on:change="imageContactClientChange" placeholder="Upload Image" name="image_contact_client" ref="image_contact_client" id="image_contact_client">
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
                                            <input type="text" class="form-control" name="adresse_contact_client" v-model="contact_client.adresse_contact_client" />
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
                                            <select class="form-control" name="willaya_contact_client" v-on:change="getCommunes" v-model="contact_client.willaya_contact_client">
                                                <option v-for="willaya in willayas" :key="willaya.id_willaya" :value="willaya.id_willaya">{{ willaya.libelle_willaya }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Commune</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="commune_contact_client" v-model="contact_client.commune_contact_client">
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
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createClient()">Submit</button>
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
            contact_client      :   {

                id_societe_client       : '',
                image_contact_client    : '',

                nom_contact_client      : '',
                prenom_contact_client   : '',
                
                tel1_contact_client     : '',
                tel2_contact_client     : '',

                email_contact_client    : '',
                
                adresse_contact_client  : '',
                commune_contact_client  : '',
                willaya_contact_client  : '',

                fonction_contact_client : ''
            },

            willayas : '',
            communes : '',
            fonctions: '',
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.contactClientShow();
        });
    },

    methods: {

        async contactClientShow()
        {
            this.getValues()

            const res   = await this.callApi('post' ,   '/clients/'+this.$route.params.id_societe_client+'/contacts/'+this.$route.params.id_contact_client+'/show'    ,   null)

            this.contact_client.id_societe_client           =   res.data.id_societe_client

            this.contact_client.nom_contact_client          =   res.data.nom_contact_client
            this.contact_client.prenom_contact_client       =   res.data.prenom_contact_client
            this.contact_client.tel1_contact_client         =   res.data.tel1_contact_client
            this.contact_client.tel2_contact_client         =   res.data.tel2_contact_client
            this.contact_client.email_contact_client        =   res.data.email_contact_client
                
            this.contact_client.adresse_contact_client      =   res.data.adresse_contact_client
            this.contact_client.commune_contact_client      =   res.data.commune_contact_client
            this.contact_client.willaya_contact_client      =   res.data.willaya_contact_client
            this.contact_client.fonction_contact_client     =   res.data.fonction_contact_client
        },

        async editContactClient()
        {   
            let formData = new FormData();
            
            formData.append('file'                          , this.contact_client.image_contact_client)

            formData.append("id_societe_client"             , this.contact_client.id_societe_client)
            formData.append('nom_contact_client'            , this.contact_client.nom_contact_client)
            formData.append("prenom_contact_client"         , this.contact_client.prenom_contact_client)

            formData.append('tel1_contact_client'           , this.contact_client.tel1_contact_client)
            formData.append("tel2_contact_client"           , this.contact_client.tel2_contact_client)
            formData.append('email_contact_client'          , this.contact_client.email_contact_client)

            formData.append("adresse_contact_client"        , this.contact_client.adresse_contact_client)
            formData.append('commune_contact_client'        , this.contact_client.commune_contact_client)
            formData.append("willaya_contact_client"        , this.contact_client.willaya_contact_client)

            formData.append('fonction_contact_client'       , this.contact_client.fonction_contact_client)

            const res   = await this.callApi('post' ,   '/clients/'+this.$route.params.id_societe_client+'/contacts/'+this.$route.params.id_contact_client+'/update'    ,   formData)
            console.log(res)

            if(res.status===201){

			}else{

			}

            this.$router.push('/clients/contacts');
        },
        
        async getValues(){
            const res_1     = await this.callApi('post' ,   '/willayas'             ,   null)
            const res_3     = await this.callApi('post' ,   '/fonctions'            ,   null)

            this.willayas           =   res_1.data
            this.fonctions          =   res_3.data

            this.getCommunes()

            if(res_1.status===201){

			}else{

			}

            if(res_3.status===201){

			}else{

			}
        },

        async getCommunes(){
            const res_2         = await this.callApi('post' ,   '/willayas/'+this.contact_client.willaya_contact_client+'/communes'             ,   null)
            this.communes       =   res_2.data
        },

        triggerFileUpload()
        {
            this.$refs.image_contact_client.click()
        },

        imageContactClientChange(e)
        {
            this.contact_client.image_contact_client    =   e.target.files[0];
        }
    },

};
</script>
