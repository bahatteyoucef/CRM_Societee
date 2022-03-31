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
                                    Liste des element process
                                </h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/element_process/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter un element process
                                    </button>
                                </router-link>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Process</th>
                                        <th>Description</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="
                                            element_process
                                         in list_element_process"
                                        :key="element_process.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ element_process.nom }}</td>
                                        <td>{{ element_process.process }}</td>
                                        <td>{{ element_process.desc }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/element_process/${element_process.id}/edit`"
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
                                                v-on:click="deleteElementProcess(element_process)"
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
            list_element_process: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.ElementProcessShow();
        });
    },

    methods: {
        async ElementProcessShow() {

            fetch("/element_process", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.list_element_process = data;

                setTimeout(() => {
                    $("#datatable").DataTable({
                        dom: "Blfrtip",
                        buttons: ["csv", "print"],
                        columns: [
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

        async deleteElementProcess($element_process) {
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
