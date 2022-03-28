<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des process</h4>
              </div>

              <div>
                <router-link to="/process/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un process  </button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr> 
                    <th>Reference</th>
                    <th>Nom</th>
                    <th>Duree (Jours)</th>
                    <th>Champ Audit</th>
                    <th>Type Process</th>

                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(process, index) in list_process" :key="process.id_process">
                    <td>{{ index }}         </td>
                    <td>{{ process.nom }}         </td>
                    <td>{{ process.duree}}        </td>
                    <td>{{ process.champ_audit }}     </td>
                    <td>{{ process.type_process }}    </td>

                    <td>
                      <router-link :to="`/process/${process.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-info btn-rounded btn-icon" v-on:click="showProcessElements(process.id)">
                          <i class="mdi mdi-account" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteProcess(process)">
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

    <ListProcessElements v-if="list_process_elements_display" :list_process_elements="list_process_elements"></ListProcessElements>

  </div>
</template>

<script>

import ListProcessElements from '../element_process/listProcessElements.vue'

export default {
	data(){
		return {
      list_process: [],

      list_process_elements_display : false,
      list_process_elements         : []
		}
	},

  components: {
    "ListProcessElements"  :ListProcessElements
  },

  mounted(){
    this.$nextTick(function () {
      this.listProcessShow();
    });
  },

  methods: {
    async listProcessShow()
    {
      const res           = await this.callApi('post' ,   '/process')
      this.list_process   = res.data
    },

    async deleteProcess($process)
    {
      const res   = await this.callApi('post' ,   '/process/'+$process.id+'/delete'    ,   null)
      this.list_process.splice(this.list_process.indexOf($process), 1);
    },

    async showProcessElements($id)
    {
      const res                           = await this.callApi('post' ,   '/process/'+$id+'/element_process')
      this.list_process_elements          = res.data
      this.list_process_elements_display  = true
    }


  }

}

</script>
