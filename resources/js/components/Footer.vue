<template>
  <footer>
    <div class="footer">

        <div class="logoRedes">
            <img :src="getImagen(this.imagenLogo)" alt="">
            <div class="iconos">
                <a :href="facebook" target="_blank"><font-awesome-icon class="iconFooter" :icon="['fab', 'facebook-f']" /></a>
                <a :href="instagram" target="_blank"><font-awesome-icon class="iconFooter" :icon="['fab', 'instagram']" /></a>
            </div>
        </div>
        <div class="textoEmpresa">
            <p id="tituloSecciones">Secciones</p>
            <p @click="this.$router.push('/nosotros');">Nosotros</p>
            <p @click="this.$router.push('/productosdelinea');" >Productos de linea</p>
            <p @click="this.$router.push('/productosespeciales');">Productos Especiales</p>
            <p @click="this.$router.push('/catalogo');">Catalogo</p>
        </div>
        <div class="textoEmpresa2">
            <p @click="this.$router.push('/aplicaciones');">Aplicaciones</p>
            <p @click="this.$router.push('/home#service');">Servicios</p>
            <p @click="this.$router.push('/presupuesto');">Presupuesto</p>
            <p @click="this.$router.push('/contacto');">Contacto</p>
        </div>
        <div class="textoEmpresa3">
            <p>Suscribite al Newsletter</p>
            <div class="input-group mb-3">
            <input v-model="emailSuscripcion" style="border-radius:0px;" id="kotex" type="email" class="form-control inputRow" placeholder="Ingresa tu Email" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button style="border-radius:0px;" class="btn botonRow" type="button" id="button-addon2" @click="agregarSuscripcion()"><font-awesome-icon class="rowInput" :icon="['fas', 'arrow-right']"  /></button>
        </div>
            </div>
        <div class="textoEmpresa4">
            <p class="title4">Contacto</p>
            <div class="iconInfo">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-geo-alt iconEnd" viewBox="0 0 16 16">
                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
                <p>{{ direccion }}</p></div>
            <div class="iconInfo">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-telephone iconEnd" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                </svg>
                <p>{{ telefono }}</p></div>
            <div class="iconInfo">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-whatsapp iconEnd" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                </svg>
                <p>{{ whatsapp }}</p></div>
            <div class="iconInfo"><font-awesome-icon class="iconEnd" :icon="['far', 'envelope']" /><p>{{ email }}</p></div>

        </div>

        
    </div>
    
    <div class="textoEmpresa5">
    <p>© Copyright 2024 kotex S.R.L. Todos los derechos reservados</p>
    <a class="osole" href="https://osole.com.ar/"><p>By osole</p></a>
    </div>
    </footer>
   
</template>

<script>
import axios from "axios";

