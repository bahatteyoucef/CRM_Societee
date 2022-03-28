<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un type audit</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="editConstat">
                            
                            <p class="card-description"> Personal info </p>
                            
                            <hr />

                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Program</label>
                                        <div class="col-sm-9">
                                            <select name="id_fonction" v-model="constat.id_program" class="form-control" ref="id_program">
                                                <option v-for="program in programs" :key="program.id" :value="program.id">{{ program.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6" >
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Process</label>
                                        <div class="col-sm-9">
                                            <select name="id_structure" v-model="constat.id_element_process" class="form-control" ref="id_element_process">
                                                <option v-for="element_process in list_element_process" :key="element_process.id" :value="element_process.id">{{ element_process.nom }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="editConstat()">Submit</button>
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
                id_program              : '',
                id_element_process      : ''
            },

            programs                    : '',
            list_constat                : '',
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
            this.getValues()

            const res   = await this.callApi('post' ,   '/constats/'+this.$route.params.id+'/show'    ,   null)
            
            this.constat.id_program                 =   res.data.id_program
            this.constat.id_element_process         =   res.data.id_element_process
        },

        async editConstat()
        {   
            let formData = new FormData();

            formData.append("id_program"            , this.constat.id_program)
            formData.append("id_element_process"    , this.constat.id_element_process)
            
            const res   = await this.callApi('post' ,   '/constats/'+this.$route.params.id+'/update'    ,   formData)

            if(res.status===200){
                this.feedbackSuccess("Constat has been modified !"     ,   "a constat audit has been modified")
                this.$router.push('/constats');
			}
            
            else{
                this.showErrors("Constat has not been modified !", res.data.errors)
			}
        },

        async getValues() {

            const res_1     =   await this.callApi('post' ,   '/element_process/combobox'               ,   null)
            const res_2     =   await this.callApi('post' ,   '/programs/combobox'                      ,   null)

            this.list_element_process               =   res_1.data
            this.programs                           =   res_2.data
        },
        
    },

};
</script>
