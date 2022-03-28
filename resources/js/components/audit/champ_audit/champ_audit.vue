<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des champs audit</h4>
              </div>

              <div>
                <router-link to="/champ_audit/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un champ audit </button> 
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
                  <tr v-for="(champ_audit, index) in list_champ_audit" :key="champ_audit.id">
                    <td>{{ index }}          </td>
                    <td>{{ champ_audit.nom }}         </td>

                    <td>
                      <router-link :to="`/champ_audit/${champ_audit.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteChampAudit(champ_audit)">
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
      list_champ_audit: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.ChampAuditShow();
    });
  },

  methods: {
    async ChampAuditShow()
    {
      const res     = await this.callApi('post' ,   '/champ_audit')
      this.list_champ_audit  = res.data
    },

    async deleteChampAudit($champ_audit)
    {
      const res   = await this.callApi('post' ,   '/champ_audit/'+$champ_audit.id+'/delete'    ,   null)
      this.list_champ_audit.splice(this.list_champ_audit.indexOf($champ_audit), 1);
    }
  }

}

</script>
