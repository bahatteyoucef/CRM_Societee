<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter une type audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createTypeAudit">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="type_audit.nom"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createTypeAudit()">Submit</button>
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
            
            type_audit          :   {
                nom     : '',
            },
        };
    },

    mounted()
    {

    },

    methods: {
        async createTypeAudit()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.type_audit.nom)
            const res   = await this.callApi('post' ,   '/type_audit/store'    ,   formData)         
            
            if(res.status===200){
                this.feedbackSuccess("Type Audit has been added !"     ,   "a new type audit has been added")
                this.$router.push('/type_audit');
			}
            
            else{
                this.showErrors("Type Audit has not been added !", res.data.errors)
			}
        },
    },

};
</script>
