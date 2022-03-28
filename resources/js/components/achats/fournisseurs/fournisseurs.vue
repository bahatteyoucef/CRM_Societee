<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des fournisseurs</h4>
              </div>

              <div>
                <router-link to="/fournisseurs/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un fournisseur  </button> 
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
                    <th>Adresse</th>
                    <th>Willaya</th>
                    <th>Commune</th>

                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="fournisseur in fournisseurs" :key="fournisseur.id">
                    <td>
                      <img
                        v-bind:src="'/upload/fournisseurs/'+fournisseur.image_fournisseur"
                        alt="image"
                      />
                    </td>
                    
                    <td>{{ fournisseur.reference_fournisseur }}       </td>
                    <td>{{ fournisseur.nom_fournisseur}}              </td>
                    <td>{{ fournisseur.telephone_fournisseur }}       </td>
                    <td>{{ fournisseur.email_fournisseur }}           </td>
                    <td>{{ fournisseur.libelle_category_societe }}    </td>
                    <td>{{ fournisseur.position_fiscal_fournisseur }} </td>
                    <td>{{ fournisseur.n_serie_fournisseur }}         </td>
                    <td>{{ fournisseur.nbr_employe_fournisseur }}     </td>
                    <td>{{ fournisseur.chiffre_affaire_fournisseur }} </td>

                    <td>{{ fournisseur.adresse_fournisseur}}          </td>
                    <td>{{ fournisseur.libelle_willaya}}              </td>
                    <td>{{ fournisseur.libelle_commune }}             </td>

                    <td>
                      <router-link :to="`/fournisseurs/${fournisseur.id_fournisseur}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteFournisseur(fournisseur)">
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
				fournisseurs: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.fournisseursShow();
    });
  },

  methods: {
    async fournisseursShow()
    {
      const res     = await this.callApi('post' ,   '/fournisseurs')
      this.fournisseurs  = res.data
    },

    async deleteFournisseur($fournisseur)
    {
      const res   = await this.callApi('post' ,   '/fournisseurs/'+$fournisseur.id_fournisseur+'/delete'    ,   null)
      this.fournisseurs.splice(this.fournisseurs.indexOf($fournisseur), 1);
    }
  }

}

</script>
