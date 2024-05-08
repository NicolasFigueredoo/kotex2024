<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CATALOGO</h1>
        </div>

        <form class="row mt-3">
            <div class="col-md-11">
                <label class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo">
            </div>
            <div class="col-md-1">
                <img class="imagen" :src="getImagen(this.imagenC)" alt="">
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label">Imagen (Tamaño recomendado 265x340)</label>
                    <input type="file" ref="fotoCatalogo" class="form-control" @change="guardarFoto()">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Archivo descarga</label>
                <input type="file" class="form-control" id="file" @change="guardarFile()" ref="foto">
                </div>
            </div>

        

            <div class="mb-3 mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>
        

            <div class="w-100 d-flex justify-content-end">

                <button @click="updateCatalogo()" type="button" class="btn mt-3"
                    style="background-color: rgb(52, 68, 127); color: white;">Guardar</button>

            </div>

        </form>

    </div>

</template>

<script>
import 'jquery';

import axios from 'axios';

export default {

    data() {
        return {
            catalogo: [],
            file: null,
            foto: null,
            imagenC: null
        }
    },

    methods: {



        getImagen(fileName) {
            if (fileName) {
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        },

        guardarFoto() {
            const file = this.$refs.fotoCatalogo;
            this.foto = file.files[0]
        },

        guardarFile() {
            const file = this.$refs.fileArchive;
            this.file = file.files[0]
        },

        updateCatalogo() {


            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('foto', this.foto);
            formData.append('titulo', $('#titulo').val());
            formData.append('texto', $('#editor').summernote('code').toString());

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
            axios.get('/api/obtenerCatalogoDate')
                .then(response => {
                    this.catalogo = response.data
                    this.imagenC = response.data.imagen

                    $('#titulo').val(response.data.titulo);
                    $('#editor').summernote('code', response.data.texto);

                })
                .catch(error => {
                    console.error(error);
                });
        },
        summerNote() {
            $('#editor').summernote({
                height: 300,
            });
            $('.summernote').summernote();
            var noteBar = $('.note-toolbar');
            noteBar.find('[data-toggle]').each(function () {
                $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
            });
        },
    },
    mounted() {
        this.obtenerCatalogo();
        this.summerNote();

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
    width: 100%;
    height: 100%;
}
</style>
