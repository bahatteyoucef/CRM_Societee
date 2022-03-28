<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un plan</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createPlan">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="plan.nom"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Type Audit</label>
                                        <div class="col-sm-9">
                                            <select name="id_fournisseur" v-model="plan.id_type_audit" class="form-control" ref="id_type_audit">
                                                <option v-for="type_audit in list_type_audit" :key="type_audit.id" :value="type_audit.id">{{ type_audit.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Debut</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date_debut" v-model="plan.date_debut"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Fin</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date_fin" v-model="plan.date_fin" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Societe</label>
                                        <div class="col-sm-9">
                                            <select name="id_societee" v-model="plan.id_societee" class="form-control" ref="id_societee">
                                                <option v-for="societee in list_societee" :key="societee.id" :value="societee.id">{{ societee.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-12">
                                            <textarea type="text" class="form-control" name="desc" v-model="plan.desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                        
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createPlan()">Submit</button>
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
            plan          :   {
                nom             :   '',
                date_debut      :   '',
                date_fin        :   '',
                id_type_audit   :   '',
                id_societee     :   '',
                desc            :   ''
            },

            list_type_audit :   '',
            list_societee   :   ''
        };
    },

    mounted()
    {
        this.getValues()
    },

    methods: {
        async createPlan()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.plan.nom)
            formData.append('id_type_audit'         , this.plan.id_type_audit)
            formData.append('id_societee'           , this.plan.id_societee)
            formData.append('date_debut'            , this.plan.date_debut)
            formData.append("date_fin"              , this.plan.date_fin)

            formData.append("desc"                  , this.plan.desc)

            const res   = await this.callApi('post' ,   '/plans/store'    ,   formData)         
            console.log(res.data)
            
            if(res.status===200){
                this.feedbackSuccess("Plan has been added !"     ,   "a new plan has been added")
                this.$router.push('/plans');
			}
            
            else{
                this.showErrors("Plan has not been added !", res.data.errors)
			}
        },

        async getValues() {

            const res_5                     =   await this.callApi('post' ,   '/type_audit/combobox'             ,   null)
            const res_4                     =   await this.callApi('post' ,   '/societees/combobox'               ,   null)

            this.list_societee              =   res_4.data
            this.list_type_audit            =   res_5.data

        },
    },

};
</script>
