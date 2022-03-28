<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter une fonction</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createFonction">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="fonction.nom"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createFonction()">Submit</button>
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
            
            fonction          :   {
                nom     : '',
            },
        };
    },

    mounted()
    {

    },

    methods: {
        async createFonction()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.fonction.nom)

            const res   = await this.callApi('post' ,   '/fonctions/store'    ,   formData)         
            
            if(res.status===200){
                this.feedbackSuccess("Fonction has been added !"     ,   "a new fonction has been added")
                this.$router.push('/fonctions');
			}
            
            else{
                this.showErrors("Fonction has not been added !", res.data.errors)
			}
        },
    },

};
</script>
