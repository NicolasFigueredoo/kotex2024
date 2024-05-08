<template>
    <div class="adminPanel-view">
      

        <div class="div1">
                <nav id="sidebar" class="sidebar bg-body-light shadow-right" style="height: 100vh;" >
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
                                        <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                            <path fill="#ffffff" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
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
                                        <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                            <path fill="#ffffff" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
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
                            <a @click="mostrarComponenteF(23)"  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCatalogo"
                                aria-expanded="false" aria-controls="collapseCatalogo">
                                <div class="nav-link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 576 512">
                                        <path fill="#ffffff" d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z"/></svg>
                                </div>
                                <span>Catalogo</span>
                                <div class="sidenav-collapse-arrow">
                                    <i class="fa-solid fa-angle-down"></i>
                                </div>
                            </a>
                        
                        </li>
    
                        <li class="sidebar-item">
                            <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProductos"
                                aria-expanded="false" aria-controls="collapseProductos">
                                <div class="nav-link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 640 512">
                                        <path fill="#ffffff" d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z"/></svg>
                                </div>
                                <span>Productos</span>
                                <div class="sidenav-collapse-arrow">
                                        <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                            <path fill="#ffffff" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                                </div>
                            </a>
                            <div id="collapseProductos" class="collapse">
                                <nav  class="sidenav-menu-nested nav accordion">
                                    <a @click="mostrarComponenteF(25)" class="nav-link">Mostrar</a>
                                </nav>
                            </div>
                            <div id="collapseProductos" class="collapse">
                                <nav  class="sidenav-menu-nested nav accordion">
                                    <a @click="mostrarComponenteF(24)" class="nav-link">Crear</a>
                                </nav>
                            </div>
                        </li>
    
                        <li class="sidebar-item">
                            <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseAplicaciones"
                                aria-expanded="false" aria-controls="collapseAplicaciones">
                                <div class="nav-link-icon">
    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 576 512">
                                        <path fill="#ffffff" d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg>
                            
                           
                                </div>
                                <span>Aplicaciones</span>
                                <div class="sidenav-collapse-arrow">
                                        <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                            <path fill="#ffffff" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
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
    
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path fill="#ffffff" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                </div>
                                <span>Contacto</span>
                                <div class="sidenav-collapse-arrow">
                                    <i class="fa-solid fa-angle-down"></i>
                                </div>
                            </a>
                      
                        </li>
    
                        <li class="sidebar-item">
                            <a @click="mostrarComponenteF(19)" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseLogos"
                                aria-expanded="false" aria-controls="collapseLogos">
                                <div class="nav-link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path fill="#ffffff" d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg>
                                </div>
                                <span>Logos</span>
                                <div class="sidenav-collapse-arrow">
                                    <i class="fa-solid fa-angle-down"></i>
                                </div>
                            </a>
                        
                      
                        </li>
                    
    
                        <hr class="mx-3 mt-5">
                        <li class="sidebar-item">
                            <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseUsuario"
                                aria-expanded="false" aria-controls="collapseUsuario">
                                <div class="nav-link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 640 512">
                                        <path fill="#ffffff" d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v17.7c0 7.8 4.8 14.8 11.6 18.7c6.8 3.9 15.1 4.5 21.8 .6l13.8-7.9c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-14.4 8.3c-6.5 3.7-10 10.9-10 18.4s3.5 14.7 10 18.4l14.4 8.3c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-13.8-7.9c-6.7-3.9-15.1-3.3-21.8 .6c-6.8 3.9-11.6 10.9-11.6 18.7v17.7c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V467.8c0-7.9-4.9-14.9-11.7-18.9c-6.8-3.9-15.2-4.5-22-.6l-13.5 7.8c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l14-8.1c6.5-3.8 10.1-11.1 10.1-18.6s-3.5-14.8-10.1-18.6l-14-8.1c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l13.6 7.8c6.8 3.9 15.2 3.3 22-.6c6.9-3.9 11.7-11 11.7-18.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z"/></svg>
                                </div>
                                <span>Usuarios</span>
                                <div class="sidenav-collapse-arrow">
                                        <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                            <path fill="#ffffff" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                                </div>
                            </a>
                            <div id="collapseUsuario" class="collapse">
                                <nav  class="sidenav-menu-nested nav accordion">
                                    <a @click="mostrarComponenteF(14)" class="nav-link">Mostrar</a>
                                </nav>
                            </div>
                            <div v-if="this.rol == 'administrador'" id="collapseUsuario" class="collapse">
                                <nav class="sidenav-menu-nested nav accordion">
                                    <a @click="mostrarComponenteF(15)" class="nav-link ">Crear</a>
                                </nav>
                            </div>
                        </li>
                        <li class="sidebar-item">
                            <a  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSuscripciones"
                                aria-expanded="false" aria-controls="collapseSuscripciones">
                                <div class="nav-link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path fill="#ffffff" d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
                                </div>
                                <span>Suscripciones</span>
                                <div class="sidenav-collapse-arrow">
                                        <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                            <path fill="#ffffff" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
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
                            <a @click="mostrarComponenteF(27)"  class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseMetadatos"
                                aria-expanded="false" aria-controls="collapseMetadatos">
                                <div class="nav-link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 640 512">
                                        <path fill="#ffffff" d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 65.1c-37.8 5.4-69.4 29.6-85.2 62.9L360 224l0 64 56 0 0 8.6c-19.1 11.1-32 31.7-32 55.4l-24 0 0 64 24 0 0 64L64 480c-35.3 0-64-28.7-64-64L0 96zM64 224l0 64 88 0 0-64-88 0zm232 0l-88 0 0 64 88 0 0-64zM152 352l-88 0 0 64 88 0 0-64zm56 0l0 64 88 0 0-64-88 0zM528 240c-17.7 0-32 14.3-32 32l0 48 64 0 0-48c0-17.7-14.3-32-32-32zm-80 32c0-44.2 35.8-80 80-80s80 35.8 80 80l0 48c17.7 0 32 14.3 32 32l0 128c0 17.7-14.3 32-32 32l-160 0c-17.7 0-32-14.3-32-32l0-128c0-17.7 14.3-32 32-32l0-48z"/></svg>
                                </div>
                                <span>Metadatos</span>
                             
                            </a>
                        
                        </li>
                      
                      
        
        
                    </ul>
                </nav>
        <div class="div2">
            <div>
                <nav class="navbar navbar-expand-lg bg-body-light topbar mb-4" >
            <div class="container-fluid px-2">
                <div class="d-flex align-items-center gap-lg-2">
                    <button class="button-toggle-menu" id="sidebarToggle">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                </div>
                <div class="">
                    <ul class="navbar-nav ms-automb-lg-0">

                        <div class="p-2 mt-2">
                            <p>Bienvenido {{ this.nombre }}</p>

                        </div>

                        <div class="p-2">
                            <button @click="logout()" type="button" class="btn btn-danger ">Salir</button>
                        </div>


                    </ul>
                </div>
            </div>
        </nav>

            </div>
            <div class="componentesV" style=" max-height: 800px; 
    overflow-y: auto;">
                
                            <Alerta style="position: fixed; z-index: 5;" v-if="mostrarAlerta === true"/>
                            <InicioAdmin v-if="mostrarComponente === 0"/>
                
                            <!--COMPONENTES HOME -->
                            <ShowSlider v-if="mostrarComponente === 1"/>
                            <EditSlider v-if="mostrarComponente === 2"/>
                            <ShowCategorias v-if="mostrarComponente === 3"/>
                            <EditCategoria v-if="mostrarComponente === 4"/>
                            <EditBanner v-if="mostrarComponente === 5"/>
                
                            <!--COMPONENTES NOSOTROS -->
                            <ShowSliderN v-if="mostrarComponente === 6"/>
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
                
                            <!--COMPONENTES CATALOGO -->
                            <ShowCatalogo v-if="mostrarComponente === 23"/>
                
                
                
                            <!--COMPONENTES PRODUCTOS -->
                            <CrearProducto v-if="mostrarComponente === 24"/>
                            <ShowProductos v-if="mostrarComponente === 25"/>
                            <EditProducto v-if="mostrarComponente === 26"/>
                
                            <!--COMPONENTES METADATOS -->
                            <MetaDatos v-if="mostrarComponente === 27"/>
                            <EditMetadatos v-if="mostrarComponente === 28"/>

                            <CrearSlider v-if="mostrarComponente === 29"/>
                            <CrearServicio v-if="mostrarComponente === 30"/>


            </div>



        </div>

            


        </div>


    </div>
