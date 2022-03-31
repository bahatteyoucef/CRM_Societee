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
                                <h4 class="card-title">
                                    Liste des champs audit
                                </h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/champ_audit/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter un champ audit
                                    </button>
                                </router-link>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="(
                                            champ_audit, index
                                        ) in list_champ_audit"
                                        :key="champ_audit.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ index }}</td>
                                        <td>{{ champ_audit.nom }}</td>

                                        <td>
                                            <router-link
                                                :to="`/champ_audit/${champ_audit.id}/edit`"
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
                                                v-on:click="deleteChampAudit(champ_audit)"
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
            list_champ_audit: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.ChampAuditShow();
        });
    },

    methods: {
        async ChampAuditShow() {

            fetch("/champ_audit", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.list_champ_audit = data;

                setTimeout(() => {
                    $("#datatable").DataTable({
                        dom: "Blfrtip",
                        buttons: ["csv", "print"],
                        columns: [
                            null,
                            null,
                            { orderable: false },
                        ],
                    });

                    this.setDefaultStyling();
                });
              });
        },

        async deleteChampAudit($champ_audit) {
            const res = await this.callApi(
                "post",
                "/champ_audit/" + $champ_audit.id + "/delete",
                null
            );
            this.list_champ_audit.splice(
                this.list_champ_audit.indexOf($champ_audit),
                1
            );
        },
    },
};
</script>
