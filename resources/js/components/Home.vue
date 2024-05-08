<template>
  <div>
    <div class="container">
      <div class="textoImg" data-aos="fade-right" data-aos-duration="2000">
        <div v-for="(slider, index) in sliders" :key="slider.id">
          <div v-if="index === 0" v-html="slider.texto" class="textoSlider"></div>
        </div>


        <router-link class="route" to="/nosotros" :style="{ fontWeight: isRouteActive('/nosotros') ? 'bold' : '500' }">
          <button type="button" class="btn masInformacion">MÁS INFORMACIÓN</button>
        </router-link>
        <div class="justify-content-start carousel-indicators carousel-slider">
          <button type="button" v-for="(slider, index) in sliders" :key="slider.id"
            @click="setCurrentSlider(slider.texto, index)" :class="{ active: index === 0 }"
            data-bs-target="#carouselExampleIndicators" :data-bs-slide-to="index"
            aria-label="Slide {{ index + 1 }}"></button>
        </div>
      </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" style="overflow:hidden">


      <div class="carousel-inner">
        <div v-for="(slider, index) in sliders" :key="slider.id" :class="['carousel-item', { 'active': index === 0 }]">
          <div class="degradado"></div>
          <img :src="getImagen(slider.imagen)" class="d-block" loading="lazy" alt="..."
            style="background-size: contain; background-position: center; height: 800px;">
        </div>
      </div>

    </div>

    <div class="container seccion2">
      <div class="contenido">
        <p class="titleSeccion">{{ this.tituloCategoria }}</p>
        <div class="row d-flex imagenes"> 
          <div v-for="categoria in categoriasP" :key="categoria.id" class="col-lg-6">

            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="2000">
            <router-link class="route" to="/productosdelinea"
              :style="{ fontWeight: isRouteActive('/productosdelinea') ? 'bold' : '500' }"
              @click="this.$store.commit('setSelectedProductId', null);">
              <p class="tituloImg">{{ categoria.texto }}</p>
              <div class="imagen-contenedor">
                <img class="imgS zoomable w-100" :src="getImagen(categoria.imagen)" loading="lazy" alt="">
              </div>
            </router-link>
          </div>

        </div>

          </div>
      
      </div>

    </div>

    <div class="container-fluid">

      <div class="row empresa">
        <div class="col-lg-6 imgEmpresa" data-aos="fade-right" data-aos-duration="2000">
          <img :src="getImagen(this.imagenBanner)" alt="" loading="lazy">
        </div>
        <div class="col-lg-6 infoEmpresa">
          <p class="titulo" data-aos="fade-left" data-aos-duration="2000">{{ this.banner.titulo }}</p>
          <div class="infotext" data-aos="fade-left" data-aos-duration="2000">
            <div v-html="this.banner.texto" class="text"></div>
          </div>
          <router-link class="route" to="/nosotros"
            :style="{ fontWeight: isRouteActive('/nosotros') ? 'bold' : '500' }">
            <button type="button" class="btn masInformacion2" data-aos="fade-left"
              data-aos-duration="2000">CONÓCENOS</button>
          </router-link>
        </div>
      </div>
    </div>

    <div class="container-fluid nuestrosServicios w-100">
      <div class="container" data-aos="fade-up" data-aos-duration="2500">
        <div>
          <p class="titleServicio">Nuestros servicios</p>
        </div>
        <div class="row servicios">
          <div v-for="servicio in servicios" :key="servicio.id" class="col-lg-3 tarjeta" data-aos="flip-left"
            data-aos-duration="3000">
            <div class="iconServicio" v-html="servicio.icono"></div>
            <div class="textTarjeta" v-html="servicio.texto"> </div>
          </div>
        </div>
      </div>
    </div>




    <div class="container" style="padding-top: 80px; padding-bottom:156px">
      <div>
        <p class="titleServicio">Productos destacados</p>
      </div>

      <div id="carouselProductos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div v-for="(grupo, index) in Math.ceil(productos.length / 4)" :key="index"
            :class="['carousel-item', index === 0 ? 'active' : '']">
            <div class="row">
              <div v-for="(producto, innerIndex) in productos.slice(index * 4, (index + 1) * 4)"
                :key="producto.id_producto" class="col-lg-3">
                <div class="producto" @click="verProducto(producto.id_producto)">
                  <div>
                    <img :src="getImagen(producto.imagen)" alt="imagen" loading="lazy">
                  </div>
                  <p class="categoria">{{ producto.nombre_categoria.toUpperCase() }}</p>
                  <p class="nombre">{{ producto.nombre_producto }}</p>
                </div>
              </div>
            </div>
          </div>

        </div>



        <div class="justify-content-center carousel-indicators carousel-slider" style="bottom:-80px">
          <button v-for="(grupo, index) in productos.slice(0, 3)" type="button" :key="index"
            data-bs-target="#carouselProductos" :data-bs-slide-to="index" :class="{ 'active': index === 0 }"
            aria-label="Slide {{ index + 1 }}"></button>

          <!-- Agrega más botones según la cantidad de grupos de productos -->
        </div>

      </div>
    </div>








  </div>

