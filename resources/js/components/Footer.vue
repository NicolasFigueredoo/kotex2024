<template>
    <footer>
        <div class="footer">
            <div class="container d-flex">

                <div class="row w-100" style="padding-bottom: 20px;">
                    <div class="col-lg-3 logoRedes" style="margin-top:60px;">
                        <img :src="getImagen(this.imagenLogo)" alt="">
                        <div class="iconos">
                            <a :href="facebook" target="_blank"><font-awesome-icon class="iconFooter"
                                    :icon="['fab', 'facebook-f']" /></a>
                            <a :href="instagram" target="_blank"><font-awesome-icon class="iconFooter"
                                    :icon="['fab', 'instagram']" style="margin-left: 10px" /></a>
                        </div>
                    </div>
                    <div class="col-lg-2 textoEmpresa" style="margin-top:74px; height: 196px">
                        <p id="tituloSecciones">Secciones</p>
                        <p @click="this.$router.push('/nosotros');">Nosotros</p>
                        <p @click="this.$router.push('/productosdelinea');">Productos de linea</p>
                        <p @click="this.$router.push('/productosespeciales');">Productos Especiales</p>
                        <p @click="this.$router.push('/catalogo');">Catalogo</p>
                    </div>
                    <div class="col-lg-1 textoEmpresa2" style="margin-top:120px;">
                        <p @click="this.$router.push('/aplicaciones');">Aplicaciones</p>
                        <p @click="this.$router.push('/home#service');">Servicios</p>
                        <p @click="this.$router.push('/presupuesto');">Presupuesto</p>
                        <p @click="this.$router.push('/contacto');">Contacto</p>
                    </div>
                    <div class="col-lg-3 textoEmpresa3" style="margin-top:74px; padding-left:30px;">
                        <p>Suscribite al Newsletter</p>
                        <div class="input-group mb-3">
                            <input v-model="emailSuscripcion" style="border-radius:0px;" id="kotex" type="email"
                                class="form-control inputRow" placeholder="Ingresa tu Email"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button style="border-radius:0px;" class="btn botonRow" type="button" id="button-addon2"
                                @click="agregarSuscripcion()"><font-awesome-icon class="rowInput"
                                    :icon="['fas', 'arrow-right']" /></button>
                        </div>
                    </div>
                    <div class="col-lg-3 textoEmpresa4" style="margin-top:74px">
                        <p class="title4">Contacto</p>
                        <div class="d-flex" style="cursor: pointer;">
                            <div style="width: 20px;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none" class="iconEnd">
                                    <path
                                        d="M16.6668 8.33335C16.6668 13.3334 10.0002 18.3334 10.0002 18.3334C10.0002 18.3334 3.3335 13.3334 3.3335 8.33335C3.3335 6.56524 4.03588 4.86955 5.28612 3.61931C6.53636 2.36907 8.23205 1.66669 10.0002 1.66669C11.7683 1.66669 13.464 2.36907 14.7142 3.61931C15.9645 4.86955 16.6668 6.56524 16.6668 8.33335Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M10 10.8333C11.3807 10.8333 12.5 9.71402 12.5 8.33331C12.5 6.9526 11.3807 5.83331 10 5.83331C8.61929 5.83331 7.5 6.9526 7.5 8.33331C7.5 9.71402 8.61929 10.8333 10 10.8333Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="textoF">{{ direccion }}</p>
                        </div>
                        <div class="d-flex" style="cursor: pointer;">
                            <div style="width: 20px;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none" class="iconEnd">
                                    <g clip-path="url(#clip0_3002_210)">
                                        <path
                                            d="M18.3332 14.1V16.6C18.3341 16.8321 18.2866 17.0618 18.1936 17.2744C18.1006 17.4871 17.9643 17.678 17.7933 17.8349C17.6222 17.9918 17.4203 18.1112 17.2005 18.1856C16.9806 18.2599 16.7477 18.2875 16.5165 18.2666C13.9522 17.988 11.489 17.1118 9.32486 15.7083C7.31139 14.4289 5.60431 12.7218 4.32486 10.7083C2.91651 8.53432 2.04007 6.05914 1.76653 3.48331C1.7457 3.25287 1.77309 3.02061 1.84695 2.80133C1.9208 2.58205 2.03951 2.38055 2.1955 2.20966C2.3515 2.03877 2.54137 1.90224 2.75302 1.80875C2.96468 1.71526 3.19348 1.66686 3.42486 1.66665H5.92486C6.32928 1.66267 6.72136 1.80588 7.028 2.06959C7.33464 2.3333 7.53493 2.69952 7.59153 3.09998C7.69705 3.90003 7.89274 4.68558 8.17486 5.44165C8.28698 5.73992 8.31125 6.06407 8.24478 6.37571C8.17832 6.68735 8.02392 6.9734 7.79986 7.19998L6.74153 8.25831C7.92783 10.3446 9.65524 12.072 11.7415 13.2583L12.7999 12.2C13.0264 11.9759 13.3125 11.8215 13.6241 11.7551C13.9358 11.6886 14.2599 11.7129 14.5582 11.825C15.3143 12.1071 16.0998 12.3028 16.8999 12.4083C17.3047 12.4654 17.6744 12.6693 17.9386 12.9812C18.2029 13.2931 18.3433 13.6913 18.3332 14.1Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_3002_210">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>

                            <p class="textoF">{{ telefono }}</p>
                        </div>
                        <div class="d-flex" style="cursor: pointer;" @click="abrirWsp()">
                            <div style="width: 20px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" class="iconEnd">
                                    <path
                                        d="M7.25399 18.494L7.97799 18.917C9.19893 19.6291 10.5876 20.0029 12.001 20C13.5832 20 15.13 19.5308 16.4456 18.6518C17.7611 17.7727 18.7865 16.5233 19.392 15.0615C19.9975 13.5997 20.156 11.9911 19.8473 10.4393C19.5386 8.88743 18.7767 7.46197 17.6578 6.34315C16.539 5.22433 15.1136 4.4624 13.5617 4.15372C12.0099 3.84504 10.4013 4.00346 8.93952 4.60896C7.47771 5.21447 6.22828 6.23984 5.34923 7.55544C4.47018 8.87103 4.00099 10.4177 4.00099 12C3.99807 13.4139 4.37226 14.8029 5.08499 16.024L5.50699 16.748L4.85399 19.149L7.25399 18.494ZM2.00499 22L3.35699 17.032C2.46608 15.5049 1.99804 13.768 2.00099 12C2.00099 6.477 6.47799 2 12.001 2C17.524 2 22.001 6.477 22.001 12C22.001 17.523 17.524 22 12.001 22C10.2338 22.0029 8.49765 21.5352 6.97099 20.645L2.00499 22ZM8.39199 7.308C8.52599 7.298 8.66099 7.298 8.79499 7.304C8.84899 7.308 8.90299 7.314 8.95699 7.32C9.11599 7.338 9.29099 7.435 9.34999 7.569C9.64799 8.245 9.93799 8.926 10.218 9.609C10.28 9.761 10.243 9.956 10.125 10.146C10.065 10.243 9.97099 10.379 9.86199 10.518C9.74899 10.663 9.50599 10.929 9.50599 10.929C9.50599 10.929 9.40699 11.047 9.44499 11.194C9.45899 11.25 9.50499 11.331 9.54699 11.399L9.60599 11.494C9.86199 11.921 10.206 12.354 10.626 12.762C10.746 12.878 10.863 12.997 10.989 13.108C11.457 13.521 11.987 13.858 12.559 14.108L12.564 14.11C12.649 14.147 12.692 14.167 12.816 14.22C12.878 14.246 12.942 14.268 13.007 14.286C13.0742 14.3031 13.1449 14.2999 13.2102 14.2767C13.2756 14.2536 13.3326 14.2116 13.374 14.156C14.098 13.279 14.164 13.222 14.17 13.222V13.224C14.2203 13.1771 14.28 13.1415 14.3452 13.1196C14.4104 13.0977 14.4796 13.09 14.548 13.097C14.608 13.101 14.669 13.112 14.725 13.137C15.256 13.38 16.125 13.759 16.125 13.759L16.707 14.02C16.805 14.067 16.894 14.178 16.897 14.285C16.901 14.352 16.907 14.46 16.884 14.658C16.852 14.917 16.774 15.228 16.696 15.391C16.6425 15.5022 16.5716 15.6042 16.486 15.693C16.3851 15.7989 16.2746 15.8953 16.156 15.981C16.074 16.043 16.031 16.071 16.031 16.071C15.9066 16.1499 15.7788 16.2233 15.648 16.291C15.3905 16.4278 15.1062 16.5063 14.815 16.521C14.63 16.531 14.445 16.545 14.259 16.535C14.251 16.535 13.691 16.448 13.691 16.448C12.2692 16.074 10.9544 15.3735 9.85099 14.402C9.62499 14.203 9.41499 13.989 9.20099 13.776C8.31299 12.891 7.63999 11.936 7.23099 11.034C7.0227 10.5915 6.91024 10.11 6.90099 9.621C6.89723 9.01375 7.09605 8.42257 7.46599 7.941C7.53899 7.847 7.60799 7.749 7.72699 7.636C7.85299 7.516 7.93399 7.452 8.02099 7.408C8.13666 7.35003 8.26285 7.31602 8.39199 7.308Z"
                                        fill="white" />
                                    </svg>
                                </div>
                                <p class="textoF">{{ whatsapp }}</p>


                        </div>
                        <div class="d-flex" @click="abrirEmail()" style="cursor: pointer;">
                            <div style="width: 20px;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20"
                                    fill="none" class="iconEnd">
                                    <path
                                        d="M20 3.33331H4C2.89543 3.33331 2 4.07951 2 4.99998V15C2 15.9205 2.89543 16.6666 4 16.6666H20C21.1046 16.6666 22 15.9205 22 15V4.99998C22 4.07951 21.1046 3.33331 20 3.33331Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M22 5.83331L13.03 10.5833C12.7213 10.7445 12.3643 10.83 12 10.83C11.6357 10.83 11.2787 10.7445 10.97 10.5833L2 5.83331"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="textoF">{{ email }}</p>

                        </div>

                    </div>



                </div>

            </div>

        </div>

        <div style="    background-color: #2F3F78;">
            <div class="container d-flex textoEmpresa5" style="padding-top: 15px">
                <p>© Copyright 2024 kotex S.R.L. Todos los derechos reservados</p>
                <a class="osole" href="https://osole.com.ar/">
                    <p>By osole</p>
                </a>
            </div>

        </div>
    </footer>

