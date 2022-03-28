<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des auditees</h4>
              </div>

              <div>
                <router-link to="/auditees/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un auditee  </button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</th>

                    <th>Nom</th>
                    <th>Prenom</th>

                    <th>Fonction</th>
                    <th>Societee</th>

                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(auditee, index) in auditees" :key="auditee.id">
                    <td>{{ index }}          </td>

                    <td>{{ auditee.nom }}         </td>
                    <td>{{ auditee.prenom}}       </td>

                    <td>{{ auditee.fonction }}    </td>
                    <td>{{ auditee.societee }}   </td>

                    <td>
                      <router-link :to="`/auditees/${auditee.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteAuditee(auditee)">
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
      auditees: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.auditeesShow();
    });
  },

  methods: {
    async auditeesShow()
    {
      const res     = await this.callApi('post' ,   '/auditees')
      this.auditees  = res.data
    },

    async deleteAuditee($auditee)
    {
      const res   = await this.callApi('post' ,   '/auditees/'+$auditee.id+'/delete'    ,   null)
      this.auditees.splice(this.auditees.indexOf($auditee), 1);
    }
  }

}

</script>
