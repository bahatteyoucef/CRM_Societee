<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un auditeur</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editAuditeur">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="auditeur.nom"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Prenom</label>
                                        <div class="col-sm-9">
                                            <input type="input" class="form-control" name="prenom" v-model="auditeur.prenom" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Fonction</label>
                                        <div class="col-sm-9">
                                            <select name="id_fonction" v-model="auditeur.id_fonction" class="form-control" ref="id_fonction">
                                                <option v-for="fonction in list_fonctions" :key="fonction.id" :value="fonction.id">{{ fonction.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Structure</label>
                                        <div class="col-sm-9">
                                            <select name="id_structure" v-model="auditeur.id_structure" class="form-control" ref="id_structure">
                                                <option v-for="structure in list_structures" :key="structure.id" :value="structure.id">{{ structure.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Societee</label>
                                        <div class="col-sm-9">
                                            <select name="id_societee" v-model="auditeur.id_societee" class="form-control" ref="id_societee">
                                                <option v-for="societee in list_societees" :key="societee.id" :value="societee.id">{{ societee.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input v-model="auditeur.email" type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                        
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="editAuditeur()">Submit</button>
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
            
            auditeur          :   {
                nom                     : '',
                prenom                  : '',
                email                   : '',
                
                id_fonction             : '',
                id_structure            : '',
                id_societee             : ''
            },

            list_fonctions      : '',
            list_structures     : '',
            list_societees      : ''

        };
    },

    mounted(){
        this.$nextTick(function () {
            this.auditeurShow();
        });
    },

    methods: {

        async auditeurShow()
        {
            this.getValues() 

            const res   = await this.callApi('post' ,   '/auditeurs/'+this.$route.params.id+'/show'    ,   null)

            this.auditeur.nom                       =   res.data.nom
            this.auditeur.prenom                    =   res.data.prenom
            this.auditeur.email                     =   res.data.email

            this.auditeur.id_fonction               =   res.data.id_fonction
            this.auditeur.id_structure              =   res.data.id_structure
            this.auditeur.id_societee               =   res.data.id_societee
        },

        async editAuditeur()
        {   
            let formData = new FormData();

            formData.append("nom"                       , this.auditeur.nom)
            formData.append('prenom'                    , this.auditeur.prenom)
            formData.append('email'                     , this.auditeur.email)
            
            formData.append("id_fonction"               , this.auditeur.id_fonction)
            formData.append('id_structure'              , this.auditeur.id_structure)
            formData.append('id_societee'               , this.auditeur.id_societee)

            const res   = await this.callApi('post' ,   '/auditeurs/'+this.$route.params.id+'/update'    ,   formData)

            if(res.status===200){
                this.feedbackSuccess("Auditeur has been modified !"     ,   "a new auditeur has been modified")
                this.$router.push('/auditeurs');
			}
            
            else{
                this.showErrors("Auditeur has not been modified !", res.data.errors)
			}
        },

        async getValues() {

            const res_1     =   await this.callApi('post' ,   '/fonctions/combobox'                 ,   null)
            const res_2     =   await this.callApi('post' ,   '/structures/combobox'                ,   null)
            const res_3     =   await this.callApi('post' ,   '/societees/combobox'                 ,   null)

            this.list_fonctions                 =   res_1.data
            this.list_structures                =   res_2.data
            this.list_societees                 =   res_3.data

        },

    },

};
</script>
