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
                                <h4 class="ml-1 card-title">Liste des programs</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/programs/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter un program
                                    </button>
                                </router-link>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>Date Debut</th>
                                        <th>Date Fin</th>
                                        <th>Nom</th>
                                        <th>Ordre</th>

                                        <th>Program</th>
                                        <th>Process</th>
                                        <th>Auditeur</th>
                                        <th>Auditee</th>

                                        <th>Societe</th>
                                        <th>Type Audit</th>
                                        <th>Description</th>

                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="program in programs"
                                        :key="program.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ program.date_debut }}</td>
                                        <td>{{ program.date_fin }}</td>

                                        <td>{{ program.nom }}</td>
                                        <td>{{ program.ordre }}</td>

                                        <td>{{ program.plan }}</td>
                                        <td>{{ program.process }}</td>

                                        <td>{{ program.auditeur }}</td>
                                        <td>{{ program.auditee }}</td>

                                        <td>{{ program.societe }}</td>

                                        <td>{{ program.type_audit }}</td>

                                        <td>{{ program.description }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/programs/${program.id}/edit`"
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
                                                v-on:click="deleteProgram(program)"
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
            programs: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.programsShow();
        });
    },

    methods: {
        async programsShow() {
          
            fetch("/programs", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.programs = data;

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

                            null,
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

        async deleteProgram($program) {
            const res = await this.callApi(
                "post",
                "/programs/" + $program.id + "/delete",
                null
            );
            this.programs.splice(this.programs.indexOf($program), 1);
        },
    },
};
</script>