export default {
    data(){
        return{
            emailSuscripcion: null,
            telefono: null,
            whatsapp: null,
            email: null,
            facebook:null,
            instagram:null,
            whatsappLink: null,
            direccion: null,
            imagenLogo: null
        }
    },
    methods:{
        getImagen(fileName){
      if(fileName){
        const filePath = fileName.split('/').pop();
        return '/api/getImage/' + filePath
      }

    },
    obtenerLogo(){
      axios.get(`/api/obtenerLogos`)
        .then(response => {
          this.imagenLogo = response.data.imagen2
        })
        .catch(error => {
          console.error('Error al traer los contactos:', error);
        });
    },
        obtenerContacto(){
      axios.get(`/api/obtenerContacto`)
        .then(response => {
          this.telefono = response.data[0].telefono
          this.whatsapp = response.data[0].whatsapp
          this.email = response.data[0].email
          this.facebook = response.data[0].facebook
          this.instagram = response.data[0].instagram
          this.direccion = response.data[0].direccion



        })
        .catch(error => {
          console.error('Error al traer los contactos:', error);
        });
    },
        agregarSuscripcion(){


            axios.post(`/api/agregarSuscripcion`,{
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
    mounted(){
        this.obtenerContacto();
        this.obtenerLogo();
    }

}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');


.iconoR{
    margin-top: 10px;
}
.textoEmpresa5{
    padding-top: 10px;
    padding-right: 50px;
    padding-left: 17.5%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    background-color: #2F3F78;
    color: rgba(255, 255, 255, 0.8);
    font-family: "Montserrat", sans-serif;
    font-size: 14px;

}
.iconEnd{
    margin-right: 20px;
    font-size: 23px;
}
.iconInfo{
    display: flex;
}
.title4{
    font-size: 20px;
}
.textoEmpresa4{
    margin-right: 17%;
    margin-top: 50px;
    color: white;
    font-family: "Montserrat", sans-serif;
    font-weight: 400px;
    font-size: 15px;

}
.iconRow{
    background-color: white;
    color: #33447F;
    font-size: 30px;
}
input{
    width: 250px;
    height: 50px;
}
.textoEmpresa3 p{
    font-size: 30px;
    font-family: "Montserrat", sans-serif;
    font-weight: 500px;
    width: 240px;
}
.textoEmpresa3{
    padding: 40px;
    margin-top: 10px;
    
}

.textoEmpresa3 p{
    font-family: "Montserrat", sans-serif;
    font-weight: 400px;
    font-size: 20px;
    color: white;
    cursor: pointer;

    
}

.textoEmpresa3 input{
    padding-left: 20px;

}

.textoEmpresa2{
    margin-top: 105px;
    margin-left: 50px;
    color: rgba(255, 255, 255, 0.8);
    font-family: "Montserrat", sans-serif;
    font-size: 15px;
}


#tituloSecciones{
    font-size: 20px;
    color: white;
}
.textoEmpresa{
    margin-top: 60px;
    margin-left: 270px;
    padding-left: 25px;
    color: rgba(255, 255, 255, 0.8); 
    border-left: 1px solid rgba(255, 255, 255, 0.3);
    height: 250px;
    font-family: "Montserrat", sans-serif;
    font-size: 15px;
    width: 200px;
}

.textoEmpresa p:hover{
    color:white;
    cursor: pointer;

    
}

.textoEmpresa2 p:hover{
    color:white;
    cursor: pointer;

}
.iconEnd:hover{
    transform: scale(1.2); 

}
.iconos{
    display: flex;
    justify-content: center;
    margin-left: 115%;
    font-size: 15px;
}
.iconFooter{
    color: white;
    font-size: 30px;
    margin-left: 20px;
}
.logoRedes img{
    margin: 50px;
    width: 280px;
    height: 120px;
    margin-left: 76%;
}
.logoRedes{
    width: 400px;
    display: flex;
    flex-direction: column;
}
.footer{
    display: flex;
    background-color: #33447F;
    height: 350px;
    width: 100%;

}


.inputRow{
    border-radius: 0%;

}
.botonRow{
    border-radius: 0%;
    background-color: white !important;
}
.rowInput{
    color: #2F3F78;
}
.osole{
    margin-right: 19%;
    text-decoration: none;
    color: white;
}


@media only screen and (max-width: 450px) {
.logoRedes{
    width: 100%
}

}

@media only screen and (max-width: 1100px) {

    .logoRedes{
        margin-left: 0px;
    }

    .logoRedes img{
        margin-left: 0px;
        margin: 0px;
    }

    .textoEmpresa{
        margin-top: 0px;
        margin-left: 0px;
        font-size: 8px;
        height: 100%;
        border: none;

    }


    .textoEmpresa2{
        margin-left: 25px;
        margin-top: 0px;
        height: 100%;
        font-size: 8px;

    }

    .textoEmpresa3{
        margin-left: 0px;
        font-size: 8px;
        margin-top: 0px;
        height: 100%;

    }

    .textoEmpresa4{
        margin-left: 25px;
        font-size: 8px;
        margin-top: 0px;
        height: 100%;

    }

    .footer{
        display: row;
        flex-direction: column;
        height: 100%;
    }

    .iconInfo p{
        font-size: 8px;
    }

    .textoEmpresa5{
        padding-right: 0px;
        padding-left: 10px;
    }
}





@media only screen and (max-width: 1500px) {
    .logoRedes img{
        margin-left: 0px;

    }

    .iconos{
        margin-left: 0px;
        
    }

    .textoEmpresa{
        margin-left: 0px;
        font-size: 15px
    }

}
</style>