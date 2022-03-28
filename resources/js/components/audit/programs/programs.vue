<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des programs</h4>
              </div>

              <div>
                <router-link to="/programs/create" class="nav-link">
                <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un program  </button> 
                </router-link>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>

                    <th>Date Debut</th>
                    <th>Date Fin</th>

                    <!-- <th>Heure Debut</th> -->
                    <!-- <th>Heure Fin</th> -->

                    <th>Nom</th>
                    <th>Ordre</th>

                    <th>Program</th>
                    <th>Process</th>
                    <th>Auditeur</th>
                    <th>Auditee</th>
                    <th>Societe</th>
                    <th>Type Audit</th>

                    <th>Description</th>

                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(program, index) in programs" :key="program.id">
                    <td>{{ index }}               </td>

                    <td>{{ program.date_debut }}  </td>
                    <td>{{ program.date_fin }}    </td>

                    <!-- <td>{{ program.heure_debut}}  </td> -->
                    <!-- <td>{{ program.heure_fin }}   </td> -->

                    <td>{{ program.nom }}         </td>
                    <td>{{ program.ordre}}        </td>

                    <td>{{ program.plan }}        </td>
                    <td>{{ program.process }}     </td>

                    <td>{{ program.auditeur }}    </td>
                    <td>{{ program.auditee}}      </td>

                    <td>{{ program.societe }}     </td>

                    <td>{{ program.type_audit }}  </td>

                    <td>{{ program.description }} </td>

                    <td>
                      <router-link :to="`/programs/${program.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deleteProgram(program)">
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
      programs: []
		}
	},

  mounted(){
    this.$nextTick(function () {
      this.programsShow();
    });
  },

  methods: {
    async programsShow()
    {
      const res       = await this.callApi('post' ,   '/programs')
      this.programs   = res.data
    },

    async deleteProgram($program)
    {
      const res   = await this.callApi('post' ,   '/programs/'+$program.id+'/delete'    ,   null)
      this.programs.splice(this.programs.indexOf($program), 1);
    }
  }

}

</script>
