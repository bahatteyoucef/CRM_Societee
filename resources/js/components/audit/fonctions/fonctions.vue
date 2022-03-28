<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des fonctions</h4>
              </div>

              <div>
                <router-link to="/fonctions/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter une fonction  </button> 
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
                  <tr v-for="(fonction, index) in fonctions" :key="fonction.id">
                    <td>{{ index }}          </td>
                    <td>{{ fonction.nom }}         </td>

                    <td>
                      <router-link :to="`/fonctions/${fonction.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteFonction(fonction)">
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
      fonctions: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.fonctionsShow();
    });
  },

  methods: {
    async fonctionsShow()
    {
      const res     = await this.callApi('post' ,   '/fonctions')
      this.fonctions  = res.data
    },

    async deleteFonction($fonction)
    {
      const res   = await this.callApi('post' ,   '/fonctions/'+$fonction.id+'/delete'    ,   null)
      this.fonctions.splice(this.fonctions.indexOf($fonction), 1);
    }
  }

}

</script>
