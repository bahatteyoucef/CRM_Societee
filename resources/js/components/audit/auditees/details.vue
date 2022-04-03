<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un auditee</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{auditee.nom}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Prenom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{auditee.prenom}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Fonction</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{auditee.fonction}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Structure</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{auditee.structure}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Societee</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{auditee.societee}}</label>
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
            
            auditee          :   {
                nom             : '',
                prenom          : '',
                fonction     : '',
                structure    : '',
                societee     : ''
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.auditeeShow();
        });
    },

    methods: {

        async auditeeShow()
        {
            const res   = await this.callApi('post' ,   '/auditees/'+this.$route.params.id+'/details'    ,   null)

            this.auditee.nom                    =   res.data.nom
            this.auditee.prenom                 =   res.data.prenom
            this.auditee.fonction               =   res.data.fonction
            this.auditee.structure              =   res.data.structure
            this.auditee.societee               =   res.data.societee

            console.log(res.data)
        },

        retourRoute() {
            this.$router.back()
        },

    },

};
</script>
