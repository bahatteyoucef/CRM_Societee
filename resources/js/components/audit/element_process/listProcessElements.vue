<template>
  <div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">List des element process</h4>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Process</th>
                    <th>Description</th>
                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <tr
                    v-for="(element_process, index) in list_process_elements"
                    :key="element_process.id"
                  >
                    <td>{{ index }}</td>
                    <td>{{ element_process.nom }}</td>
                    <td>{{ element_process.process }}</td>
                    <td>{{ element_process.desc }}</td>

                    <td>
                      <router-link
                        :to="`/element_process/${element_process.id}/edit`"
                      >
                        <button
                          type="button"
                          class="btn btn-inverse-primary btn-rounded btn-icon"
                        >
                          <i
                            class="mdi mdi-account-box-outline"
                            style="
                              margin-left: 5px !important;
                              margin-top: 9px !important;
                            "
                          ></i>
                        </button>
                      </router-link>

                      <button
                        type="button"
                        class="btn btn-inverse-danger btn-rounded btn-icon"
                        v-on:click="deleteProcessElement(element_process)"
                      >
                        <i
                          class="mdi mdi-delete"
                          style="
                            margin-left: 5px !important;
                            margin-top: 9px !important;
                          "
                        ></i>
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
  data() {
    return {};
  },

  props: ["list_process_elements"],

  mounted() {},

  methods: {

    async deleteProcessElement($element_process) {
      const res = await this.callApi(
        "post",
        "/element_process/" + $element_process.id + "/delete",
        null
      );
      this.list_element_process.splice(
        this.list_element_process.indexOf($element_process),
        1
      );
    },
    
  },
};
</script>
