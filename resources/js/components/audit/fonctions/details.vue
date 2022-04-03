<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un fonction</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editFonction">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{fonction.nom}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw"
                                        @click="retourRoute()"
                                        >
                                        Retour
                                        </button>
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
                nom                     : '',
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.fonctionShow();
        });
    },

    methods: {

        async fonctionShow()
        {
            const res   = await this.callApi('post' ,   '/fonctions/'+this.$route.params.id+'/details'    ,   null)
            this.fonction.nom                       =   res.data.nom
        },

        retourRoute() {
            this.$router.back()
        },
    },

};
</script>
