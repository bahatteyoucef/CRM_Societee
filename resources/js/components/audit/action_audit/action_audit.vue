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
                                    Liste des action audit
                                </h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/action_audit/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter une action audit
                                    </button>
                                </router-link>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Constat</th>
                                        <th>Evaluation Audit</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="
                                            action_audit
                                        in list_action_audit"
                                        :key="action_audit.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ action_audit.nom }}</td>
                                        <td>{{ action_audit.constat }}</td>
                                        <td>
                                            {{ action_audit.evaluation_audit }}
                                        </td>

                                        <td class="row">
                                            <router-link
                                                :to="`/action_audit/${action_audit.id}/edit`"
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

                                            <router-link
                                                :to="`/action_audit/${action_audit.id}/details`"
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

                                            <button
                                                type="button"
                                                class="btn btn-outline-danger btn-icon btn_options"
                                                v-on:click="deleteActionAudit(action_audit)"
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
            list_action_audit: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.ActionAuditShow();
        });
    },

    methods: {

        async ActionAuditShow() {

            fetch("/action_audit", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.list_action_audit = data;

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

        async deleteActionAudit($action_audit) {
            const res = await this.callApi(
                "post",
                "/action_audit/" + $action_audit.id + "/delete",
                null
            );
            this.list_action_audit.splice(
                this.list_action_audit.indexOf($action_audit),
                1
            );
        },
    },
};
</script>
