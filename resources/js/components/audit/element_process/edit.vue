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
                                            <input type="text" class="form-control" name="nom" v-model="element_process.nom"/>
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
                                            <select name="id_fonction" v-model="element_process.id_etat_audit" class="form-control" ref="id_etat_audit">
                                                <option v-for="etat_audit in list_etat_audit" :key="etat_audit.id" :value="etat_audit.id">{{ etat_audit.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Process</label>
                                        <div class="col-sm-9">
                                            <select name="id_structure" v-model="element_process.id_process" class="form-control" ref="id_process">
                                                <option v-for="process in list_process" :key="process.id" :value="process.id">{{ process.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="editElementProcess()">Submit</button>
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

                id_etat_audit   : '',
                id_process      : '',

                desc            : ''
            },

            list_process        : '',
            list_etat_audit     : '',
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
            this.getValues()

            const res   = await this.callApi('post' ,   '/element_process/'+this.$route.params.id+'/show'    ,   null)
            
            this.element_process.nom                        =   res.data.nom
            this.element_process.id_etat_audit              =   res.data.id_etat_audit
            this.element_process.id_process                 =   res.data.id_process
            this.element_process.desc                       =   res.data.desc
        },

        async editElementProcess()
        {   
            let formData = new FormData();

            formData.append("nom"                       , this.element_process.nom)
            formData.append("id_etat_audit"             , this.element_process.id_etat_audit)
            formData.append("id_process"                , this.element_process.id_process)
            formData.append("desc"                , this.element_process.desc)
            
            const res   = await this.callApi('post' ,   '/element_process/'+this.$route.params.id+'/update'    ,   formData)

            if(res.status===200){
                this.feedbackSuccess("Element Process has been modified !"     ,   "a element process audit has been modified")
                this.$router.push('/element_process');
			}
            
            else{
                this.showErrors("Element Process has not been modified !", res.data.errors)
			}
        },

        async getValues() {

            const res_1     =   await this.callApi('post' ,   '/process/combobox'               ,   null)
            const res_2     =   await this.callApi('post' ,   '/etat_audit/combobox'            ,   null)

            this.list_process               =   res_1.data
            this.list_etat_audit            =   res_2.data
        },
    },

};
</script>
