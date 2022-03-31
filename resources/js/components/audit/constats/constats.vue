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
                                <h4 class="card-title">Liste des constats</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/constats/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter une constat
                                    </button>
                                </router-link>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>Program</th>
                                        <th>Element Process</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="constat in constats"
                                        :key="constat.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ constat.program }}</td>
                                        <td>{{ constat.element_process }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/constats/${constat.id}/edit`"
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
                                                v-on:click="deleteConstat(constat)"
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
            constats: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.ConstatsShow();
        });
    },

    methods: {
        async ConstatsShow() {

            fetch("/constats", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.constats = data;

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

        async deleteConstat($constat) {
            const res = await this.callApi(
                "post",
                "/constats/" + $constat.id + "/delete",
                null
            );
            this.constats.splice(this.constats.indexOf($constat), 1);
        },
    },
};
</script>
