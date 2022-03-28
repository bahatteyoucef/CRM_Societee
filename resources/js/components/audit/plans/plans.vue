<template>
  <div>
    
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des plans</h4>
              </div>

              <div>
                <router-link to="/plans/create" class="nav-link">
                  <button type="button" class="btn btn-outline-primary btn-fw"> Ajouter un plan  </button> 
                </router-link>                
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Reference</th>

                    <th>Date Debut</th>
                    <th>Date Fin</th>

                    <th>Nom</th>
                    
                    <th>Auditeur</th>
                    <th>Societee</th>
                    
                    <th>Description</th>
                    
                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(plan, index) in plans" :key="plan.id">
                    <td>{{ index }}             </td>

                    <td>{{ plan.date_debut}}    </td>
                    <td>{{ plan.date_fin}}      </td>
                    
                    <td>{{ plan.nom }}</td>
                    <td>{{ plan.auditeur }}     </td>

                    <td>{{ plan.societee }}</td>

                    <td>{{ plan.desc }}         </td>

                    <td>
                      <router-link :to="`/plans/${plan.id}/edit`">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                          <i class="mdi mdi-account-box-outline" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                        </button>
                      </router-link>

                      <button type="button" class="btn btn-inverse-info btn-rounded btn-icon" v-on:click="showPlanPrograms(plan.id)">
                        <i class="mdi mdi-account" style="margin-left: 5px !important; margin-top: 9px !important;"></i>
                      </button>

                      <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" v-on:click="deletePlan(plan)">
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

    <ListPrograms v-if="list_programs_display" :list_programs="list_programs"></ListPrograms>

  </div>
</template>

<script>
  
  import ListPrograms from '../programs/listPrograms.vue'

  export default {
    
    data(){
      return {
        plans: [],   

        list_programs_display : false,
        list_programs         : []
      }
    },

    components: {
        "ListPrograms"  :ListPrograms
    },

    mounted(){
      this.$nextTick(function () {
        this.plansShow();
      });
    },

    methods: {
      async plansShow()
      { 
        const res     = await this.callApi('post' ,   '/plans')
        this.plans  = res.data
      },

      async deletePlan($plan)
      {
        const res   = await this.callApi('post' ,   '/plans/'+$plan.id+'/delete'    ,   null)
        this.plans.splice(this.plans.indexOf($plan), 1);
      },

      async showPlanPrograms($id)
      {
        const res                   = await this.callApi('post' ,   '/plans/'+$id+'/programs')
        this.list_programs          = res.data
        this.list_programs_display  = true
      }
    }

  }

</script>
