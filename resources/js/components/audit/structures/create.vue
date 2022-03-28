<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter une structure</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createStructure">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="structure.nom"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createStructure()">Submit</button>
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
            
            structure          :   {
                nom     : '',
            },
        };
    },

    mounted()
    {

    },

    methods: {
        async createStructure()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.structure.nom)
            const res   = await this.callApi('post' ,   '/structures/store'    ,   formData)         
            
            if(res.status===200){
                this.feedbackSuccess("Structure has been added !"     ,   "a new structure has been added")
                this.$router.push('/structures');
			}
            
            else{
                this.showErrors("Structure has not been added !", res.data.errors)
			}
        },
    },

};
</script>
