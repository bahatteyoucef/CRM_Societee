<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des produits et des services</h4>
              </div>

              <div>
                <router-link to="/produits/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un produit</button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
										<th>Image</th>			
                    <th>Code</th>
                    <th>Fournisseur</th>
                    <th>Famille comptable</th>
                    <th>Category</th>
                    <th>Type</th>
                    
                    <th>Prix achat</th>
                    <th>Unite achat</th>

                    <th>Prix vente</th>
                    <th>Unite vente</th>
                    
                    <th>Libelle</th>
                    <th>Description</th>
                    
                    <th>Option</th>
                    
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="produit in produits" :key="produit.id">
                    <td>
                      <img
                        v-bind:src="'/upload/produit_services/'+produit.image_prd_srv"
                        alt="image"
                      />
                    </td>
                   
                    <td>{{ produit.code_prd_srv }}            </td>
                    <td>{{ produit.nom_contact_fournisseur }}        </td>
                    <td>{{ produit.libelle_famille_cmpt }}               </td>
                    <td>{{ produit.libelle_category_prd_srv }}           </td>
                    <td>{{ produit.libelle_type_prd_srv }}               </td>

                    <td>{{ produit.prix_achat_prd_srv }}      </td>
                    <td>{{ produit.libelle_unite_vente_achat }}     </td>

                    <td>{{ produit.prix_vente_prd_srv }}      </td>
                    <td>{{ produit.libelle_unite_vente_achat}}      </td>
                    
                    <td>{{ produit.libelle_famille_cmpt }}         </td>
                    <td>{{ produit.description_prd_srv}}     </td>

                    <td>
                      <router-link :to="`/produits/${produit.id_prd_srv}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                      <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteProduit(produit)">
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
				produits: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.produitsAchatShow();
    });
  },

  methods: {
    async produitsAchatShow()
    {
      const res       = await this.callApi('post' ,   '/produits/achat')
      this.produits   = res.data
    },

    async deleteProduit($produit)
    {
      const res   = await this.callApi('post' ,   '/produits/'+$produit.id_prd_srv+'/delete'    ,   null)
      this.produits.splice(this.produits.indexOf($produit), 1);
    }
  }

}

</script>