</template>

<script>
import AOS from 'aos';
import 'aos/dist/aos.css';
import { Carousel, Navigation, Slide, Pagination } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';
import axios from 'axios';
import { defineComponent } from 'vue';


export default defineComponent({

  name: 'Home',
  components: {
    Pagination,
    Carousel,
    Slide,
    Navigation,
  },
  data() {
    return {
      currentSliderIndex: 0,
      productos: [],
      sliders: [],
      imagenURLs: {},
      categorias: [],
      imagenBanner: '',
      imagen1: '',
      imagen2: '',
      banner: [],
      categorias: [],
      categoriasP: [],

      servicios: [],
      tituloCategoria: '',
      settings: {
        itemsToShow: 1,
        snapAlign: 'center',
      },
      breakpoints: {
        700: {
          itemsToShow: 3.5,
          snapAlign: 'center',
        },
        1024: {
          itemsToShow: 5,
          snapAlign: 'start',
        },
      },
    };

  },

  methods: {
    obtenerCategoriasHomeP() {

      axios
        .get("/api/obtenerCategoriasHome")
        .then((response) => {
          this.categoriasP = response.data;
          this.tituloCategoria = this.categoriasP[0].titulo
        })
        .catch((error) => {
          console.error(error);
        });

    },
    setCurrentSlider(texto, index) {
      $('.textoSlider').html(texto);
      $('.carousel-indicators button').removeClass('active');
      $('.carousel-indicators button[data-bs-slide-to="' + index + '"]').addClass('active');
    },
    verProducto(productId) {
      this.$store.commit('setSelectedProductId', productId);
      this.$router.push('/productosdelinea');
    },
    isRouteActive(route) {
      return this.$route.path === route;
    },
    obtenerProductosDestacados() {
      axios.get('/api/obtenerProductosDestacados')
        .then(response => {
          this.productos = response.data;
        })
        .catch(error => {
          console.error('Error al traer los productos:', error);
        });
    },
    obtenerSlidersHome() {
      axios.get('/api/obtenerSliders')
        .then(response => {
          this.sliders = response.data.filter(slider => slider.seccion === 'home');

        })
        .catch(error => {
          console.error(error);
        });
    },

    obtenerCategoriasHome() {
      axios.get('/api/obtenerCategoriasHome')
        .then(response => {
          this.categorias = response.data;
          this.imagen1 = this.categorias[0].imagen;
          this.imagen2 = this.categorias[1].imagen
        })
        .catch(error => {
          console.error(error);
        });
    },
    obtenerBannerInformacion() {
      axios.get(`/api/obtenerBanners`)
        .then(response => {
          this.banner = response.data[0];
          this.imagenBanner = response.data[0].imagen;
        })
        .catch(error => {
          console.error(error);
        });
    },
    obtenerServiciosInformacion() {
      axios.get(`/api/obtenerServicios`)
        .then(response => {
          this.servicios = response.data

        })
        .catch(error => {
          console.error(error);
        });
    },
    getImagen(fileName) {
      if (fileName) {
        const filePath = fileName.split('/').pop();
        return '/api/getImage/' + filePath
      }
    }
  },

  mounted() {
    AOS.init();
    this.obtenerSlidersHome();
    this.obtenerBannerInformacion();
    this.obtenerCategoriasHome();
    this.obtenerProductosDestacados();
    this.obtenerServiciosInformacion();
    this.obtenerCategoriasHomeP();
  }
});

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');


.imagenes {
  margin-bottom: 80px;
}

.textoSlider {
  color: #FFF;
  font-family: 'Montserrat';
  font-size: 42px;
  font-style: normal;
  font-weight: 400;
  line-height: 48px;
}

#carouselExampleIndicators {
  height: 614px;
}

.productosDestacados {
  height: 800px;
}


.nombre {
  color: #000;
  font-family: Montserrat;
  font-size: 22px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  text-align: left;

}

.categoria {
  color: var(--azul, #33447F);
  font-family: Montserrat;
  font-size: 14px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  text-transform: uppercase;
  text-align: left;

}



.producto img {
  width: 100%;
  height: 100%;
}

.producto div {
  width: 100%;
  height: 273px;
}


.producto {
  cursor: pointer;
  width: 288px;
  height: 410px;
  background-color: white;
  color: #33447F;
  border-bottom: 1px solid rgba(147, 147, 147, 0.3);
}


.productosD {
  font-size: 35px;
  font-weight: 600;
  text-align: left;
  font-family: "Montserrat", sans-serif;
  padding-top: 70px;
}

.titleServicio {
  font-size: 35px;
  font-weight: 600;
  text-align: left;
  font-family: "Montserrat", sans-serif;

}

.iconServicio {
  font-size: 40px;
  color: #2F3F78;
}

.textTarjeta {
  font-family: "Montserrat", sans-serif;
  font-size: 16px;
  font-weight: 500;
  color: #2F3F78;
  margin-top: 30px;
}

.tarjeta {
  margin-top: 20px;
  margin-bottom: 20px;
  width: 288px;
  height: 266px;
  background-color: white;
  margin-left: 30px;
  text-align: center;
  border-radius: 5px;
  padding-top: 70px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);

}

