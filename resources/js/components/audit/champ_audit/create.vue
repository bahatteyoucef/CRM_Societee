<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un champ audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createChampAudit">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="champ_audit.nom"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createChampAudit()">Submit</button>
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
            
            champ_audit          :   {
                nom     : '',
            },
        };
    },

    mounted()
    {

    },

    methods: {
        async createChampAudit()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.champ_audit.nom)
            const res   = await this.callApi('post' ,   '/champ_audit/store'    ,   formData)         
            
            if(res.status===200){
                this.feedbackSuccess("Champ Audit has been created !"     ,   "a new champ audit has been created")
                this.$router.push('/champ_audit');
			}
            
            else{
                this.showErrors("Champ Audit has not been created !", res.data.errors)
			}

        },
    },

};
</script>
