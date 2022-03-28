<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un type audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editElementProcess">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="action_audit.nom"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Evaluation Audit</label>
                                        <div class="col-sm-9">
                                            <select name="id_fonction" v-model="action_audit.id_evaluation_audit" class="form-control" ref="id_evaluation_audit">
                                                <option v-for="evaluation_audit in list_evaluation_audit" :key="evaluation_audit.id" :value="evaluation_audit.id">{{ evaluation_audit.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Constat</label>
                                        <div class="col-sm-9">
                                            <select name="id_structure" v-model="action_audit.id_constat" class="form-control" ref="id_constat">
                                                <option v-for="constat in list_constats" :key="constat.id" :value="constat.id">{{ constat.reference }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="editElementProcess()">Submit</button>
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
            
            action_audit          :   {
                nom                     : '',
                id_evaluation_audit     : '',
                id_constat              : ''
            },

            list_evaluation_audit       : '',
            list_constats               : '',
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.action_auditShow();
        });
    },

    methods: {

        async action_auditShow()
        {
            this.getValues()

            const res   = await this.callApi('post' ,   '/action_audit/'+this.$route.params.id+'/show'    ,   null)
            
            this.action_audit.nom                       =   res.data.nom
            this.action_audit.id_evaluation_audit       =   res.data.id_evaluation_audit
            this.action_audit.id_constat                =   res.data.id_constat
        },

        async editElementProcess()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.action_audit.nom)
            formData.append("id_evaluation_audit"   , this.action_audit.id_evaluation_audit)
            formData.append("id_constat"            , this.action_audit.id_constat)
            
            const res   = await this.callApi('post' ,   '/action_audit/'+this.$route.params.id+'/update'    ,   formData)

            if(res.status===200){
                this.feedbackSuccess("Action Audit has been modified !"     ,   "a action audit audit has been modified")
                this.$router.push('/action_audit');
			}
            
            else{
                this.showErrors("Action Audit has not been modified !", res.data.errors)
			}
        },

        async getValues() {

            const res_1     =   await this.callApi('post' ,   '/evaluation_audit/combobox'              ,   null)
            const res_2     =   await this.callApi('post' ,   '/constats/combobox'                      ,   null)

            this.list_evaluation_audit          =   res_1.data
            this.list_constats                  =   res_2.data
        },
    },

};
</script>
