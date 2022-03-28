<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter une type audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createTypeProcess">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="type_process.nom"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createTypeProcess()">Submit</button>
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
            
            type_process          :   {
                nom     : '',
            },
        };
    },

    mounted()
    {

    },

    methods: {
        async createTypeProcess()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.type_process.nom)
            const res   = await this.callApi('post' ,   '/type_process/store'    ,   formData)         
            
            if(res.status===200){
                this.feedbackSuccess("Type Process has been created !"     ,   "a type process audit has been created")
                this.$router.push('/type_process');
			}
            
            else{
                this.showErrors("Type Process has not been created !", res.data.errors)
			}
        },
    },

};
</script>
