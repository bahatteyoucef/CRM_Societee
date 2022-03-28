<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des constats</h4>
              </div>

              <div>
                <router-link to="/constats/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter une constat </button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Program</th>
                    <th>Element Process</th>
                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(constat, index) in constats" :key="constat.id">
                    <td>{{ index }}          </td>
                    <td>{{ constat.program }}         </td>
                    <td>{{ constat.element_process }}         </td>

                    <td>
                      <router-link :to="`/constats/${constat.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteConstat(constat)">
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
      constats: []
		}
	},

  mounted(){

    this.$nextTick(function () {
      this.ConstatsShow();
    });
  },

  methods: {
    async ConstatsShow()
    {
      const res         = await this.callApi('post' ,   '/constats')
      this.constats     = res.data
      console.log(res)
    },

    async deleteConstat($constat)
    {
      const res   = await this.callApi('post' ,   '/constats/'+$constat.id+'/delete'    ,   null)
      this.constats.splice(this.constats.indexOf($constat), 1);
    }
  }

}

</script>
