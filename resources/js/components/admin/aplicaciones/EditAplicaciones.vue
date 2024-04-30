<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR APLICACIÓN</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Orden</label>
                <input type="text" class="form-control" :value="this.aplicacion.orden" id="orden" > 
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control"  :value="this.aplicacion.nombre" id="nombre"> 
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen (Tamaño recomendado 1400x720)</label>
                <input type="file" ref="fotoAplicacion" class="form-control" @change="guardarFoto()">
            </div>

            <div class="w-100 d-flex justify-content-end mb-5">
                <button @click="updateAplicacion()" type="button" class="btn"
                    style="background-color: rgb(52, 68, 127); color: white;">Guardar</button>
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
            foto: null,
            aplicacion: ''
        }
    },

    computed:{
        idAplicacion(){
            return this.$store.getters['getIdAplicacion'];
        },
      
    },
    
    methods:{
    guardarFoto() {
            const file = this.$refs.fotoAplicacion;
            this.foto = file.files[0]
    },
    updateAplicacion(){

        let formData = new FormData(); 
        formData.append('idAplicacion', this.idAplicacion);
        formData.append('orden', $('#orden').val());
        formData.append('nombre', $('#nombre').val());
        formData.append('imagen', this.foto);


        axios.post('/api/updateAplicacion',formData,{
            headers: {
                    'Content-Type': 'multipart/form-data'
            }
        })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Aplicacíon actualizada con éxito');                 
                    this.$store.commit('mostrarComponente', 10);

                })
                .catch(error => {
                    console.error(error);
                });
    },

    obtenerAplicacion(){
        axios.get(`/api/obtenerAplicacion/${this.idAplicacion}`)
                .then(response => {
                   this.aplicacion = response.data
                })
                .catch(error => {
                    console.error(error);
                });
    }
    },
    mounted(){
        this.obtenerAplicacion()
    }
  
}
</script>

<style scoped>
.encabezado {
    background-color: rgb(52, 68, 127);
    color: white;
}
</style>
