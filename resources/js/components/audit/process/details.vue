<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modifier un process</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editProcess">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{process.nom}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Duree(Jours)</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{process.duree}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Type Process</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{process.type_process}}</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Champ Audit</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{process.champ_audit}}</label>
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
            process          :   {										
                nom             : '',
                duree           : '',
                champ_audit     : '',
                type_process    : '',
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.processShow();
        });
    },

    methods: {

        async processShow()
        {
            const res   = await this.callApi('post' ,   '/process/'+this.$route.params.id+'/details'    ,   null)

            this.process.nom                    =   res.data.nom
            this.process.duree                  =   res.data.duree
            this.process.champ_audit            =   res.data.champ_audit
            this.process.type_process           =   res.data.type_process

            console.log(res.data)
        },

        retourRoute() {
            this.$router.back()
        },
    },

};
</script>
