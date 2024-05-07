<template>
    <div>
      <div class="indicador">
      <p v-if="nombreProducto"><b>Inicio > Aplicaciones > {{nombreAplicacion}} </b> > {{nombreProducto}}</p>
      <p v-else><b>Inicio > Aplicaciones > </b>{{nombreAplicacion}}</p>

    </div>

      <Productos v-if="!idProducto" @ver-producto="mostrarProducto" />
      <InformacionProducto v-else :id-producto="idProducto"  />

    </div>
  </template>
  
  <script>
  import Productos from "@/components/Productos.vue";
  import InformacionProducto from "@/components/InformacionProducto.vue";

  export default {
    props: {
    nombreAplicacion: String 
    },
    components: {
      Productos,
      InformacionProducto
    },
    data() {
      return {
        idProducto: null,
        nombreProducto: null

      };
    },

    methods: {
      mostrarProducto(datosProducto) {
            this.idProducto = datosProducto[0];
            this.nombreProducto = datosProducto[1];
            this.$store.commit('setSelectedProductId', datosProducto[0]);
      }
    },

   

    
  
  };
  </script>
  
  <style>
  .indicador{
    color: black;
    margin-top: 10px;
    margin-left: 17%;
    font-size: 15px;
    font-weight: 500;
    font-family: "Montserrat", sans-serif;
    line-height: 60px;
  }

  </style>
  