<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un structure</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editStructure">
                            
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
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="editStructure()">Submit</button>
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
                nom                     : '',
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.structureShow();
        });
    },

    methods: {

        async structureShow()
        {
            const res   = await this.callApi('post' ,   '/structures/'+this.$route.params.id+'/show'    ,   null)
            this.structure.nom                       =   res.data.nom
        },

        async editStructure()
        {   
            let formData = new FormData();
            formData.append("nom"                       , this.structure.nom)
            
            const res   = await this.callApi('post' ,   '/structures/'+this.$route.params.id+'/update'    ,   formData)

            if(res.status===200){
                this.feedbackSuccess("Structure has been modified !"     ,   "a new structure has been modified")
                this.$router.push('/structures');
			}
            
            else{
                this.showErrors("Structure has not been modified !", res.data.errors)
			}
        },
    },

};
</script>
