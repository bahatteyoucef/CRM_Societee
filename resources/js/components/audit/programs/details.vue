<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modifier un program</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="">
                                                        
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.nom}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Ordre</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.ordre}}</label>
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
                                            <label class="col-sm-9 col-form-label">{{program.date_debut}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Fin</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.date_fin}}</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Heure Debut</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.heure_debut}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Heure Fin</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.heure_fin}}</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">
                                
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Process</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.process}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Plan</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.plan}}</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">
                                
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Auditee</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.auditee}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Societe</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.societee}}</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr />

                            <div class="row">
                                
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Type Audit</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.type_audit}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{program.description}}</label>
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

            program          :   {

                nom         :   '',
                ordre       :   '',

                plan        :   '',
                process     :   '',

                auditeur    :   '',
                auditee     :   '',

                societee     :   '',
                type_audit  :   '',

                date_debut  :   '',
                date_fin    :   '',

                heure_debut :   '',
                heure_fin   :   '',

                description :   '',
            },

        };
    },

    mounted(){
        this.$nextTick(function () {
            this.programShow();
        });
    },

    methods: {

        async programShow()
        {
            const res   = await this.callApi('post' ,   '/programs/'+this.$route.params.id+'/details'    ,   null)
         
            this.program.nom                    =   res.data.nom
            this.program.ordre                  =   res.data.ordre

            this.program.plan                   =   res.data.plan
            this.program.process                =   res.data.process
            this.program.auditee                =   res.data.auditee
            this.program.societee               =   res.data.societee
            this.program.type_audit             =   res.data.type_audit

            this.program.date_debut             =   res.data.date_debut
            this.program.date_fin	            =   res.data.date_fin
            this.program.heure_debut	        =   res.data.heure_debut
            this.program.heure_fin              =   res.data.heure_fin

            this.program.description            =   res.data.description
        
            console.log(res.data)
        },

        retourRoute() {
            this.$router.back()
        },

    },

};
</script>
