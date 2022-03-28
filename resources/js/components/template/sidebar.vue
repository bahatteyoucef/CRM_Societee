<template>
    <div>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div
                class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top"
            >
                <a class="sidebar-brand brand-logo" :href="'/'"
                    >
                    <img
                        v-bind:src="'/template/assets/images/logo.svg'"
                        alt="logo"
                />
                </a>
                <a class="sidebar-brand brand-logo-mini" :href="'/'"
                    >
                    <img
                        v-bind:src="'/template/assets/images/logo-mini.svg'"
                        alt="logo"
                />
                </a>
            </div>

            <ul class="nav">
                
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img
                                    class="img-xs rounded-circle"
                                    v-bind:src="'/template/assets/images/faces/face15.jpg'"
                                    alt=""
                                />
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">
                                    Henry Klein
                                </h5>
                                <span>Gold Member</span>
                            </div>
                        </div>
                        <a :href="'#'" id="profile-dropdown" data-toggle="dropdown"
                            ><i class="mdi mdi-dots-vertical"></i
                        ></a>
                        <div
                            class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown"
                        >
                            <a :href="'#'" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div
                                        class="preview-icon bg-dark rounded-circle"
                                    >
                                        <i
                                            class="mdi mdi-settings text-primary"
                                        ></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p
                                        class="preview-subject ellipsis mb-1 text-small"
                                    >
                                        Account settings
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a :href="'#'" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div
                                        class="preview-icon bg-dark rounded-circle"
                                    >
                                        <i
                                            class="mdi mdi-onepassword text-info"
                                        ></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p
                                        class="preview-subject ellipsis mb-1 text-small"
                                    >
                                        Change Password
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a :href="'#'" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div
                                        class="preview-icon bg-dark rounded-circle"
                                    >
                                        <i
                                            class="mdi mdi-calendar-today text-success"
                                        ></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p
                                        class="preview-subject ellipsis mb-1 text-small"
                                    >
                                        To-do list
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>

                <li class="nav-item menu-items">
                    <router-link to="/" class="nav-link">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </router-link>
                </li>
                
                <li class="nav-item menu-items">
                    <a
                        class="nav-link"
                        data-toggle="collapse"
                        :href="'#ui-basic'"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Ventes</span>
                        <i class="menu-arrow"></i>
                    </a>
                    
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <router-link to="/clients"
                                    class="nav-link"
                                    >Clients</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/clients/contacts"
                                    class="nav-link"
                                    >Contacts</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/clients/devis"
                                    class="nav-link"
                                    >Devis Clients</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Commandes Clients</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Facturation</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Classification ABC</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Historique</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Rapports</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Configuration</router-link
                                >
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a
                        class="nav-link"
                        data-toggle="collapse"
                        :href="'#forms'"
                        aria-expanded="false"
                        aria-controls="forms"
                    >
                        <span class="menu-icon">
                            <i class="mdi mdi-playlist-play"></i>
                        </span>
                        <span class="menu-title">Achats</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <router-link to="/fournisseurs"
                                    class="nav-link"
                                    >Fournisseurs</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/fournisseurs/contacts"
                                    class="nav-link"
                                    >Contacts</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/fournisseurs/devis"
                                    class="nav-link"
                                    >Devis Fournisseurs</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Commandes Fournisseurs</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Facturation</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Classification ABC</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Historique</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Rapports</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                    >Configuration</router-link
                                >
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a
                        class="nav-link"
                        data-toggle="collapse"
                        :href="'#produits'"
                        aria-expanded="false"
                        aria-controls="produits"
                    >
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Produits</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="produits">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <router-link to="/produits/vente"
                                    class="nav-link"
                                    >Vente</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/produits/achat"
                                    class="nav-link"
                                    >Achat</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link to="/produits/production"
                                    class="nav-link"
                                    >Production</router-link
                                >
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a
                        class="nav-link"
                        data-toggle="collapse"
                        :href="'#audit'"
                        aria-expanded="false"
                        aria-controls="audit"
                    >
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">Audit</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="audit">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <router-link to="/plans"
                                    class="nav-link"
                                >
                                    Plans
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/process"
                                    class="nav-link"
                                >
                                    Process
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/programs"
                                    class="nav-link"
                                >
                                    Programs
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/auditees"
                                    class="nav-link"
                                >
                                    Auditees
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/auditeurs"
                                    class="nav-link"
                                >
                                    Auditeurs
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/fonctions"
                                    class="nav-link"
                                >
                                    Fonctions
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/structures"
                                    class="nav-link"
                                >
                                    Structures
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/societees"
                                    class="nav-link"
                                >
                                    Societees
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/type_audit"
                                    class="nav-link"
                                >
                                    Type Audit
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/champ_audit"
                                    class="nav-link"
                                >
                                    Champ Audit
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/type_process"
                                    class="nav-link"
                                >
                                    Type Process
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/element_process"
                                    class="nav-link"
                                >
                                    Element Process
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/evaluation_audit"
                                    class="nav-link"
                                >
                                    Evaluation Audit
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/constats"
                                    class="nav-link"
                                >
                                    Constats
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/action_audit"
                                    class="nav-link"
                                >
                                    Action Audit
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item menu-items">
                    <a
                        class="nav-link"
                        :href="'../../pages/tables/basic-table.html'"
                    >
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Tables</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" :href="'../../pages/charts/chartjs.html'">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-bar"></i>
                        </span>
                        <span class="menu-title">Charts</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a
                        class="nav-link"
                        data-toggle="collapse"
                        :href="'#auth'"
                        aria-expanded="false"
                        aria-controls="auth"
                    >
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Facturation</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                >
                                    Factures Clients
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                >
                                    Factures Fournisseurs
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                >
                                    Avoirs des clients
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                >
                                    Avoirs des fournisseurs
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                >
                                    Factures d'abonnement a valider
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/"
                                    class="nav-link"
                                >
                                    Rapports
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a
                        class="nav-link"
                        :href="'http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html'"
                    >
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">Documentation</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>
