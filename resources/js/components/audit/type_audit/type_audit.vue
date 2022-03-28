<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des type audit</h4>
              </div>

              <div>
                <router-link to="/type_audit/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter une type audit </button> 
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
                  <tr v-for="(type_audit, index) in list_type_audit" :key="type_audit.id">
                    <td>{{ index }}          </td>
                    <td>{{ type_audit.nom }}         </td>

                    <td>
                      <router-link :to="`/type_audit/${type_audit.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteTypeAudit(type_audit)">
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
      list_type_audit: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.TypeAuditShow();
    });
  },

  methods: {
    async TypeAuditShow()
    {
      const res     = await this.callApi('post' ,   '/type_audit')
      this.list_type_audit  = res.data
    },

    async deleteTypeAudit($type_audit)
    {
      const res   = await this.callApi('post' ,   '/type_audit/'+$type_audit.id+'/delete'    ,   null)
      this.list_type_audit.splice(this.list_type_audit.indexOf($type_audit), 1);
    }
  }

}

</script>
