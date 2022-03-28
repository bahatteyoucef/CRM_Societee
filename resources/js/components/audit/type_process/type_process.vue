<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des type process</h4>
              </div>

              <div>
                <router-link to="/type_process/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter une type process </button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(type_process, index) in list_type_process" :key="type_process.id">
                    <td>{{ index }}          </td>
                    <td>{{ type_process.nom }}         </td>

                    <td>
                      <router-link :to="`/type_process/${type_process.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteTypeProcess(type_process)">
                          <i class="mdi mdi-delete" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>

                    </td>
                  </tr>
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>

export default {
	data(){
		return {
      list_type_process: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.TypeProcessShow();
    });
  },

  methods: {
    async TypeProcessShow()
    {
      const res     = await this.callApi('post' ,   '/type_process')
      this.list_type_process  = res.data
    },

    async deleteTypeProcess($type_process)
    {
      const res   = await this.callApi('post' ,   '/type_process/'+$type_process.id+'/delete'    ,   null)
      this.list_type_process.splice(this.list_type_process.indexOf($type_process), 1);
    }
  }

}

</script>