</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            emailSuscripcion: null,
            telefono: null,
            whatsapp: null,
            email: null,
            facebook: null,
            instagram: null,
            whatsappLink: null,
            direccion: null,
            imagenLogo: null
        }
    },
    methods: {

        abrirWsp(){

            const url = 'https://wa.me/' + this.whatsappLink ; 
            const nuevaVentana = window.open(url, '_blank');
            nuevaVentana.focus();

        },

        abrirEmail() {
            const destinatario = 'kotexsrl@hotmail.com';
            const asunto = 'Contacto desde la web de kotex';
            const cuerpo = 'Hola queria consultar';

            const mailtoLink = `mailto:${destinatario}?subject=${encodeURIComponent(asunto)}&body=${encodeURIComponent(cuerpo)}`;
            window.location.href = mailtoLink;
        },
        getImagen(fileName) {
            if (fileName) {
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }

        },
        obtenerLogo() {
            axios.get(`/api/obtenerLogos`)
                .then(response => {
                    this.imagenLogo = response.data.imagen2
                })
                .catch(error => {
                    console.error('Error al traer los contactos:', error);
                });
        },
        obtenerContacto() {
            axios.get(`/api/obtenerContacto`)
                .then(response => {
                    this.telefono = response.data[0].telefono
                    this.whatsapp = response.data[0].whatsapp
                    this.email = response.data[0].email
                    this.facebook = response.data[0].facebook
                    this.instagram = response.data[0].instagram
                    this.direccion = response.data[0].direccion

                    const trimmedText = this.whatsapp.trim();
                    const textWithoutSpacesAndHyphens = trimmedText.replace(/[\s-]/g, '');
                    this.whatsappLink = textWithoutSpacesAndHyphens;

                })
                .catch(error => {
                    console.error('Error al traer los contactos:', error);
                });
        },
        agregarSuscripcion() {


            axios.post(`/api/agregarSuscripcion`, {
                email: this.emailSuscripcion,

            })

                .then(response => {
                    $('#kotex').val('Te has suscripto a kotex')
                })
                .catch(error => {
                    console.error('Error al traer los productos:', error);
                });
        }

    },
    mounted() {
        this.obtenerContacto();
        this.obtenerLogo();
    }

}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');



