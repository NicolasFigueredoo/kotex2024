<template>
    <div class="adminPanel-view">
        <nav class="navbar navbar-expand-lg bg-body-light topbar mb-4">
            <div class="container-fluid px-2">
                <div class="d-flex align-items-center gap-lg-2">
                    <button class="button-toggle-menu" id="sidebarToggle">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                </div>
                <div class="">
                    <ul class="navbar-nav ms-automb-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-user nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="../../../../img/kotex.jpg" alt="Profile Pic"
                                        class="user-avatar rounded-circle">
                                </span>
                                <span class="d-none d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0 text-grey-600 small">Nicolas</h5>
                                    <h6 class="my-0 fw-normal small">Figueredo</h6>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow position-absolute">
                                <li>
                                    <a class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            fill="currentColor" class="bi bi-person me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg> Mis datos
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-box-arrow-right me-2" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                            <path fill-rule="evenodd"
                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                        </svg> Cerrar sesión
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <nav id="sidebar" class="sidebar bg-body-light shadow-right">
                <a class="sidebar-brand">
                    <img src="../../../../img/kotex.jpg" class="w-75">
                </a>
                <ul class="sidebar-nav nav accordion">
                    <li class="sidebar-header text-uppercase">
                        Administrador Kotex
                    </li>
                    <hr class="mx-3">
                    <li class="sidebar-item">
                        <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseHome"
                            aria-expanded="false" aria-controls="collapseHome">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Home</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>
                        <div id="collapseHome" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(1)" class="nav-link ">Slider</a>
                            </nav>
                        </div>
                        <div id="collapseHome" class="collapse">
                            <nav class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(3)" class="nav-link ">Categorias</a>
                            </nav>
                        </div>
                        <div id="collapseHome" class="collapse">
                            <nav class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(5)" class="nav-link ">Banner</a>
                            </nav>
                        </div>

                        <div id="collapseHome" class="collapse">
                            <nav class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(21)" class="nav-link ">Servicios</a>
                            </nav>
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseNosotros"
                            aria-expanded="false" aria-controls="collapseNosotros">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 640 512">
                                    <path fill="#ffffff" d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/></svg>
                            </div>
                            <span>Nosotros</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>
                        
                        <div id="collapseNosotros" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(6)" class="nav-link ">Slider</a>
                            </nav>
                        </div>

                        <div id="collapseNosotros" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(7)" class="nav-link ">Banner</a>
                            </nav>
                        </div>

                        <div id="collapseNosotros" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(8)" class="nav-link ">Valores</a>
                            </nav>
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseAplicaciones"
                            aria-expanded="false" aria-controls="collapseAplicaciones">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Aplicaciones</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>
                        
                        <div id="collapseAplicaciones" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(10)" class="nav-link ">Mostrar</a>
                            </nav>
                        </div>

                        <div id="collapseAplicaciones" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(12)" class="nav-link ">Crear</a>
                            </nav>
                        </div>

                    </li>

                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(13)"  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseContacto"
                            aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Contacto</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>
                  
                    </li>

                    <li class="sidebar-item">
                        <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseUsuario"
                            aria-expanded="false" aria-controls="collapseUsuario">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Usuarios</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>
                        <div id="collapseUsuario" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(14)" class="nav-link">Mostrar</a>
                            </nav>
                        </div>
                        <div id="collapseUsuario" class="collapse">
                            <nav class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(15)" class="nav-link ">Crear</a>
                            </nav>
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSuscripciones"
                            aria-expanded="false" aria-controls="collapseSuscripciones">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Suscripciones</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>
                        <div id="collapseSuscripciones" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(17)" class="nav-link">Mostrar</a>
                            </nav>
                        </div>
                        <div id="collapseSuscripciones" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(18)" class="nav-link">Enviar Mensaje</a>
                            </nav>
                        </div>
                    </li>

                    
                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(19)" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseLogos"
                            aria-expanded="false" aria-controls="collapseLogos">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Logos</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>
                    
                  
                    </li>

                    <li class="sidebar-item">
                        <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProductos"
                            aria-expanded="false" aria-controls="collapseProductos">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Productos</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>
                        <div id="collapseProductos" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(21)" class="nav-link">Mostrar</a>
                            </nav>
                        </div>
                        <div id="collapseProductos" class="collapse">
                            <nav  class="sidenav-menu-nested nav accordion">
                                <a @click="mostrarComponenteF(23)" class="nav-link">Crear</a>
                            </nav>
                        </div>
                    </li>
    
    
                </ul>
            </nav>

            <Alerta style="position: fixed; z-index: 5;" v-if="mostrarAlerta === true"/>

            <!--COMPONENTES HOME -->
            <ShowSlider v-if="mostrarComponente === 1"/>
            <EditSlider v-if="mostrarComponente === 2"/>
            <ShowCategorias v-if="mostrarComponente === 3"/>
            <EditCategoria v-if="mostrarComponente === 4"/>
            <EditBanner v-if="mostrarComponente === 5"/>

            <!--COMPONENTES NOSOTROS -->
            <ShowSlider v-if="mostrarComponente === 6"/>
            <EditBanner v-if="mostrarComponente === 7"/>
            <ShowSeccionesNosotros v-if="mostrarComponente === 8"/>
            <EditSeccionesNosotros v-if="mostrarComponente === 9"/>
            
            <!--COMPONENTES APLICACIONES -->
            <ShowAplicaciones v-if="mostrarComponente === 10"/>
            <EditAplicaciones v-if="mostrarComponente === 11"/>
            <CrearAplicaciones v-if="mostrarComponente === 12"/>

            <!--COMPONENTES CONTACTO -->
            <ShowContactos v-if="mostrarComponente === 13"/>

            <!--COMPONENTES USUARIOS -->
            <ShowUsuarios v-if="mostrarComponente === 14"/>
            <CrearUsuario v-if="mostrarComponente === 15"/>
            <EditUsuario v-if="mostrarComponente === 16"/>

            <!--COMPONENTES SUSCRIPCION -->
            <ShowSuscripciones v-if="mostrarComponente === 17"/>
            <EnviarSuscripciones v-if="mostrarComponente === 18"/>

            <!--COMPONENTES LOGOS -->
            <ShowLogos v-if="mostrarComponente === 19"/>

          

            <!--COMPONENTES SERVICIOS -->
            <ShowServicios v-if="mostrarComponente === 21"/>
            <EditServicio v-if="mostrarComponente === 22"/>

            <!--COMPONENTES PRODUCTOS -->
            <CrearProducto v-if="mostrarComponente === 23"/>








        </div>


    </div>
