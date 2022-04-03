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
                                <h4 class="card-title">Liste des societees</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div">
                                <router-link
                                    to="/societees/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter une societee
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
                                        v-for="(societee, index) in societees"
                                        :key="societee.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ index }}</td>
                                        <td>{{ societee.nom }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/societees/${societee.id}/details`"
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
                                                :to="`/societees/${societee.id}/edit`"
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
                                                v-on:click="deleteSocietee(societee)"
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
            societees: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.societeesShow();
        });
    },

    methods: {
        async societeesShow() {

            fetch("/societees", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.societees = data;

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

        async deleteSocietee($societee) {
            const res = await this.callApi(
                "post",
                "/societees/" + $societee.id + "/delete",
                null
            );
            this.societees.splice(this.societees.indexOf($societee), 1);
        },
    },
};
</script>
