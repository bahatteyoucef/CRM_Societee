<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des action audit</h4>
              </div>

              <div>
                <router-link to="/action_audit/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter une action audit </button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Constat</th>
                    <th>Evaluation Audit</th>
                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(action_audit, index) in list_action_audit" :key="action_audit.id">
                    <td>{{ index }}                                 </td>
                    <td>{{ action_audit.nom }}                      </td>
                    <td>{{ action_audit.constat }}                  </td>
                    <td>{{ action_audit.evaluation_audit }}         </td>

                    <td>
                      <router-link :to="`/action_audit/${action_audit.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteActionAudit(action_audit)">
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
      list_action_audit: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.ActionAuditShow();
    });
  },

  methods: {
    async ActionAuditShow()
    {
      const res     = await this.callApi('post' ,   '/action_audit')
      this.list_action_audit  = res.data
    },

    async deleteActionAudit($action_audit)
    {
      const res   = await this.callApi('post' ,   '/action_audit/'+$action_audit.id+'/delete'    ,   null)
      this.list_action_audit.splice(this.list_action_audit.indexOf($action_audit), 1);
    }
  }

}

</script>
