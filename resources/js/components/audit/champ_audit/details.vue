<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un champ audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editChampAudit">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{champ_audit.nom}}</label>
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
            
            champ_audit          :   {
                nom                     : '',
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.champ_auditShow();
        });
    },

    methods: {

        async champ_auditShow()
        {
            const res   = await this.callApi('post' ,   '/champ_audit/'+this.$route.params.id+'/details'    ,   null)
            this.champ_audit.nom                       =   res.data.nom
            console.log(res.data)
        },

        retourRoute() {
            this.$router.back()
        },
    },

};
</script>
