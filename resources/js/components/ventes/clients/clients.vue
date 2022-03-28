<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des produits</h4>
              </div>

              <div>
                <router-link to="/clients/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un client  </button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>

                    <th>image</th>

                    <th>Reference</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Position fiscal</th>
                    <th>N serie</th>
                    <th>Nombre employes</th>
                    <th>Chiffre d'affaire</th>
                    <th>Willaya</th>
                    <th>Commune</th>
                    <th>Adresse</th>
                    
                    <th>Option</th>
                    
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="client in clients" :key="client.id_client">
                    <td>
                      <img
                        v-bind:src="'/upload/clients/'+client.image_client"
                        alt="image"
                      />
                    </td>
                    
                    <td>{{ client.reference_client }}         </td>
                    <td>{{ client.nom_client}}                </td>
                    <td>{{ client.telephone_client }}         </td>
                    <td>{{ client.email_client }}             </td>
                    <td>{{ client.libelle_category_societe }} </td>
                    <td>{{ client.position_fiscal_client }}   </td>
                    <td>{{ client.n_serie_client }}           </td>
                    <td>{{ client.nbr_employe_client }}       </td>
                    <td>{{ client.chiffre_affaire_client }}   </td>
                    <td>{{ client.libelle_willaya}}           </td>
                    <td>{{ client.libelle_commune }}          </td>
                    <td>{{ client.adresse_client}}            </td>

                    <td>
                      <router-link :to="`/clients/${client.id_client}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteClient(client)">
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
				clients: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.clientsShow();
    });
  },

  methods: {
    async clientsShow()
    {
      const res     = await this.callApi('post' ,   '/clients')
      this.clients  = res.data
    },

    async deleteClient($client)
    {
      const res   = await this.callApi('post' ,   '/clients/'+$client.id_client+'/delete'    ,   null)
      this.clients.splice(this.clients.indexOf($client), 1);
    }
  }

}

</script>
