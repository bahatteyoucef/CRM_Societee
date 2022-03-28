<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un fournisseur</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editFournisseur">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom_fournisseur" v-model="fournisseur.nom_fournisseur"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Chiffre d'affaire</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="chiffre_affaire_fournisseur" v-model="fournisseur.chiffre_affaire_fournisseur" />
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
                                            <input type="text" class="form-control" name="telephone_fournisseur" v-model="fournisseur.telephone_fournisseur" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Mail</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email_fournisseur" v-model="fournisseur.email_fournisseur" />
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
                                            <select name="category_fournisseur" v-model="fournisseur.category_fournisseur" class="form-control">
                                                <option v-for="category_societe in category_societes" :key="category_societe.id_category_societe" :value="category_societe.id_category_societe">{{ category_societe.libelle_category_societe }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Position fiscal</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="position_fiscal_fournisseur" v-model="fournisseur.position_fiscal_fournisseur" >
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
                                            <input type="text" class="form-control" name="n_serie_fournisseur" v-model="fournisseur.n_serie_fournisseur" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre des employes</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nbr_employe_fournisseur" v-model="fournisseur.nbr_employe_fournisseur" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="form-group">
                                <label>File upload</label>
                                
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control" v-on:change="imageFournisseurChange" placeholder="Upload Image" name="image_fournisseur" ref="image_fournisseur" id="image_fournisseur">
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
                                            <input type="text" class="form-control" name="adresse_fournisseur" v-model="fournisseur.adresse_fournisseur" />
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
                                            <select class="form-control" name="willaya_fournisseur" v-on:change="getCommunes" v-model="fournisseur.willaya_fournisseur">
                                                <option v-for="willaya in willayas" :key="willaya.id_willaya" :value="willaya.id_willaya">{{ willaya.libelle_willaya }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Commune</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="commune_fournisseur" v-model="fournisseur.commune_fournisseur">
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
            fournisseur          :   {

                nom_fournisseur      : '',
                image_fournisseur    : '',
                adresse_fournisseur  : '',
                willaya_fournisseur  : '',
                commune_fournisseur  : '',
                
                reference_fournisseur    : '',
                telephone_fournisseur    : '',
                email_fournisseur        : '',
                category_fournisseur     : '',

                position_fiscal_fournisseur	: '',
                n_serie_fournisseur	        : '',
                nbr_employe_fournisseur	    : '',
                chiffre_affaire_fournisseur  : ''
            },

            willayas            : '',
            communes            : '',
            category_societes   : ''
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.fournisseurShow();
        });
    },

    methods: {

        async fournisseurShow()
        {
            this.getValues()

            const res   = await this.callApi('post' ,   '/fournisseurs/'+this.$route.params.id_fournisseur+'/show'    ,   null)

            this.fournisseur.nom_fournisseur              =   res.data.nom_fournisseur
            this.fournisseur.image_fournisseur            =   res.data.image_fournisseur
            this.fournisseur.adresse_fournisseur          =   res.data.adresse_fournisseur
            this.fournisseur.willaya_fournisseur          =   res.data.willaya_fournisseur
            this.fournisseur.commune_fournisseur          =   res.data.commune_fournisseur
                
            this.fournisseur.reference_fournisseur        =   res.data.reference_fournisseur
            this.fournisseur.telephone_fournisseur        =   res.data.telephone_fournisseur
            this.fournisseur.email_fournisseur            =   res.data.email_fournisseur
            this.fournisseur.category_fournisseur         =   res.data.category_fournisseur

            this.fournisseur.position_fiscal_fournisseur	=   res.data.position_fiscal_fournisseur
            this.fournisseur.n_serie_fournisseur	        =   res.data.n_serie_fournisseur
            this.fournisseur.nbr_employe_fournisseur	    =   res.data.nbr_employe_fournisseur
            this.fournisseur.chiffre_affaire_fournisseur    =   res.data.chiffre_affaire_fournisseur
        },

        async editFournisseur()
        {   
            let formData = new FormData();
            
            formData.append('file'                              , this.fournisseur.image_fournisseur);
            formData.append("nom_fournisseur"                   , this.fournisseur.nom_fournisseur)
            formData.append('adresse_fournisseur'               , this.fournisseur.adresse_fournisseur)
            formData.append("willaya_fournisseur"               , this.fournisseur.willaya_fournisseur)
            formData.append('commune_fournisseur'               , this.fournisseur.commune_fournisseur);
            formData.append("reference_fournisseur"             , this.fournisseur.reference_fournisseur)
            formData.append('telephone_fournisseur'             , this.fournisseur.telephone_fournisseur)
            formData.append("email_fournisseur"                 , this.fournisseur.email_fournisseur)
            formData.append('category_fournisseur'              , this.fournisseur.category_fournisseur)
            formData.append("position_fiscal_fournisseur"       , this.fournisseur.position_fiscal_fournisseur)
            formData.append('n_serie_fournisseur'               , this.fournisseur.n_serie_fournisseur)
            formData.append("nbr_employe_fournisseur"           , this.fournisseur.nbr_employe_fournisseur)
            formData.append('chiffre_affaire_fournisseur'       , this.fournisseur.chiffre_affaire_fournisseur)

            const res   = await this.callApi('post' ,   '/fournisseurs/'+this.$route.params.id_fournisseur+'/update'    ,   formData)

            if(res.status===201){
				console.log(res)
			}else{
				console.log(res)
			}

            this.$router.push('/fournisseurs');
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
            const res_2         = await this.callApi('post' ,   '/willayas/'+this.fournisseur.willaya_fournisseur+'/communes'             ,   null)
            this.communes       =   res_2.data
        },

        triggerFileUpload(){
            this.$refs.image_fournisseur.click()
        },

        imageFournisseurChange(e){
            this.fournisseur.image_fournisseur    =   e.target.files[0];
        }
    },

};
</script>
