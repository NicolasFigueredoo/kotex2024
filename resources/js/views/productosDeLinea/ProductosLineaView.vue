<template>
  <div class="container ProductosLinea-view">
    <div class="indicador" style="margin-left: 0px;">
      <p v-if="nombreProducto"><b>Inicio >  Productos de línea ></b> {{nombreProducto}}</p>
      <p v-else><b>Inicio > </b>Productos de línea</p>
    </div>

    <ProductosLinea v-if="!idProducto" @ver-producto="mostrarProducto"/>
    <InformacionProducto v-else :id-producto="idProducto"  />
  </div>
</template>

<script>
import ProductosLinea from "@/components/ProductosLinea.vue";
import InformacionProducto from "@/components/InformacionProducto.vue";

export default {
  components: {
    ProductosLinea,
    InformacionProducto
  },
  data() {
    return {
      idProducto: null,
      nombreProducto: '',
    };
  },
  methods: {
    mostrarProducto(datosProducto) {
      this.idProducto = datosProducto[0];
      this.nombreProducto = datosProducto[1].charAt(0).toUpperCase() + datosProducto[1].slice(1);
      this.$store.commit('setSelectedProductId', datosProducto[0]);
    }
  },
  created() {
    const selectedProductId = this.$store.getters['getSelectedProductId'];

    if (selectedProductId !== null) {
      this.idProducto = selectedProductId;
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