.textoF:hover{
    color: white;
}

.textoF {
    padding-left: 10px;
    color: rgba(255, 255, 255, 0.8);
    font-family: Montserrat;
    font-size: 15px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.textoEmpresa5 {
    justify-content: space-between;
    color: rgba(255, 255, 255, 0.8);
    font-family: "Montserrat", sans-serif;
    font-size: 14px;

}


.title4 {
    font-size: 20px;
}

.textoEmpresa4 {
    color: white;
    font-family: "Montserrat", sans-serif;
    font-weight: 400px;
    font-size: 15px;

}

.iconRow {
    background-color: white;
    color: #33447F;
    font-size: 30px;
}

input {
    width: 250px;
    height: 50px;
}

.textoEmpresa3 p {
    font-size: 30px;
    font-family: "Montserrat", sans-serif;
    font-weight: 500px;
}

.textoEmpresa3 p {
    font-family: "Montserrat", sans-serif;
    font-weight: 400px;
    font-size: 20px;
    color: white;
    cursor: pointer;


}



.textoEmpresa2 {
    color: rgba(255, 255, 255, 0.8);
    font-family: "Montserrat", sans-serif;
    font-size: 15px;
}


#tituloSecciones {
    font-size: 20px;
    color: white;
}

.textoEmpresa {
    color: rgba(255, 255, 255, 0.8);
    border-left: 1px solid rgba(255, 255, 255, 0.3);
    height: 250px;
    font-family: "Montserrat", sans-serif;
    font-size: 15px;
}

.textoEmpresa p:hover {
    color: white;
    cursor: pointer;
}

.textoEmpresa2 p:hover {
    color: white;
    cursor: pointer;

}

.iconEnd:hover {
    transform: scale(1.2);

}

.iconos {
    display: flex;
    justify-content: center;
    font-size: 15px;
}

.iconFooter {
    color: white;
    font-size: 30px;
}

.logoRedes img {
    width: 281px;
    height: 113px;
}

.logoRedes {
    display: flex;
    flex-direction: column;
}

.footer {
    background-color: #33447F;

}


.inputRow {
    border-radius: 0%;

}

.botonRow {
    border-radius: 0%;
    background-color: white !important;
}

.rowInput {
    color: #2F3F78;
}

.osole {
    text-decoration: none;
    color: white;
}

@media only screen and (max-width: 400px) {
    .logoRedes img {
        width: 200px;
    }
}
</style>