</template>

<script>
import ShowSlider from "@/components/admin/home/sliderHome/ShowSlider.vue";
import EditSlider from "@/components/admin/home/sliderHome/EditSlider.vue";
import ShowCategorias from "@/components/admin/home/categorias/ShowCategorias.vue";
import EditCategoria from "@/components/admin/home/categorias/EditCategoria.vue";
import EditBanner from "@/components/admin/home/banner/EditBanner.vue";
import ShowSeccionesNosotros from "@/components/admin/nosotros/seccion/ShowSeccionesNosotros.vue";
import EditSeccionesNosotros from "@/components/admin/nosotros/seccion/EditSeccionesNosotros.vue";
import ShowAplicaciones from "@/components/admin/aplicaciones/ShowAplicaciones.vue";
import CrearAplicaciones from "@/components/admin/aplicaciones/CrearAplicaciones.vue";
import EditAplicaciones from "@/components/admin/aplicaciones/EditAplicaciones.vue";
import Alerta from "@/components/admin/alerta/Alerta.vue";
import ShowContactos from "@/components/admin/contactos/ShowContactos.vue";
import ShowUsuarios from "@/components/admin/usuario/ShowUsuarios.vue";
import CrearUsuario from "@/components/admin/usuario/CrearUsuario.vue";
import EditUsuario from "@/components/admin/usuario/EditUsuario.vue";
import ShowSuscripciones from "@/components/admin/suscripciones/ShowSuscripciones.vue";
import EnviarSuscripciones from "@/components/admin/suscripciones/EnviarSuscripciones.vue";
import ShowLogos from "@/components/admin/logos/ShowLogos.vue";
import CrearProducto from "@/components/admin/productos/CrearProducto.vue";
import EditServicio from "@/components/admin/home/servicios/EditServicio.vue";
import ShowServicios from "@/components/admin/home/servicios/ShowServicios.vue";


