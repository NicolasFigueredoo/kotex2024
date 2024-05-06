<template>
  <div>
    <div class="productoslinea">
      <div class="productos" >
        <div  v-for="producto in productos" :key="producto.id">
          <div class="producto"> 
            <img :src="getImagen(producto.imagen)"  alt="imagen" @click="verProducto(producto.id_producto, producto.nombre_producto)">
            <p class="categoria">{{ producto.nombre_categoria.toUpperCase() }}</p>
            <p class="nombre">{{ producto.nombre_producto.charAt(0).toUpperCase() + producto.nombre_producto.slice(1) }}</p>

          </div>
  
        </div>
  
      </div>

    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      productos: [],
    };
  },
  methods:{
    getImagen(fileName){
      if(fileName){
        const filePath = fileName.split('/').pop();
        return '/api/getImage/' + filePath
      }

    },

    verProducto(id,nombre) {
      this.$emit('ver-producto', [id,nombre]);
      
    }

  },
  mounted() {
    axios.get('/api/obtenerProductosDeLinea')
      .then(response => {
        this.productos = response.data;
      })
      .catch(error => {
        console.error('Error al traer los productos:', error);
      });
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');


.productoslinea {
  display: flex;
  justify-content: left;
  margin-left: 16.2%;
  margin-right: auto;
  width: 69%;
  margin-bottom: 100px;
}
.nombre{
  font-size: 22px;
  color: black;
  font-family: "Montserrat", sans-serif;
  font-weight: 500;
  line-height: 26px;
  margin-left: 10px;
}
.categoria{
  font-size: 14px;
  font-weight: 700;
  font-family: "Montserrat", sans-serif;
  color: #33447F;
  line-height: 17px;
  margin-top: 20px;
  margin-left: 10px;

}


.productos {
  display: flex;
  flex-wrap: wrap;  
}

.producto img{
  width: 285px;
  height: 273px;
  cursor: pointer;
}
.producto{
  margin-top: 50px;
  width: 288px;
  height: 410px;
  background-color: white;
  color: #33447F;
  border-bottom: 1px solid rgba(147, 147, 147, 0.3);
  margin: 15px;

}

</style>