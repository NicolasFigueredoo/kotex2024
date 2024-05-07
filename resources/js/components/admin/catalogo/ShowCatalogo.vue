<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CATALOGO</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Archivo descarga</label>
                <input type="file" class="form-control" id="file" @change="guardarFile()" ref="fileArchive">
            </div>

            <div class="w-100 d-flex justify-content-end">

                <button @click="updateCatalogo()" type="button" class="btn mt-3"
                    style="background-color: rgb(52, 68, 127); color: white;">Guardar</button>

            </div>

        </form>

    </div>

</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            catalogo: [],
            file: null
        }
    },

    methods: {

        guardarFile() {
            const file = this.$refs.fileArchive;
            this.file = file.files[0]
        },

        updateCatalogo() {

            let formData = new FormData(); 
            formData.append('file', this.file);
    
            axios.post('/api/updateCatalogo', formData
            , {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Catalogo actualizado con éxito'); 
                    this.obtenerCatalogo();
                    
                })
                .catch(error => {
                    console.error(error);
                });

        },

        obtenerCatalogo() {
            axios.get('/api/obtenerCatalogo')
                .then(response => {
                    this.catalogo = response.data
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerCatalogo();

    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

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

.imagen {
    width: 200px;
    height: 100px;
}
</style>
