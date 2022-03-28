<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des devis de vente</h4>
              </div>

              <div>
                <router-link to="/clients/devis/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un devis de vente</button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
										<th>Reference</th>			
                    <th>Client</th>
                    <th>Date creation</th>
                    <th>Duree annulation</th>
                    <th>Statut</th>

                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="devis in clients_devis" :key="devis.id_devis_client">
                    
                    <td>{{ devis.reference_devis_client }}            </td>
                    <td>{{ devis.nom_client }}                        </td>
                    <td>{{ devis.date_debut_devis }}                  </td>
                    <td>{{ devis.duree_validite }}                    </td>
                    <td>{{ devis.libelle_etat_devis}}                 </td>

                    <td>
                      <router-link :to="`/devis/clients/${devis.id_devis}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                      <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteDevisClient(devis)">
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
				clients_devis: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.devisClientsShow();
    });
  },

  methods: {
    async devisClientsShow()
    {
      const res             = await this.callApi('post' ,   '/clients/devis')
      this.clients_devis    = res.data
    },

    async deleteDevisClient($devis)
    {
      const res   = await this.callApi('post' ,   '/clients/devis/'+$devis.id_devis_client+'/delete'    ,   null)
      this.clients_devis.splice(this.clients_devis.indexOf($devis), 1);
    }
  }

}

</script>
