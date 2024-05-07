<template>
    <div class="Aplicaciones-view">

      <div v-if="!idAplicacion" class="container indicador">
        <p><b>Inicio > </b>Aplicaciones</p>
      </div>
  
      <Aplicaciones v-if="!idAplicacion"  @ver-aplicacion="mostrarProductosAplicaciones"/>
      <ProductosView v-else :nombre-aplicacion="nombreAplicacion" />





    </div>
  </template>
  
  <script>
  import Aplicaciones from "@/components/Aplicaciones.vue";
  import ProductosView from "@/views/productos/ProductosView.vue";

  
  export default {
    components: {
      Aplicaciones,
      ProductosView
    },
    data() {
      return {
        idAplicacion: null,
        nombreAplicacion: null      };
    },
    methods: {
        mostrarProductosAplicaciones(datosAplicacion) {
            this.idAplicacion = datosAplicacion[0];
            this.nombreAplicacion = datosAplicacion[1];
            this.$store.commit('setSelectedAplicacionId', datosAplicacion[0]);
      }
    }
  };
  </script>
  
  <style>
  .indicador{
    color: black;
    margin-top: 10px;
    font-size: 15px;
    font-weight: 500;
    font-family: "Montserrat", sans-serif;
    line-height: 60px;
  }
  </style>
  