<template>
  <div class="productosEspeciales-view">
    <div class="indicador">
      <p v-if="nombreProducto"><b> Inicio > {{ nombreCat }} ></b> {{ nombreProducto }}</p>
      <p v-else><b>Inicio > </b>{{ nombreCat }}</p>
    </div>

    <ProductosEspeciales v-if="!idProducto" @ver-producto="mostrarProducto" />
    <InformacionProducto v-else :id-producto="idProducto" />

  </div>
</template>

<script>
import ProductosEspeciales from "@/components/ProductosEspeciales.vue";
import InformacionProducto from "@/components/InformacionProducto.vue";
import axios from 'axios';

export default {
  components: {
    ProductosEspeciales,
    InformacionProducto
  },
  data() {
    return {
      idProducto: null,
      nombreProducto: '',
      nombreCat: ''

    };
  },
  methods: {
    obtenerCategoriasHome() {

      axios
        .get("/api/obtenerCategoriasHome")
        .then((response) => {
          this.nombreCat = response.data[1].texto;
        })
        .catch((error) => {
          console.error(error);
        });

    },
    mostrarProducto(datosProducto) {
      this.idProducto = datosProducto[0];
      this.nombreProducto = datosProducto[1].charAt(0).toUpperCase() + datosProducto[1].slice(1);
      this.$store.commit('setSelectedProductId', datosProducto[0]);
    }
  },
  created() {
    const selectedProductId = this.$store.getters['getSelectedProductId'];
    this.obtenerCategoriasHome();
    if (selectedProductId !== null) {
      this.idProducto = selectedProductId;
    }

  }
};
</script>

<style>
.indicador {
  color: black;
  margin-top: 10px;
  margin-left: 17%;
  font-size: 15px;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 60px;
}
</style>
