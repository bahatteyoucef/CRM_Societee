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
                                <h4 class="ml-1 card-title">Liste des plans</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/plans/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter un plan
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

                                        <th>Auditeur</th>
                                        <th>Societee</th>

                                        <th>Description</th>

                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr 
                                      v-for="plan in plans" 
                                      :key="plan.id"
                                      style="background-color: #191c24"
                                    >
                                        <td>{{ plan.date_debut }}</td>
                                        <td>{{ plan.date_fin }}</td>

                                        <td>{{ plan.nom }}</td>
                                        <td>{{ plan.auditeur }}</td>

                                        <td>{{ plan.societee }}</td>

                                        <td>{{ plan.desc }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/plans/${plan.id}/edit`"
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
                                                class="btn btn-outline-info btn-icon mr-1 btn_options"
                                                v-on:click="
                                                    showPlanPrograms(plan.id)
                                                "
                                            >
                                                <i
                                                    class="mdi mdi-file"
                                                    style="
                                                        margin-left: 5px !important;
                                                    "
                                                ></i>
                                            </button>

                                            <button
                                                type="button"
                                                class="btn btn-outline-danger btn-icon btn_options"
                                                v-on:click="deletePlan(plan)"
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

        <ListPrograms
            v-if="list_programs_display"
            :list_programs="list_programs"
        ></ListPrograms>
    </div>

</template>

<script>

import ListPrograms from "../programs/listPrograms.vue";

import $ from "jquery";

export default {
    data() {
        return {
            plans: [],

            list_programs_display: false,
            list_programs: [],
        };
    },

    components: {
        ListPrograms: ListPrograms,
    },

    mounted() {
        this.$nextTick(function () {
            this.plansShow();
        });
    },

    methods: {
        async plansShow() {
            fetch("/plans", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.plans = data;

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
                            { orderable: false },
                        ],
                    });

                    this.setDefaultStyling();
                });
            });
        },

        async deletePlan($plan) {
            const res = await this.callApi(
                "post",
                "/plans/" + $plan.id + "/delete",
                null
            );
            this.plans.splice(this.plans.indexOf($plan), 1);
        },

        async showPlanPrograms($id) {
            
            const res = await this.callApi(
                "post",
                "/plans/" + $id + "/programs"
            );

            this.list_programs = res.data;
            this.list_programs_display = true;
        },
    },
};
</script>
