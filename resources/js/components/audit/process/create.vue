<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un process</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createProcess">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nom" v-model="process.nom"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Duree(Jours)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="duree" v-model="process.duree" />
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
                                            <select class="form-control" name="id_type_process" v-model="process.id_type_process">
                                                <option v-for="type_process in list_type_process" :key="type_process.id" :value="type_process.id">{{ type_process.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Champ Audit</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_champ_audit" v-model="process.id_champ_audit">
                                                <option v-for="champ_audit in list_champ_audit" :key="champ_audit.id" :value="champ_audit.id">{{ champ_audit.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                        
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createProcess()">Submit</button>
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
                nom         : '',
                duree       : '',
                id_champ_audit      : '',
                id_type_process     : '',
            },

            list_champ_audit    :   '',
            list_type_process   :   '',
        };
    },

    mounted()
    {
        this.$nextTick(function () {
            this.getValues();
        });
    },

    methods: {
        async createProcess()
        {   
            let formData = new FormData();

            formData.append("nom"                   , this.process.nom)
            formData.append('duree'                 , this.process.duree)
            formData.append("id_champ_audit"        , this.process.id_champ_audit)
            formData.append('id_type_process'       , this.process.id_type_process)

            const res   = await this.callApi('post' ,   '/process/store'    ,   formData)

            if(res.status===200){
                this.feedbackSuccess("Process has been added !"     ,   "a new process has been added")
                this.$router.push('/process');
			}
            
            else{
                this.showErrors("Process has not been added !", res.data.errors)
			}
        },

        async getValues() {

            const res_1     =   await this.callApi('post' ,   '/champ_audit'        ,   null)
            const res_2     =   await this.callApi('post' ,   '/type_process'       ,   null)

            this.list_champ_audit       =   res_1.data
            this.list_type_process      =   res_2.data
        },

    },

    
};
</script>
