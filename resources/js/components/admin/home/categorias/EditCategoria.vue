<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR CATEGORÍA</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">orden</label>
                <input type="text" class="form-control" id="orden" :value="this.orden">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen (Tamaño recomendado 1400x720)</label>
                <input type="file" ref="fotoCategoria" class="form-control" @change="guardarFoto()">
            </div>
            <div class="w-100 d-flex justify-content-end">
                <button @click="updateCategoria()" type="button" class="btn"
                    style="background-color: rgb(52, 68, 127); color: white;">Guardar</button>
            </div>
        </form>



    </div>

</template>

<script>
import 'jquery';
import 'bootstrap';
import 'summernote';
import 'summernote/dist/summernote-bs4.css';
import axios from 'axios';
export default {

    data() {
        return {
            foto: null,
            categoria: null,
            orden: null
        }

    },
    computed: {
        idCategoria() {
            return this.$store.getters['getidCategoriaHome'];
        }
    },
    methods: {
        guardarFoto() {
            const file = this.$refs.fotoCategoria;
            this.foto = file.files[0]
        },
        updateCategoria() {

            axios.post('/api/updateCategoriaHome', {
                idCategoria: this.idCategoria,
                foto: this.foto,
                orden: $('#orden').val()
            }
                , {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Categoría modificada con éxito');
                    this.$store.commit('mostrarComponente', 3);

                })
                .catch(error => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', 'Error en actualizar Categoria');
                });


        },

        async obtenerCategoriaInformacion() {
            axios.get(`/api/obtenerCategoriaHome/${this.idCategoria}`)
                .then(response => {
                    this.categoria = response.data;
                    this.orden = this.categoria.orden
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {
        this.obtenerCategoriaInformacion();
    }

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
