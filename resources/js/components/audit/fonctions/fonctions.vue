<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="d-sm-flex justify-content-between align-items-start"
                        >
                            <div class="col-sm-6">
                                <h4 class="card-title">Liste des fonctions</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div">
                                <router-link
                                    to="/fonctions/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2 float-right"
                                    >
                                        Ajouter une fonction
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
                                        v-for="(fonction, index) in fonctions"
                                        :key="fonction.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ index }}</td>
                                        <td>{{ fonction.nom }}</td>

                                        <td class="row">
                                            
                                            <router-link
                                                :to="`/fonctions/${fonction.id}/details`"
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
                                                :to="`/fonctions/${fonction.id}/edit`"
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
                                                v-on:click="deleteFonction(fonction)"
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
            fonctions: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.fonctionsShow();
        });
    },

    methods: {
        async fonctionsShow() {

            fetch("/fonctions", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.fonctions = data;

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

        async deleteFonction($fonction) {
            const res = await this.callApi(
                "post",
                "/fonctions/" + $fonction.id + "/delete",
                null
            );
            this.fonctions.splice(this.fonctions.indexOf($fonction), 1);
        },
    },
};
</script>
