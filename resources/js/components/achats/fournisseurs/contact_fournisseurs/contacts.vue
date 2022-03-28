<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des contacts fournisseurs</h4>
              </div>

              <div>
                <router-link to="/fournisseurs/contacts/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un contact fournisseurs </button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Societe</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone1</th>
                    <th>Telephone2</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Commune</th>
                    <th>Willaya</th>
                    <th>Fonction</th>

                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="contact in contact_fournisseurs" :key="contact.id">
                    <td>
                      <img
                        v-bind:src="'/upload/fournisseurs/contact/'+contact.image_contact_fournisseur"
                        alt="image"
                      />
                    </td>
                    								
                   
                    <td>{{ contact.id_societe_fournisseur }}        </td>
                    <td>{{ contact.nom_contact_fournisseur}}        </td>
                    <td>{{ contact.prenom_contact_fournisseur }}    </td>
                    <td>{{ contact.tel1_contact_fournisseur }}      </td>
                    <td>{{ contact.tel2_contact_fournisseur }}      </td>
                    <td>{{ contact.email_contact_fournisseur }}     </td>
                    <td>{{ contact.adresse_contact_fournisseur }}   </td>
                    <td>{{ contact.libelle_commune }}   </td>
                    <td>{{ contact.libelle_willaya }}   </td>
                    <td>{{ contact.libelle_fonction }}  </td>

                    <td>
                      <router-link :to="`/fournisseurs/${contact.id_societe_fournisseur}/contacts/${contact.id_contact_fournisseur}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteContactFournisseur(contact)">
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
				contact_fournisseurs: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.contactsShow();
    });
  },

  methods: {
    async contactsShow()
    {
      const res                   =   await this.callApi('post' ,   '/fournisseurs/contacts')
      console.log(res.data)
      this.contact_fournisseurs   =   res.data
    },

    async deleteContactFournisseur($contact_fournisseur)
    {
      const res   = await this.callApi('post' ,   '/fournisseurs/'+$contact_fournisseur.id_societe_fournisseur+'/contacts/'+$contact_fournisseur.id_contact_fournisseur+'/delete'    ,   null)
      this.contact_fournisseurs.splice(this.contact_fournisseurs.indexOf($contact_fournisseur), 1);
    }
  }

}

</script>
