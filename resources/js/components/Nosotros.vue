<template>
    <div>
        <div class="indicador">
            <p>Inicio > Empresa</p>
        </div>
        <div v-for="slider in sliders" :key="slider.id">
            <div  class="textoImg">
                <div v-if="slider.orden === 'aa'" v-html="this.sliders[0].texto"></div>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div v-for="slider in sliders" :key="slider.id" :class="['carousel-item', { 'active': slider.orden === 'aa'}]" style="height: 100%;" >
                    <div class="degradado"></div>
                    <img :src="getImagen(slider.imagen)"  class="d-block w-100" alt="..." style=" width: 100%;height: 100%; object-fit: cover;" >                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="informacionNosotros">
            <div class="informacion">
                <p class="titulo">{{ this.banner.titulo }}</p>
                <div class="infotext">
                    <div class="text" v-html="this.banner.texto"></div>
                </div>

            </div>
            <div class="imgInfo">
                <img :src="getImagen(this.imagenBanner)" alt="">
            </div>


        </div>
        <div class="textoElegirnos">
            <p class="titulo2">¿Porque elegirnos?</p>
            <div class="tarjetas">
                <div v-for="seccion in secciones" :key="seccion.id" class="tarjeta">
                    <div class="iconNosotros" v-html="seccion.icono"></div>
                    <p class="textoIcon">{{ seccion.titulo }}</p>
                    <div  class="infoIcon w-100" v-html="seccion.texto"> </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import axios from 'axios';
import 'bootstrap';

export default {
    name: 'Nosotros',
    data(){
        return{
            sliders: [],
            imagenBanner:'',
            banner:[],
            secciones: []

        }
    },
    methods: {
        obtenerSliders() {
            axios.get('/api/obtenerSliders')
                .then(response => {
                    this.sliders = response.data.filter(slider => slider.seccion === 'nosotros');

                })
                .catch(error => {
                    console.error(error);
                });
        },
        obtenerBannerInformacion(){
            axios.get(`/api/obtenerBanners`)
                .then(response => {
                    this.banner = response.data[1];
                    this.imagenBanner = response.data[1].imagen;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        obtenerSecciones() {
            axios.get('/api/obtenerSecciones')
                .then(response => {
                    this.secciones = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getImagen(fileName) {
            if(fileName){
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        }

    },
    mounted(){
        this.obtenerSliders();
        this.obtenerBannerInformacion();
        this.obtenerSecciones() 
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

.kotex {
    font-weight: 700;
}

.carousel-indicators .active {
    opacity: 1;
    height: 7px;
    width: 35px;
    background-color: #939393;

}

.carousel-indicators button {
    opacity: 1;
    height: 7px;
    width: 35px;
    background-color: #939393;
    opacity: 50%;

}

.carousel-indicators {
    right: 44.5%;
    margin-left: 0px;
    bottom: 100px;
    height: 10px;
}

.carousel-control-prev,
.carousel-control-next {
    display: none;
}

.infoIcon {
    padding: 10px;
    font-family: "Montserrat", sans-serif;
    font-size: 16px;
    font-weight: 400;

}

.textoIcon {
    margin-top: 40px;
    color: #33447F;
    font-size: 20px;
    font-weight: 700;
    font-family: "Montserrat", sans-serif;


}

.iconNosotros {
    margin-top: 70px;
    color: #33447F;
}

.tarjeta {
    width: 392px;
    height: 362px;
    background-color: white;
    margin-right: 45px;
    text-align: center;
    padding-left: 20px;
    padding-right: 20px;
}

.tarjetas {
    display: flex;
    justify-content: left;
    margin-left: 17%;
}

.titulo2 {
    font-size: 35px;
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
    margin-left: 17%;
    padding-top: 40px;
    padding-bottom: 20px;

}

.textoElegirnos {
    width: 100%;
    height: 580px;
    background-color: #f5f5f5;
}

.titulo {
    font-size: 35px;
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
    margin-left: 30%;
    margin-top: 20px;
}

.imgInfo img {
    width: 590px;
    height: 550px;
    filter: grayscale(100%);
}

.imgInfo {
    margin-left: 250px;

}

.informacionNosotros {
    display: flex;
    justify-content: start;
    margin-top: 45px;
    padding: 50px;
    margin-left: 100px;
}

.informacion {
    width: 600px;
}

.infotext {
    margin-top: 90px;
    margin-left: 30%;
    width: 600px;
}

.text {
    font-size: 20px;
    font-family: "Montserrat", sans-serif;
    font-weight: 400
}

.textoImg {
    margin-top: 200px;
    margin-left: 17%;
    height: 50px;
    position: absolute;
    z-index: 1;

}

.textoImg p {
    color: white;
    font-weight: 400;
    font-family: "Montserrat", sans-serif;
    font-size: 50px;
}

.indicador {
    background-color: rgba(246, 246, 246, 0.13);
    width: 100%;
    height: 80px;
    position: absolute;
    z-index: 1;
    color: black;
    margin-left: 0%;
    margin-top: 0%;
}

.indicador p {
    margin-left: 17.3%;
    margin-top: 10px;
    color: white;
    font-size: 15px;
    font-weight: 400;
    font-family: "Montserrat", sans-serif;
    line-height: 60px;
}

.carousel-inner {
    height: 500px;
}

.degradado{
  position: absolute;
    top: 0;
    left: 0;
    width: 50%; 
    height: 100%;
    background: linear-gradient(to left, rgba(0,0,0,0), rgba(0,0,0,100)); 
}
</style>