export default {
    components: {
        ShowSlider,
        EditSlider,
        ShowCategorias,
        EditCategoria,
        EditBanner,
        ShowSeccionesNosotros,
        EditSeccionesNosotros,
        ShowAplicaciones,
        CrearAplicaciones,
        EditAplicaciones,
        Alerta,
        ShowContactos,
        ShowUsuarios,
        CrearUsuario,
        EditUsuario,
        EnviarSuscripciones,
        ShowSuscripciones,
        ShowLogos,
        CrearProducto,
        EditServicio,
        ShowServicios
    },
  
    computed:{
        mostrarComponente(){
            return this.$store.getters['getMostrarComponente'];
        },

        mostrarAlerta(){
            return this.$store.getters['getMostrarAlerta'];
        },

    },
    methods:{
        mostrarComponenteF(idComponente){
            this.$store.commit('mostrarComponente', idComponente);
        }
    }




};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Bona+Nova&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,300;0,700;1,300;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:wght@100;400;500;600;700&display=swap');

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

a {
    text-decoration: none !important;
}

li {
    list-style: none;
}

.user-avatar {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    overflow: hidden;
}

body {
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
    line-height: 1.5;
    font-size: 0.88rem !important;
    color: #6c757d;
}

.wrapper {
    display: flex;
    width: 100%;
}

.main {
    width: 100%;
    flex-direction: column;
    min-height: 100vh;
}

.sidebar {
    overflow-y: scroll;
    background-color: rgb(52, 68, 127);
    height: 100%;
    width: 15rem;
    z-index: 1000;
    position: fixed;
    top: 0;
    left: 0;
    transform: translateX(-15rem);
    transition: all 300ms ease-in-out;
}

.sidebar::-webkit-scrollbar {
    width: 3px;
}

/* Sidebar collapsed */

.sidebar.hide {
    transform: translateX(0);
}

/* Sidebar collapsed end */

.sidebar-brand {
    color: #fff;
    display: flex;
    justify-content: center;
    font-size: 1.125rem;
    font-weight: 500;
    gap: 0.6rem;
    padding: 1.15rem 1.15rem;
    align-items: center;
}

.sidebar-brand svg {
    fill: #4a88eb;
    height: 24px;
    width: 24px;
}

.sidebar-nav {
    flex-direction: column;
    flex-wrap: nowrap;
    list-style: none;
    padding-left: 0;
    font-size: 0.9rem;
    color: #fff;
    height: 100%;
}

.shadow-right {
    box-shadow: 0.15rem 0 1.75rem 0 rgba(33, 40, 50, 0.15);
}

.sidebar-header {
    color: white;
    padding: 1.75rem 1rem 0.75rem;
    font-size: 0.75rem;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.05;
}


.nav-link {
    display: flex;
    align-items: center;
    line-height: normal;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    font-size: 0.825rem;
    position: relative;
    color: white;
}

.nav-link-icon {
    font-size: 0.9rem;
    padding-right: 0.5rem;
    display: inline-flex;
    margin-right: 0.5rem;
}

.nav-link-icon svg {
    width: 14px;
    height: 14px;
}

/**/
.nav-link.active {
    color: white !important;
}



.navbar-nav .nav-link:hover {
    color: rgba(233, 236, 239, 0.884) !important;

}

.nav-link:focus,
.nav-link:hover {
    color: white
}

/**/
.sidebar-item.active .nav-link:hover,
.sidebar-item.active>.nav-link {
    color: white;
}

.nav-link:hover {
    color: white
}

.nav-lin:focus,
.nav-link:hover {
    color: white !important;
}

/*
.sidebar-nav .sidebar-item.active{
    
}*/

.sidenav-collapse-arrow {
    display: inline-block;
    margin-left: auto;
    transition: transform 0.15s ease;
}

.sidenav-collapse-arrow i {
    font-size: 12px;
}

.nav-link.collapsed .sidenav-collapse-arrow {
    transform: rotate(-90deg);
}

.sidenav-menu-nested {
    flex-direction: column;
    margin-left: 1.4375rem;
    border-left-style: solid;
    border-left-width: thin;
    border-color: white;
    padding-left: 0.5625rem !important;
}

.sidenav-menu-nested .nav-link {
    color: #6c757d;
    font-weight: 400;
}

.nav-link,
a.nav-link {
    cursor: pointer;
    transition: color 300ms ease-in-out;
}

