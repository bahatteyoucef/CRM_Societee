<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des societees</h4>
              </div>

              <div>
                <router-link to="/societees/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter une societee </button> 
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
                  <tr v-for="(societee, index) in societees" :key="societee.id">
                    <td>{{ index }}          </td>
                    <td>{{ societee.nom }}         </td>

                    <td>
                      <router-link :to="`/societees/${societee.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteSocietee(societee)">
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
      societees: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.societeesShow();
    });
  },

  methods: {
    async societeesShow()
    {
      const res     = await this.callApi('post' ,   '/societees')
      this.societees  = res.data
      console.log(res)
    },

    async deleteSocietee($societee)
    {
      const res   = await this.callApi('post' ,   '/societees/'+$societee.id+'/delete'    ,   null)
      this.societees.splice(this.societees.indexOf($societee), 1);
    }
  }

}

</script>
