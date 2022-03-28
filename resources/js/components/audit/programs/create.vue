<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un program</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createProgram">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="program.nom"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Ordre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ordre" v-model="program.ordre" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Debut</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date_debut" v-model="program.date_debut"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Fin</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date_fin" v-model="program.date_fin" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Heure Debut</label>
                                        <div class="col-sm-9">
                                            <input type="time" class="form-control" name="heure_debut" v-model="program.heure_debut"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Heure Fin</label>
                                        <div class="col-sm-9">
                                            <input type="time" class="form-control" name="heure_fin" v-model="program.heure_fin"/>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">
                                
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Process</label>
                                        <div class="col-sm-9">
                                            <select name="id_fournisseur" v-model="program.id_process" class="form-control" ref="id_process">
                                                <option v-for="process in list_process" :key="process.id" :value="process.id">{{ process.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Plan</label>
                                        <div class="col-sm-9">
                                            <select name="id_fournisseur" v-model="program.id_plan" class="form-control" ref="id_plan">
                                                <option v-for="plan in list_plans" :key="plan.id" :value="plan.id">{{ plan.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">
                                
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Auditee</label>
                                        <div class="col-sm-9">
                                            <select name="id_fournisseur" v-model="program.id_auditee" class="form-control" ref="id_auditee">
                                                <option v-for="auditee in list_auditee" :key="auditee.id" :value="auditee.id">{{ auditee.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Societe</label>
                                        <div class="col-sm-9">
                                            <select name="id_fournisseur" v-model="program.id_societee" class="form-control" ref="id_societee">
                                                <option v-for="societe in list_societe" :key="societe.id" :value="societe.id">{{ societe.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">
                                
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Type Audit</label>
                                        <div class="col-sm-9">
                                            <select name="id_fournisseur" v-model="program.id_type_audit" class="form-control" ref="id_type_audit">
                                                <option v-for="type_audit in list_type_audit" :key="type_audit.id" :value="type_audit.id">{{ type_audit.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" v-model="program.description"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createProgram()">Submit</button>
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
            
            program          :   {
                nom         :   '',
                ordre       :   '',

                id_plan        :   '',
                id_process     :   '',

                id_auditeur    :   '',
                id_auditee     :   '',

                id_societee     :   '',
                id_type_audit  :   '',

                date_debut  :   '',
                date_fin    :   '',

                heure_debut :   '',
                heure_fin   :   '',

                description :   '',
            },

            list_plans      : '',
            list_process    : '',
            list_auditee    : '',
            list_societe    : '',
            list_type_audit : '',
            
        };
    },

    mounted()
    {
        this.$nextTick(function () {
            this.getValues();
        });
    },

    methods: {
        async createProgram()
        {   
            let formData = new FormData();

            formData.append("nom"               , this.program.nom)
            formData.append('ordre'             , this.program.ordre)
            formData.append("id_plan"           , this.program.id_plan)
            formData.append('id_process'        , this.program.id_process)
            formData.append("id_auditeur"       , this.program.id_auditeur)
            formData.append('id_auditee'        , this.program.id_auditee)
            formData.append("id_societee"       , this.program.id_societee)
            formData.append('id_type_audit'     , this.program.id_type_audit)
            formData.append("date_debut"        , this.program.date_debut)
            formData.append('date_fin'          , this.program.date_fin)
            formData.append("heure_debut"       , this.program.heure_debut)
            formData.append('heure_fin'         , this.program.heure_fin)
            formData.append('description'       , this.program.description)

            const res   = await this.callApi('post' ,   '/programs/store'    ,   formData)         

            if(res.status===200){
                this.feedbackSuccess("Programme has been added !"     ,   "a new program has been added")
                this.$router.push('/programs');
			}
            
            else{
                this.showErrors("Programme has not been added !", res.data.errors)
			}
        },

        async getValues() {

            const res_1     =   await this.callApi('post' ,   '/plans/combobox'                  ,   null)
            const res_2     =   await this.callApi('post' ,   '/process/combobox'                ,   null)
            const res_3     =   await this.callApi('post' ,   '/auditees/combobox'               ,   null)
            const res_4     =   await this.callApi('post' ,   '/societees/combobox'               ,   null)
            const res_5     =   await this.callApi('post' ,   '/type_audit/combobox'             ,   null)

            this.list_plans                 =   res_1.data
            this.list_process               =   res_2.data
            this.list_auditee               =   res_3.data
            this.list_societe               =   res_4.data
            this.list_type_audit            =   res_5.data

        },
    },

};
</script>