/* Topbar */

.main {
    /* ===== */
    position: relative;
    width: 100%;
    left: 0;
    min-height: 100vh;
    transition: all 300ms ease-in-out;
}

.sidebar.hide~.main {
    width: calc(100% - 15rem);
    ;
    left: 15rem;
}

.topbar {
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, .15);
    /*height: 4.375rem;*/
    padding: 0 !important;
}

.container-fluid .navbar-nav {
    flex-direction: row !important;
}

button {
    outline: 0 !important
}

.button-toggle-menu {
    color: #6c757d;
    border: none;
    width: 60px;
    background-color: transparent;
    font-size: 20px;
    position: relative;
}

.app-search form .form-control {
    color: #6c757d;
    background-color: #f0f3f8;
    border: none;
    padding-left: 40px;
    padding-right: 20px;
    box-shadow: none;
}

.search-icon {
    line-height: 35px;
    left: 10px;
    top: 0;
    z-index: 20;
    color: white;
}

.search-btn {
    color: #fff !important;
    background-color: #727cf5 !important;
    border-top-right-radius: 0.15rem !important;
    border-bottom-right-radius: 0.15rem !important;
    border-color: #727cf5 !important;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.125) !important;
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
}

.search-btn:hover {
    background-color: #6973e3 !important;
    border-color: #6973e3 !important;
}

.topbar-divider {
    width: 0;
    border-right: 1px solid #e3e6f0;
    margin: auto 1rem;
    height: calc(4.375rem - 2rem);
}

.nav-user {
    border: solid #e3e6f0;
    border-width: 0 1px;
    gap: 10px;
    background-color: #fafafd !important;
    overflow: hidden;
}

.topbar .nav-link {
    height: 4.375rem;
    display: flex;
    align-items: center;
    padding: 0 0.75rem;
    cursor: pointer;
    position: relative;
}

.dropdown-menu .dropdown-item {
    display: flex;
    align-items: center;
}

/* Main section */

.container-fluid {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

.border-left-primary {
    border-left: 0.25rem solid #293042 !important;
}

.text-xs {
    font-size: .7rem;
}

.font-weight-bold {
    font-weight: 400 !important;
}

.text-primary {
    color: var(--primary);
}

.stat {
    background: #e0eafc;
    border-radius: 50%;
    height: 48px;
    padding: 0.75rem;
    width: 48px;
    font-size: 1.5rem;
}

.stat:before {
    display: flex;
    justify-content: center;
}

.card-title {
    color: #495057;
    font-size: .95rem;
    font-weight: 500;
}

.equivalencia-fila {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.eliminar-equivalencia {
    margin-top: 5px;
}

.equivalencia-rectangulo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-right: 10px;
    padding: 10px 20px;
    cursor: pointer;
    background-color: #f9f9f9;
    border-radius: 8px;
    margin-top: 10px;
}

.equivalencia-nombre {
    color: #484848;
    font-size: 16px;
    font-weight: 400;
    line-height: 140%;
}

.equivalencia_codigo {
    color: #0C0C0C;
    font-size: 16px;
    font-weight: 500;
    line-height: 140%;
}

.aplicacion-box {
    min-height: 215px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border-radius: 8px;
    padding: 15px;
    background: #F4F4F4;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.datos-aplicacion {
    color: #0C0C0C;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
}

.year-aplicacion,
.posicion-aplicacion {
    color: #0C0C0C;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 140%;

}

.aplicacion-box:hover {
    transform: scale(1.05);
}

.aplicacion-box p {
    margin: 0;
}

.eliminar-aplicacion {
    margin-top: 10px;
}

#aplicaciones-container {
    display: flex;
    flex-wrap: wrap;
}

/** video **/
.slider-video {
    width: 100%;
    height: auto;
    margin: 0;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

@media (min-width:992px) {
    .sidebar {
        transform: translate(0);
    }

    .sidebar.hide {
        transform: translateX(-15rem);
    }

    .main {
        width: calc(100% - 15rem);
        left: 15rem;
    }

    .sidebar.hide~.main {
        width: 100%;
        left: 0rem;
    }
}

@media (max-width: 767.98px) {
    .wrapper {
        overflow-y: hidden;
    }

    .sidebar.hide~.main {
        width: 100%;
        left: 15rem;
    }

}
</style>