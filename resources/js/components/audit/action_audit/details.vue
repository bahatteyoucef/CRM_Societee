<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un type audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{action_audit.nom}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Evaluation Audit</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{action_audit.evaluation_audit}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Constat</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{action_audit.constat}}</label>
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
            
            action_audit          :   {
                nom                     : '',
                evaluation_audit     : '',
                constat              : ''
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.action_auditShow();
        });
    },

    methods: {

        async action_auditShow() {

            const res   = await this.callApi("post","/action_audit/"   + this.$route.params.id   + "/details",  null);

            this.action_audit.nom               = res.data.nom;
            this.action_audit.evaluation_audit  = res.data.evaluation_audit;
            this.action_audit.constat           = res.data.constat;

            console.log(this.$route.params.id)
        },

        retourRoute() {
            this.$router.back()
        },
    },

};
</script>
