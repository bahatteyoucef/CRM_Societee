<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des contacts clients</h4>
              </div>

              <div>
                <router-link to="/clients/contacts/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un contact clients </button> 
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
                  <tr v-for="contact in contact_clients" :key="contact.id">
                    <td>
                      <img
                        v-bind:src="'/upload/clients/contact/'+contact.image_contact_client"
                        alt="image"
                      />
                    </td>
                    								                   
                    <td>{{ contact.id_societe_client }}        </td>
                    <td>{{ contact.nom_contact_client}}        </td>
                    <td>{{ contact.prenom_contact_client }}    </td>
                    <td>{{ contact.tel1_contact_client }}      </td>
                    <td>{{ contact.tel2_contact_client }}      </td>
                    <td>{{ contact.email_contact_client }}     </td>
                    <td>{{ contact.adresse_contact_client }}   </td>
                    <td>{{ contact.libelle_commune }}   </td>
                    <td>{{ contact.libelle_willaya }}   </td>
                    <td>{{ contact.libelle_fonction }}  </td>

                    <td>
                      <router-link :to="`/clients/${contact.id_societe_client}/contacts/${contact.id_contact_client}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteContactClient(contact)">
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
				contact_clients: []
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
      const res             = await this.callApi('post' ,   '/clients/contacts')
      this.contact_clients  = res.data
    },

    async deleteContactClient($contact_client)
    {
      const res   = await this.callApi('post' ,   '/clients/'+$contact_client.id_societe_client+'/contacts/'+$contact_client.id_contact_client+'/delete'    ,   null)
      this.contact_clients.splice(this.contact_clients.indexOf($contact_client), 1);
    }
  }

}

</script>
