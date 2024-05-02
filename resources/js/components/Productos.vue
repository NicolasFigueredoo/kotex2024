<template>
    <div>
     <div class="productosAplicacion">
      <div class="productos" >
        <div  v-for="producto in productos" :key="producto.id_producto">
          <div class="producto" @click="verProducto(producto.id_producto, producto.nombre_producto)"> 
            <img :src="getImagen(producto.imagen)"  alt="imagen" >
            <p class="categoria">{{ producto.nombre_categoria.toUpperCase() }}</p>
            <p class="nombre">{{ producto.nombre_producto.charAt(0).toUpperCase() + producto.nombre_producto.slice(1) }}</p>

          </div>
  
        </div>
  
      </div>
    </div>

    </div>
  </template>
  
  <script>
  import axios from "axios";

  export default {
  
    data() {
      return {
        idProducto: null,
        nombreProducto: '',
        productos: []
      };
    },

    computed: {
        idAplicacion(){
            const selectedAplicacionId = this.$store.getters['getSelectedAplicacionId'];
            return selectedAplicacionId;
        }
    },

    methods:{
      getImagen(fileName){
      if(fileName){
      const filePath = fileName.split('/').pop();
      return '/api/getImage/' + filePath
    }

    },
        obtenerProductosIdAplicacion(){
            axios.get(`/api/obtenerProductosIdAplicacion/${this.idAplicacion}`)
            .then(response => {
                this.productos = response.data
            })
            .catch(error => {
                console.error('Error al traer los productos:', error);
            });
        },
        verProducto(id,nombre) {
            this.$emit('ver-producto', [id,nombre]);
            
        }
    },
    mounted(){

        this.obtenerProductosIdAplicacion();
    }
  
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

  .productosAplicacion {
  display: flex;
  justify-content: left;
  margin-left: 16.5%;
  margin-right: auto;
  width: 75%;
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
  width: 298px;
  height: 410px;
  background-color: white;
  color: #33447F;
  border-bottom: 1px solid rgba(147, 147, 147, 0.3);
  margin: 15px;

}
  </style>
  