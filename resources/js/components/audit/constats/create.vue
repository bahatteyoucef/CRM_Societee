<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajouter une constat</h4>
                        <hr />

                        <form class="form-sample" @submit.prevent="createConstat">
                            
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
                                        <label class="col-sm-3 col-form-label">Element Process</label>
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
                                        <button type="submit" class="btn btn-outline-primary btn-fw" click="createConstat()">Submit</button>
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
            list_element_process        : '',
        };
    },

    mounted()
    {
        this.$nextTick(function () {
            this.getValues();
        });
    },

    methods: {
        async createConstat()
        {   
            let formData = new FormData();

            formData.append("id_element_process"    , this.constat.id_element_process)
            formData.append("id_program"            , this.constat.id_program)

            const res   = await this.callApi('post' ,   '/constats/store'    ,   formData)         
            
            if(res.status===200){
                this.feedbackSuccess("Constat has been created !"     ,   "a constat audit has been created")
                this.$router.push('/constats');
			}
            
            else{
                this.showErrors("Constat has not been created !", res.data.errors)
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
