<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter une evaluation audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editEvaluationAudit">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="evaluation_audit.nom"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="editEvaluationAudit()">Submit</button>
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
            
            evaluation_audit          :   {
                nom                     : '',
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.evaluation_auditShow();
        });
    },

    methods: {

        async evaluation_auditShow()
        {
            const res   = await this.callApi('post' ,   '/evaluation_audit/'+this.$route.params.id+'/show'    ,   null)
            this.evaluation_audit.nom                       =   res.data.nom
        },

        async editEvaluationAudit()
        {   
            let formData = new FormData();
            formData.append("nom"                       , this.evaluation_audit.nom)
            
            const res   = await this.callApi('post' ,   '/evaluation_audit/'+this.$route.params.id+'/update'    ,   formData)

            if(res.status===200){
                this.feedbackSuccess("Evaluation Audit has been modified !"     ,   "a evaluation audit audit has been modified")
                this.$router.push('/evaluation_audit');
			}
            
            else{
                this.showErrors("Evaluation Audit has not been modified !", res.data.errors)
			}
        },
    },

};
</script>
