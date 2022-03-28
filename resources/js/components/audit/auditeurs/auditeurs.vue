<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des auditeurs</h4>
              </div>

              <div>
                <router-link to="/auditeurs/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un auditeur  </button> 
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
                    <th>Email</th>

                    <th>Fonction</th>
                    <th>Societee</th>

                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(auditeur, index) in auditeurs" :key="auditeur.id">
                    <td>{{ index }}          </td>

                    <td>{{ auditeur.nom }}         </td>
                    <td>{{ auditeur.prenom}}       </td>
                    <td>{{ auditeur.email}}       </td>

                    <td>{{ auditeur.fonction }}    </td>
                    <td>{{ auditeur.societee }}   </td>

                    <td>
                      <router-link :to="`/auditeurs/${auditeur.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteAuditeur(auditeur)">
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
      auditeurs: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.auditeursShow();
    });
  },

  methods: {
    async auditeursShow()
    {
      const res     = await this.callApi('post' ,   '/auditeurs')
      this.auditeurs  = res.data
    },

    async deleteAuditeur($auditeur)
    {
      const res   = await this.callApi('post' ,   '/auditeurs/'+$auditeur.id+'/delete'    ,   null)
      this.auditeurs.splice(this.auditeurs.indexOf($auditeur), 1);
    }
  }

}

</script>
