<template>
  <div>

    <nav class="navbar navbar-expand-lg"
      :style="{ height: navHeight, backgroundColor: 'white', boxShadow: '0 3px 23px 0 rgba(0, 0, 0, 0.1)' }">
      <div class="container">
        <a class="navbar-brand" href="#">
          <router-link class="route" to="/home" :style="{ fontWeight: isRouteActive('/home') ? 'bold' : '500' }">
            <img class="logoNavbar" :src="getImagen(this.imagenLogo)" alt="">
          </router-link>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
          <ul class="navbar-nav justify-content-end columaOne">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div class="d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-telephone iconNavbar2" viewBox="0 0 16 16">
                    <path
                      d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                  </svg>
                  <p class="title">{{ telefono }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div class="d-flex align-items-center" @click="abrirWsp()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-whatsapp iconNavbar2" viewBox="0 0 16 16">
                    <path
                      d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                  </svg>
                  <p class="title">{{ whatsapp }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div class="d-flex align-items-center" @click="abrirEmail()">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"
                    fill="currentColor" class="iconNavbar2">
                    <path
                      d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
                  </svg>
                  <p class="title">{{ email }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div class="d-flex align-items-center" style="padding-top: 20px">
                  <font-awesome-icon data-bs-toggle="modal" data-bs-target="#exampleModal" class="iconNavbar"
                    :icon="['fas', 'magnifying-glass']" style="cursor: pointer;" />
                </div>
              </a>
            </li>

            <li class="nav-item">

              <a class="nav-link" href="#" style="margin: 0px; margin-top: 16px;">
                |
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <div class="d-flex align-items-center" style="padding-top:15px">
                  <a :href="facebook" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="16" height="16"
                      fill="currentColor" class="iconNavbar2">
                      <path
                        d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                    </svg>
                  </a>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <div class="d-flex align-items-center" style="padding-top:17px">
                  <a :href="instagram" target="_blank"><font-awesome-icon class="iconNavbar2"
                      :icon="['fab', 'instagram']" /></a>
                </div>
              </a>
            </li>
          </ul>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="navbar-nav">
            </div>
            <div class="navbar-nav">
              <ul class="navbar-nav ml-auto pb-3">


                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <div class="d-flex align-items-center">
                      <router-link class="route" to="/nosotros"
                        :style="{ fontWeight: isRouteActive('/nosotros') ? 'bold' : '500' }">
                        <p class="textoR">Nosotros</p>
                      </router-link>
                    </div>
                  </a>
                </li>


                <li v-for="categoria in categorias" :key="categoria.id" class="nav-item">

                  <a class="nav-link" href="#">
                    <div class="d-flex align-items-center">
                      <router-link class="route" :to="categoria.route" @click="deleteProduct(categoria.route)"
                        :style="{ fontWeight: isRouteActive(categoria.route) ? 'bold' : '500' }">
                        <p class="textoR categoria-text">{{ categoria.texto }}</p>
                      </router-link>
                    </div>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <div class="d-flex align-items-center">
                      <router-link class="route" to="/catalogo"
                        :style="{ fontWeight: isRouteActive('/catalogo') ? 'bold' : '500' }">
                        <p class="textoR">Catálogo</p>

                      </router-link>
                    </div>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <div class="d-flex align-items-center">
                      <router-link class="route" to="/aplicaciones"
                        :style="{ fontWeight: isRouteActive('/aplicaciones') ? 'bold' : '500' }">
                        <p class="textoR">Aplicaciones</p>

                      </router-link>
                    </div>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <div class="d-flex align-items-center">
                      <router-link class="route" to="/presupuesto"
                        :style="{ fontWeight: isRouteActive('/presupuesto') ? 'bold' : '500' }">
                        <p class="textoR">Presupuesto</p>

                      </router-link>
                    </div>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <div class="d-flex align-items-center">
                      <router-link class="route" to="/contacto"
                        :style="{ fontWeight: isRouteActive('/contacto') ? 'bold' : '500' }">
                        <p class="textoR">Contacto</p>

                      </router-link>
                    </div>
                  </a>
                </li>

              </ul>
            </div>
          </div>

        </div>
      </div>
    </nav>



    <div class="whatsapp-container">
      <a :href="'https://wa.me/' + whatsappLink" target="_blank" class="whatsapp-link">
        <font-awesome-icon class="contactoWhat" :icon="['fab', 'whatsapp']" />
      </a>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Buscar Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input v-model="textoBuscador" type="text" class="form-control" @change="buscarProducto()"
              aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="modal-footer d-flex justify-content-start">
            <div v-for="producto in productos" :key="producto.id_producto">
              <div class="producto w-100" @click="verProducto(producto.id_producto)">
                <div class="containerImg">
                  <img :src="getImagen(producto.imagen)" alt="imagen">
                </div>
                <div class="containerInfo">
                  <p class="categoria">{{ producto.nombre_categoria.toUpperCase() }}</p>
                  <p class="nombre">{{ producto.nombre_producto.charAt(0).toUpperCase() +
        producto.nombre_producto.slice(1) }}</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script>
import axios from 'axios';
import 'jquery';


export default {
  data() {
    return {
      textoBuscador: null,
      productos: [],
      telefono: null,
      whatsapp: null,
      email: null,
      facebook: null,
      instagram: null,
      whatsappLink: null,
      imagenLogo: null,
      isExpanded: false,
      categorias: [],
      navHeight: $('.navbar').height(),

    }
  },
  computed:{
    idProductoCategoria() {
            const idProductoCategoria = this.$store.getters['getSelectedProductId'];
            return idProductoCategoria;
        }

  },
  methods: {
    obtenerCategoriasHome() {

      axios
        .get("/api/obtenerCategoriasHome")
        .then((response) => {
          this.categorias = response.data;
        })
        .catch((error) => {
          console.error(error);
        });

    },

    abrirWsp() {
      const url = 'https://wa.me/' + this.whatsappLink;
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
    agrandarNav() {
      if (this.isExpanded) {
        this.navHeight = '164px';
      } else {
        this.navHeight = '600px';
      }
      this.isExpanded = !this.isExpanded;


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
          this.imagenLogo = response.data.imagen
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

          const trimmedText = this.whatsapp.trim();
          const textWithoutSpacesAndHyphens = trimmedText.replace(/[\s-]/g, '');
          this.whatsappLink = textWithoutSpacesAndHyphens;



        })
        .catch(error => {
          console.error('Error al traer los contactos:', error);
        });
    },
    verProducto(idProducto) {
      this.$store.commit('setSelectedProductId', idProducto);
      this.$router.push('/productosdelinea');
      $('#exampleModal').modal('hide');

    },
    buscarProducto() {
      axios.get(`/api/obtenerProductoName/${this.textoBuscador}`)
        .then(response => {
          this.productos = response.data;
        })
        .catch(error => {
          console.error('Error al traer los productos:', error);
        });
    },
    isRouteActive(route) {
      return this.$route.path === route;
    },
    deleteProduct(route) {
      if(this.idProductoCategoria != null){
        location.reload();
      }
    }
  },
  mounted() {
    this.obtenerLogo();
    this.obtenerContacto();
    this.obtenerCategoriasHome();
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');





.title {
  display: flex;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 18px;
  font-size: 16px;
  padding-top: 20px;
  padding-left: 10px
}

.route {
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 18px;
  font-size: 16px;

}


.iconNavbar {
  align-items: center;
  font-size: 20px;
  color: #33447F;

}

.iconNavbar2 {
  align-items: center;
  width: 20px;
  height: 20px;
  color: #33447F;
  margin-top: 5px;
  cursor: pointer;

}


.containerN {
  display: flex;
  flex-direction: column;
  height: 150px;
  align-items: end;

}

.contenidoNav {
  display: flex;
  margin-top: 50px;

}

.contenidoNav2 {
  display: flex;
  margin-top: 20px;

}

.opcion4 {
  display: flex;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 18px;
  font-size: 16px;
}

.opcion3 {
  display: flex;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 18px;
  font-size: 16px;
}

.opcion2 {
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 18px;
  font-size: 16px;
  line-height: 18px;
}

.opcion1 {
  display: flex;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 18px;
  font-size: 16px;
}


.route {
  text-decoration: none;
  color: black;
}

.whatsapp-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 1000;
}

.whatsapp-link {
  display: block;
  width: 60px;
  height: 60px;
  background-color: #00C820;
  border-radius: 50%;
  text-align: center;
  line-height: 60px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s ease;
}

.whatsapp-link:hover {
  transform: scale(1.1);
}

.contactoWhat {
  font-size: 30px;
  color: white;
  padding-top: 15px;
}

.producto {
  display: flex;
  height: 160px;
  cursor: pointer;
}

.containerInfo {
  display: flex;
  flex-direction: column;
}

.containerImg {
  width: 140px;
  height: 150px;
}

.containerImg img {
  width: 140px;
  height: 150px;
}

.logoNavbar {
  width: 245px;
  height: 92px
}

.textoR:hover {
  font-weight: 600;
}

.navbar-nav .nav-item .nav-link .route .textoR {
    white-space: nowrap;
  }

  .navbar-nav .nav-item .nav-link .d-flex {
    white-space: nowrap;
  }

  .navbar-nav .nav-item .nav-link .d-flex .categoria-text {
    white-space: nowrap;
  }


  @media only screen and (max-width: 1200px) {

    .navbar-nav .nav-item .nav-link .route .textoR {
    white-space: normal;
  }

  .navbar-nav .nav-item .nav-link .d-flex {
    white-space: normal;
  }

  .navbar-nav .nav-item .nav-link .d-flex .categoria-text {
    white-space: normal;
  }


}


@media only screen and (max-width: 1000px) {

  .columaOne {
    display: none;
  }


}


@media only screen and (max-width: 400px) {

  .logoNavbar {
    width: 100%;
  }





}
</style>