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
                                <h4 class="card-title">Liste des structures</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/structures/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter une structures
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
                                        v-for="(structure, index) in structures"
                                        :key="structure.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ index }}</td>
                                        <td>{{ structure.nom }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/structures/${structure.id}/details`"
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
                                                :to="`/structures/${structure.id}/edit`"
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
                                                v-on:click="deleteStructure(structure)"
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
            structures: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.structuresShow();
        });
    },

    methods: {
        async structuresShow() {

            fetch("/structures", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.structures = data;

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

        async deleteStructure($structure) {
            const res = await this.callApi(
                "post",
                "/structures/" + $structure.id + "/delete",
                null
            );
            this.structures.splice(this.structures.indexOf($structure), 1);
        },
    },
};
</script>
