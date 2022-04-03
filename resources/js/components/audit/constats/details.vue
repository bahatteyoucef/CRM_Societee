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
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Program</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{constat.program}}</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Element Process</label>
                                        <div class="col-sm-9">
                                            <label class="col-sm-9 col-form-label">{{constat.element_process}}</label>
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
            
            constat          :   {
                program              : '',
                element_process      : ''
            },
        };
    },

    mounted(){
        this.$nextTick(function () {
            this.constatShow();
        });
    },

    methods: {

        async constatShow()
        {
            const res                               = await this.callApi('post' ,   '/constats/'+this.$route.params.id+'/details'    ,   null)
            
            this.constat.program                 =   res.data.program
            this.constat.element_process         =   res.data.element_process
        },

        retourRoute() {
            this.$router.back()
        },
        
    },

};
</script>
