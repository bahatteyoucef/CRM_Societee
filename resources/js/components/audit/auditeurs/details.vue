<template>
  <div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">
              Auditeur : {{ auditeur.nom }} {{ auditeur.prenom }}
            </h4>
            <hr />

            <form class="form-sample">
              <p class="card-description">Personal info</p>

              <hr />

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nom</label>
                    <div class="col-sm-9">
                      <label class="col-sm-9 col-form-label">{{auditeur.nom}}</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Prenom</label>
                    <div class="col-sm-9">
                      <label class="col-sm-9 col-form-label">{{auditeur.prenom}}</label>
                    </div>
                  </div>
                </div>
              </div>

              <hr />

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Fonction</label>
                    <div class="col-sm-9">
                      <label class="col-sm-9 col-form-label">{{auditeur.fonction}}</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Structure</label>
                    <div class="col-sm-9">
                      <label class="col-sm-9 col-form-label">{{auditeur.structure}}</label>
                    </div>
                  </div>
                </div>
              </div>

              <hr />

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Societee</label>
                    <div class="col-sm-9">
                      <label class="col-sm-9 col-form-label">{{auditeur.societee}}</label>
                    </div>
                  </div>
                </div>
              </div>

              <hr />

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <label class="col-sm-9 col-form-label">{{auditeur.email}}</label>
                    </div>
                  </div>
                </div>
              </div>

              <hr />

              <div class="container">
                <div class="row">
                  <div class="col text-center">
                    <button
                      type="button"
                      class="btn btn-outline-primary btn-fw"
                      @click="retourRoute()"
                    >
                      Retour
                    </button>
                  </div>
                </div>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {

    return {
      auditeur: {
        nom     : "",
        prenom  : "",
        email   : "",

        fonction  : "",
        structure : "",
        societee  : "",
      },

    };
  },

  mounted() {
    this.$nextTick(function () {
      this.auditeurShow();
    });
  },

  methods: {
    async auditeurShow() {

      const res   = await this.callApi("post","/auditeurs/"   + this.$route.params.id   + "/details",  null);

      this.auditeur.nom           = res.data.nom;
      this.auditeur.prenom        = res.data.prenom;
      this.auditeur.email         = res.data.email;

      this.auditeur.fonction      = res.data.fonction;
      this.auditeur.structure     = res.data.structure;
      this.auditeur.societee      = res.data.societee;

      console.log(res.data)
    },

    retourRoute() {
      this.$router.back()
    },
  },
};
</script>
