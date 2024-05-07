<template>
    <div>
      <div class="container aplicacionesDiv">
        <div class="row d-flex aplicaciones" >
          <div  v-for="aplicacion in aplicaciones" :key="aplicacion.id" class="col-lg-2">
            <div class="aplicacion" @click="verAplicacion(aplicacion.id, aplicacion.nombre)"> 
              <img :src="getImagen(aplicacion.imagen)"  alt="imagen" class="imgAplicacion" >
              <p class="nombre">{{ (aplicacion.nombre).toUpperCase() }}</p>
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
        aplicaciones: []
      };
    },
    methods:{
      getImagen(fileName){
      if(fileName){
      const filePath = fileName.split('/').pop();
      return '/api/getImage/' + filePath
    }

    },
      verAplicacion(id,nombre){
        this.$emit('ver-aplicacion', [id,nombre]);
      }

    },
    mounted() {
      axios.get('/api/aplicaciones')
        .then(response => {
          this.aplicaciones = response.data;
        })
        .catch(error => {
          console.error('Error al traer las aplicaciones:', error);
        });
    }
  }
  </script>
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
  
  

.nombre{
  text-align: center;
  font-size: 19px;
  color: black;
  font-family: "Montserrat", sans-serif;
  font-weight: 600;
  line-height: 26px;
  margin-top: 30px;
}

.aplicaciones{
  display: flex;
  flex-wrap: wrap; 
}

.aplicacion img{
  width: 220px;
  height: 223px;
  cursor: pointer;
}
.aplicacion img:hover{
  width: 255px;
  height: 243px;
  transition: 0.5s;
  filter: grayscale(50%);

}
.aplicacion{
  width: 220px;
  height: 223px;
  background-color: white;
  color: #33447F;
  margin-bottom: 100px;

}  
  </style>