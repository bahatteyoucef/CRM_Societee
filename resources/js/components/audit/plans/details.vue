<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un plan</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{plan.nom}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Type Audit</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{plan.type_audit}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Debut</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{plan.date_debut}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Fin</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{plan.date_fin}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Societe</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{plan.societee}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{plan.desc}}</label>
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
            plan          :   {
                nom             :   '',
                date_debut      :   '',
                date_fin        :   '',
                type_audit      :   '',
                societee        :   '',
                desc            :   ''
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.planShow();
        });
    },

    methods: {

        async planShow()
        {
            const res   = await this.callApi('post' ,   '/plans/'+this.$route.params.id+'/details'    ,   null)

            this.plan.nom                   =   res.data.nom
            this.plan.date_debut            =   res.data.date_debut
            this.plan.date_fin              =   res.data.date_fin
            this.plan.type_audit            =   res.data.type_audit
            this.plan.societee              =   res.data.societee
            this.plan.desc                  =   res.data.desc

            console.log(res.data)
        },
    
        retourRoute() {
            this.$router.back()
        },
    },


};
</script>
