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
                                <h4 class="ml-1 card-title">List des process</h4>
                            </div>

                            <div id="datatables-buttons" class="col-sm-4"></div>

                            <div id="add_button_div" class="col-sm-2">
                                <router-link
                                    to="/process/create"
                                    class="nav-link p-0"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-fw p-2"
                                    >
                                        Ajouter un process
                                    </button>
                                </router-link>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Duree (Jours)</th>
                                        <th>Champ Audit</th>
                                        <th>Type Process</th>

                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="process in list_process"
                                        :key="process.id_process"
                                        style="background-color: #191c24"
                                    >
                                        <td>{{ process.nom }}</td>
                                        <td>{{ process.duree }}</td>
                                        <td>{{ process.champ_audit }}</td>
                                        <td>{{ process.type_process }}</td>

                                        <td class="row">
                                            <router-link
                                                :to="`/process/${process.id}/edit`"
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
                                                    showProcessElements(process.id)
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
                                                v-on:click="deleteProcess(process)"
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

        <ListProcessElements
            v-if="list_process_elements_display"
            :list_process_elements="list_process_elements"
        ></ListProcessElements>
    </div>
</template>

<script>
import ListProcessElements from "../element_process/listProcessElements.vue";
import $ from "jquery";

export default {
    data() {
        return {
            list_process: [],

            list_process_elements_display: false,
            list_process_elements: [],
        };
    },

    components: {
        ListProcessElements: ListProcessElements,
    },

    mounted() {
        this.$nextTick(function () {
            this.listProcessShow();
        });
    },

    methods: {
        async listProcessShow() {
            fetch("/process", {
                method: "POST",
            })
            
            .then((response) => response.json())
            .then((data) => {
                this.list_process = data;

                setTimeout(() => {
                    $("#datatable").DataTable({
                        dom: "Blfrtip",
                        buttons: ["csv", "print"],
                        columns: [
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

        async deleteProcess($process) {
            const res = await this.callApi(
                "post",
                "/process/" + $process.id + "/delete",
                null
            );
            this.list_process.splice(this.list_process.indexOf($process), 1);
        },

        async showProcessElements($id) {
            const res = await this.callApi(
                "post",
                "/process/" + $id + "/element_process"
            );
            this.list_process_elements = res.data;
            this.list_process_elements_display = true;
        },
    },
};
</script>
