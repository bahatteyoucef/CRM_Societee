<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un evaluation audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createEvaluationAudit">
                            
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
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createEvaluationAudit()">Submit</button>
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
                nom     : '',
            },
        };
    },

    mounted()
    {

    },

    methods: {
        async createEvaluationAudit()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.evaluation_audit.nom)
            const res   = await this.callApi('post' ,   '/evaluation_audit/store'    ,   formData)         
            
            if(res.status===200){
                this.feedbackSuccess("Evaluation Audit has been created !"     ,   "a evaluation audit audit has been created")
                this.$router.push('/evaluation_audit');
			}
            
            else{
                this.showErrors("Evaluation Audit has not been created !", res.data.errors)
			}
        },
    },

};
</script>
