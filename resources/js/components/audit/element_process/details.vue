<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un type audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editElementProcess">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{element_process.nom}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{element_process.desc}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Etat Audit</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{element_process.etat_audit}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Process</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{element_process.process}}</label>
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
            
            element_process          :   {
                nom             : '',

                etat_audit   : '',
                process      : '',

                desc            : ''
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.element_processShow();
        });
    },

    methods: {

        async element_processShow()
        {
            const res   = await this.callApi('post' ,   '/element_process/'+this.$route.params.id+'/details'    ,   null)
            
            this.element_process.nom                        =   res.data.nom
            this.element_process.etat_audit                 =   res.data.etat_audit
            this.element_process.process                    =   res.data.process
            this.element_process.desc                       =   res.data.desc
        },

        retourRoute() {
            this.$router.back()
        },
    },

};
</script>
