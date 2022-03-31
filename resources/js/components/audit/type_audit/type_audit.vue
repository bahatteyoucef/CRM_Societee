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
                                <h4 class="card-title">Liste des type audit</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div">
                                <router-link
                                    to="/type_audit/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter une type audit
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
                                            type_audit, index
                                        ) in list_type_audit"
                                        :key="type_audit.id"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ index }}</td>
                                        <td>{{ type_audit.nom }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/type_audit/${type_audit.id}/edit`"
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
                                                v-on:click="deleteTypeAudit(type_audit)"
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
            list_type_audit: [],
        };
    },

    mounted() {
        this.$nextTick(function () {
            this.TypeAuditShow();
        });
    },

    methods: {
        async TypeAuditShow() {

            fetch("/type_audit", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.list_type_audit = data;

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

        async deleteTypeAudit($type_audit) {
            const res = await this.callApi(
                "post",
                "/type_audit/" + $type_audit.id + "/delete",
                null
            );
            this.list_type_audit.splice(
                this.list_type_audit.indexOf($type_audit),
                1
            );
        },
    },
};
</script>
