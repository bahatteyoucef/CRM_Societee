<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="row d-sm-flex justify-content-between align-items-start"
                        >
                            <div class="col-sm-6">
                                <h4 class="card-title">Liste des auditeurs</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/auditeurs/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter un auditeur
                                    </button>
                                </router-link>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>

                                        <th>Fonction</th>
                                        <th>Societee</th>

                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="auditeur in auditeurs"
                                        :key="auditeur.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ auditeur.nom }}</td>
                                        <td>{{ auditeur.prenom }}</td>
                                        <td>{{ auditeur.email }}</td>

                                        <td>{{ auditeur.fonction }}</td>
                                        <td>{{ auditeur.societee }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/auditeurs/${auditeur.id}/details`"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-info btn-icon mr-1 btn_options"
                                                >
                                                    <i
                                                        class="mdi mdi-file"
                                                        style="
                                                            margin-left: 5px !important;
                                                        "
                                                    ></i>
                                                </button>
                                            </router-link>

                                            <router-link
                                                :to="`/auditeurs/${auditeur.id}/edit`"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-primary btn-icon mr-1 btn_options"
                                                >
                                                    <i
                                                        class="mdi mdi-border-color"
                                                        style="
                                                            margin-left: 5px !important;
                                                            margin-top: 5px !important;
                                                        "
                                                    ></i>
                                                </button>
                                            </router-link>

                                            <button
                                                type="button"
                                                class="btn btn-outline-danger btn-icon btn_options"
                                                v-on:click="deleteAuditeur(auditeur)"
                                            >
                                                <i
                                                    class="mdi mdi-delete"
                                                    style="
                                                        margin-left: 5px !important;
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

import $ from "jquery";

export default {
    data() {
        return {
            auditeurs: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.auditeursShow();
        });
    },

    methods: {
        async auditeursShow() {
            
            fetch("/auditeurs", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.auditeurs = data;

                setTimeout(() => {
                    $("#datatable").DataTable({
                        dom: "Blfrtip",
                        buttons: ["csv", "print"],
                        columns: [
                            null,
                            null,
                            null,
                            null,
                            null,
                            { orderable: false },
                        ],
                    });

                    this.setDefaultStyling();
                });
              });
        },

        async deleteAuditeur($auditeur) {
            const res = await this.callApi(
                "post",
                "/auditeurs/" + $auditeur.id + "/delete",
                null
            );
            this.auditeurs.splice(this.auditeurs.indexOf($auditeur), 1);
        },
    },
};
</script>
