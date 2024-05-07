<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CREAR APLICACIÓN</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Orden</label>
                <input type="text" class="form-control" v-model="this.orden"> 
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control"  v-model="this.nombre"> 
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen (Tamaño recomendado 220x223)</label>
                <input type="file" ref="fotoAplicacion" class="form-control" @change="guardarFoto()">
            </div>

            <div class="w-100 d-flex justify-content-end mb-5">
                <button @click="crearAplicacion()" type="button" class="btn"
                    style="background-color: rgb(52, 68, 127); color: white;">Crear</button>
            </div>
        
        </form>

    </div>

</template>

<script>
import axios from 'axios';

export default {

    data(){
        return{
            orden: '',
            nombre: '',
            foto: null
        }
    },
    
    methods:{
    guardarFoto() {
            const file = this.$refs.fotoAplicacion;
            this.foto = file.files[0]
    },
    crearAplicacion(){

        let formData = new FormData(); 
        formData.append('orden', this.orden);
        formData.append('nombre', this.nombre);
        formData.append('imagen', this.foto);


        axios.post('/api/crearAplicacion',formData,{
            headers: {
                    'Content-Type': 'multipart/form-data'
            }
        })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Aplicacíon creada con éxito');                 
                    this.$store.commit('mostrarComponente', 10);

                })
                .catch(error => {
                    console.error(error);
                });
    }
    },
  
}
</script>

<style scoped>
.encabezado {
    background-color: rgb(52, 68, 127);
    color: white;
}

* {
    font-size: 16px;
    color: black;
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
}

h1 {
    font-size: 28px;
    color: black;
    font-family: "Montserrat", sans-serif;
    font-weight: 700;
}
</style>