.servicios {
  margin-top: 30px;
}

.nuestrosServicios {
  background-color: #F5F5F5;
  padding-top: 80px;
  padding-bottom: 83px;

}

.kotex {
  font-weight: 600;
}

.text {
  color: #FFF;
  font-family: Montserrat;
  font-size: 18px;
  font-style: normal;
  font-weight: 300;
  line-height: 34px;

}


.infotext {
  margin-top: 40px;
  margin-bottom: 40px;
  padding-right: 89px;

}

.titulo {
  margin-top: 49px;
  font-size: 35px;
  font-family: "Montserrat", sans-serif;
  font-weight: 500
}

.infoEmpresa {
  padding-left: 89px;
  background-color: #2F3F78;
  color: white;

}

.imgEmpresa img {
  width: 100%;
  filter: grayscale(100%);
  height: 100%;

}

.imgEmpresa {
  height: 566px;
  padding: 0px;

}

.empresa {
  overflow-x: hidden;
}


.tituloImg {
  position: absolute;
  z-index: 1;
  margin-top: 224px;
  color: #FFF;
  text-align: center;
  font-family: Montserrat;
  font-size: 24px;
  font-style: normal;
  font-weight: 600;
  line-height: normal;
  margin-left: 30%;
}

.secciones {
  display: flex;
  justify-content: center;
}

.seccion2 {
  margin-top: 60px;
}

.contenido {
  display: flex;
  flex-direction: column;
}



.imagen-contenedor {
  overflow: hidden;
  height: 288px;
  filter: brightness(0.8);

}

.imgS {
  width: 100%;
  height: 100%;
  transition: transform 0.3s ease;
}

.imgS:hover {
  transform: scale(1.1);
}

.titleSeccion {
  font-family: "Montserrat", sans-serif;
  font-size: 35px;
  font-weight: 600;
  line-height: 42.67px;
  text-align: left;
  margin-top: 20px;


}

.seccion {
  display: flex;
  flex-direction: column;
}

.card-bot {
  color: rgba(0, 0, 0, 0.57);
}

.card-title {
  font-family: "Montserrat", sans-serif;
  font-size: 25px;
  font-weight: 400;
  line-height: 30px;
  text-align: left;

}

.card-top {
  color: #33447F;
  font-family: "Montserrat", sans-serif;
  font-size: 15px;
  font-weight: 700;
  line-height: 19.5px;
  text-align: left;

}

.card img {
  width: 280px;
  height: 280px;
}

.card {
  width: 300px;
  height: 450px;
  margin-left: 20px;
  border-radius: 0px;
  border: none;
}

.novedades {
  padding-top: 50px;
  justify-content: left;
  display: flex;
  height: 700px;
  width: 100%;
}

.carousel-slider .active {
  opacity: 1;
  height: 7px;
  width: 35px;
  background-color: #939393;

}

.carousel-slider button {
  opacity: 1;
  height: 7px;
  width: 35px;
  background-color: #939393;
  opacity: 50%;

}

.carousel-slider {
  bottom: -370px;
  height: 10px;
  margin-bottom: 0;
  margin-left: 0;
  margin-right: 0;
}


.carousel-control-prev,
.carousel-control-next {
  display: none;
}

.carousel-inner {
  gap: 0px;
  opacity: 0px;
}


.carousel-item img {
  background-size: cover;
  width: 100%;
  height: 100%;
}

.textoImg {
  margin-top: 150px;
  width: 460px;
  height: 50px;
  position: absolute;
  z-index: 1;

}

.textoImg div {
  color: white;
  font-weight: 400;
  font-family: "Montserrat", sans-serif;
  font-size: 40px;
}

.masInformacion {
  margin-top: 50px;
  border-radius: 0%;
  width: 248px;
  height: 49px;
  background-color: #2F3F78;
  color: #FFF;
  text-align: center;
  font-family: Montserrat;
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}

.masInformacion:hover {
  margin-top: 50px;
  border-radius: 0%;
  width: 248px;
  height: 49px;
  background-color: #2F3F78;
  color: #FFF;
  text-align: center;
  font-family: Montserrat;
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;

}

.masInformacion2 {
  border-radius: 0%;
  width: 248px;
  height: 49px;
  background-color: white;
  color: #2F3F78;
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
  font-size: 16px;
}

.masInformacion2:hover {
  border-radius: 0%;
  width: 248px;
  height: 49px;
  background-color: white;
  color: #2F3F78;
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
  font-size: 16px;
}

.degradado {
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  background: linear-gradient(to left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 100));
}



@media only screen and (max-width: 1200px) {
  .masInformacion2 {
    margin-bottom: 20px;
  }
}

@media only screen and (max-width: 400px) {
  .masInformacion2 {
    width: 150px;
    font-size: 10px;
  }

  .textoSlider {
    width: 50px;
  }

  .textoImg {
    width: 80px;
  }

}


@media only screen and (max-width: 300px) {

  .masInformacion {
    width: 150px;
  }

  .tituloImg {
    margin-left: 5%;
  }

}
</style>