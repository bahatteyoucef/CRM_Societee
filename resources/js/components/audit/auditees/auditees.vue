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
                                <h4 class="card-title">Liste des auditees</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/auditees/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter un auditee
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

                                        <th>Fonction</th>
                                        <th>Societee</th>

                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="auditee in auditees"
                                        :key="auditee.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ auditee.nom }}</td>
                                        <td>{{ auditee.prenom }}</td>

                                        <td>{{ auditee.fonction }}</td>
                                        <td>{{ auditee.societee }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/auditees/${auditee.id}/details`"
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
                                                :to="`/auditees/${auditee.id}/edit`"
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
                                                v-on:click="deleteAuditee(auditee)"
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
            auditees: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.auditeesShow();
        });
    },

    methods: {
        async auditeesShow() {

            fetch("/auditees", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.auditees = data;

                setTimeout(() => {
                    $("#datatable").DataTable({
                        dom: "Blfrtip",
                        buttons: ["csv", "print"],
                        columns: [
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

        async deleteAuditee($auditee) {
            const res = await this.callApi(
                "post",
                "/auditees/" + $auditee.id + "/delete",
                null
            );
            this.auditees.splice(this.auditees.indexOf($auditee), 1);
        },
    },
};
</script>