</template>

<script>

import ShowSlider from "@/components/admin/home/sliderHome/ShowSlider.vue";
import ShowSliderN from "@/components/admin/home/sliderHome/ShowSliderN.vue";
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
import EditServicio from "@/components/admin/home/servicios/EditServicio.vue";
import ShowServicios from "@/components/admin/home/servicios/ShowServicios.vue";
import ShowCatalogo from "@/components/admin/catalogo/ShowCatalogo.vue";
import CrearProducto from "@/components/admin/productos/CrearProducto.vue";
import ShowProductos from "@/components/admin/productos/ShowProductos.vue";
import EditProducto from "@/components/admin/productos/EditProducto.vue";
import InicioAdmin from "@/components/admin/inicio/InicioAdmin.vue";
import MetaDatos from "@/components/admin/metadatos/MetaDatos.vue";
import EditMetadatos from "@/components/admin/metadatos/EditMetadatos.vue";

import axios from "axios";
import CrearSlider from "@/components/admin/home/sliderHome/CrearSlider.vue";
import CrearServicio from "@/components/admin/home/servicios/CrearServicio.vue";

export default {
    components: {
        InicioAdmin,
        ShowSliderN,
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
        EditServicio,
        ShowServicios,
        ShowCatalogo,
        CrearProducto,
        ShowProductos,
        EditProducto,
        MetaDatos,
        EditMetadatos,
        CrearSlider,
        CrearServicio
    },

    data(){
        return{
            rol: null
        }
    },
  
    computed:{
        mostrarComponente(){
            return this.$store.getters['getMostrarComponente'];
        },

        mostrarAlerta(){
            return this.$store.getters['getMostrarAlerta'];
        },

        getIdLogin(){
            return this.$store.getters['getIdLogin'];
        },

    },
    methods:{
        logout(){
            this.$router.push('/admin/login');
            localStorage.setItem('idLogin', JSON.stringify(null));

        },
        obtenerUsuario(){
            axios.get(`/api/obtenerIdUsuario/${this.getIdLogin}`)
                .then(response => {
                    this.rol = response.data.rol
                    this.nombre = response.data.usuario
                })
                .catch(error => {
                    console.error(error);
                });
        },
        mostrarComponenteF(idComponente){
            this.$store.commit('mostrarComponente', idComponente);
        }
    },
    mounted(){
        this.obtenerUsuario();
        if(this.getIdLogin == null){
            this.$router.push('/admin/login');
        }
    }




};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Bona+Nova&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,300;0,700;1,300;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:wght@100;400;500;600;700&display=swap');

.componentesV{
    width: 72%;
    margin-left: 5%;
}
.div1{
    display: flex;
}
.div2{
    display: flex;
    flex-direction: column;
    width: 100%;
}

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

.nav-link.collapsed .sidenav-collapse-arrow {
    transform: rotate(180deg);
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