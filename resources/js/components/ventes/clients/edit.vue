<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un client</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editClient">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom_client" v-model="client.nom_client"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Chiffre d'affaire</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="chiffre_affaire_client" v-model="client.chiffre_affaire_client" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="telephone_client" v-model="client.telephone_client" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Mail</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email_client" v-model="client.email_client" />
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
                                            <select name="category_client" v-model="client.category_client" class="form-control">
                                                <option v-for="category_societe in category_societes" :key="category_societe.id_category_societe" :value="category_societe.id_category_societe">{{ category_societe.libelle_category_societe }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Position fiscal</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="position_fiscal_client" v-model="client.position_fiscal_client" >
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">N Serie</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="n_serie_client" v-model="client.n_serie_client" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre des employes</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nbr_employe_client" v-model="client.nbr_employe_client" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="form-group">
                                <label>Image</label>
                                
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control" v-on:change="imageClientChange" placeholder="Upload Image" name="image_client" ref="image_client" id="image_client">
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
                                            <input type="text" class="form-control" name="adresse_client" v-model="client.adresse_client" />
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
                                            <select class="form-control" name="willaya_client" v-on:change="getCommunes" v-model="client.willaya_client">
                                                <option v-for="willaya in willayas" :key="willaya.id_willaya" :value="willaya.id_willaya">{{ willaya.libelle_willaya }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Commune</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="commune_client" v-model="client.commune_client">
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
            client          :   {

                nom_client      : '',
                image_client    : '',
                adresse_client  : '',
                willaya_client  : '',
                commune_client  : '',
                
                reference_client    : '',
                telephone_client    : '',
                email_client        : '',
                category_client     : '',

                position_fiscal_client	: '',
                n_serie_client	        : '',
                nbr_employe_client	    : '',
                chiffre_affaire_client  : ''
            },

            willayas            : '',
            communes            : '',
            category_societes   : ''
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.clientShow();
        });
    },

    methods: {

        async clientShow()
        {
            this.getValues()

            const res   = await this.callApi('post' ,   '/clients/'+this.$route.params.id_client+'/show'    ,   null)

            this.client.nom_client              =   res.data.nom_client
            this.client.image_client            =   res.data.image_client
            this.client.adresse_client          =   res.data.adresse_client
            this.client.willaya_client          =   res.data.willaya_client
            this.client.commune_client          =   res.data.commune_client
                
            this.client.reference_client        =   res.data.reference_client
            this.client.telephone_client        =   res.data.telephone_client
            this.client.email_client            =   res.data.email_client
            this.client.category_client         =   res.data.category_client

            this.client.position_fiscal_client	=   res.data.position_fiscal_client
            this.client.n_serie_client	        =   res.data.n_serie_client
            this.client.nbr_employe_client	    =   res.data.nbr_employe_client
            this.client.chiffre_affaire_client  =   res.data.chiffre_affaire_client
        },

        async editClient()
        {   
            let formData = new FormData();

            formData.append('file'                          , this.client.image_client)

            formData.append("nom_client"                    , this.client.nom_client)
            formData.append('adresse_client'                , this.client.adresse_client)
            formData.append("willaya_client"                , this.client.willaya_client)
            formData.append('commune_client'                , this.client.commune_client);
            
            formData.append("reference_client"              , this.client.reference_client)
            formData.append('telephone_client'              , this.client.telephone_client)
            formData.append("email_client"                  , this.client.email_client)
            
            formData.append('category_client'               , this.client.category_client)
            formData.append("position_fiscal_client"        , this.client.position_fiscal_client)
            formData.append('n_serie_client'                , this.client.n_serie_client)
            formData.append("nbr_employe_client"            , this.client.nbr_employe_client)
            formData.append('chiffre_affaire_client'        , this.client.chiffre_affaire_client)

            const res   = await this.callApi('post' ,   '/clients/'+this.$route.params.id_client+'/update'    ,   formData)

            if(res.status===201){
				console.log(res)
			}else{
				console.log(res)
			}

            this.$router.push('/clients');
        },

        async getValues(){
            const res_1     = await this.callApi('post' ,   '/willayas'             ,   null)
            const res_3     = await this.callApi('post' ,   '/category_societes'    ,   null)

            this.willayas           =   res_1.data
            this.category_societes  =   res_3.data

            this.getCommunes()

            if(res_1.status===201){

			}else{

			}

            if(res_3.status===201){

			}else{

			}
        },

        async getCommunes(){
            console.log(this.client.willaya_client)
            const res_2         = await this.callApi('post' ,   '/willayas/'+this.client.willaya_client+'/communes'             ,   null)
            this.communes       =   res_2.data
        },

        triggerFileUpload()
        {
            this.$refs.image_client.click()
        },

        imageClientChange(e)
        {
            this.client.image_client    =   e.target.files[0];
        }
    },

};
</script>
