<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR BANNER</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Imagen (Tamaño recomendado 670x566) </label>
                <input type="file" ref="fotoBanner" class="form-control" @change="guardarFoto()">
            </div>
            <div class="mb-3 col-md-3">
                <th><img class="imagen" :src="getImagen(this.imagen)" alt=""></th>
            </div>
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" :value="this.bannerTitulo">
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor" :value="bannerTexto"></textarea>
            </div>

            <div class="w-100 d-flex justify-content-end mb-5">
                <button @click="updateBanner()" type="button" class="btn"
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
            bannerTitulo: '',
            bannerTexto: '',
            idBanner: null,
            imagen: null,
            seccion: null
        }

    },

    computed: {
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
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
            const file = this.$refs.fotoBanner;
            this.foto = file.files[0]
        },
        updateBanner() {
            let formData = new FormData();
            formData.append('idBanner', this.idBanner);
            formData.append('foto', this.foto);
            formData.append('bannerTitulo', $('#titulo').val());
            formData.append('bannerTexto', $('#editor').summernote('code').toString());


            axios.post('/api/updateBanner', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    if (this.seccion === 'home') {
                        this.$store.commit('setMostrarAlerta', true);
                        this.$store.commit('setClaseAlerta', 1);
                        this.$store.commit('setMensajeAlerta', 'Banner actualizado con éxito');
                        this.$store.commit('mostrarComponente', 5);
                    } else {
                        this.$store.commit('setMostrarAlerta', true);
                        this.$store.commit('setClaseAlerta', 1);
                        this.$store.commit('setMensajeAlerta', 'Banner actualizado con éxito');
                        this.$store.commit('mostrarComponente', 7);
                    }
                })
                .catch(error => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', 'Error al actualizar el banner');
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
        obtenerBannerInformacion() {
            axios.get(`/api/obtenerBanner`)
                .then(response => {
                    if (this.idComponente == 5) {
                        this.bannerTexto = response.data[0].texto
                        this.bannerTitulo = response.data[0].titulo
                        this.idBanner = response.data[0].id
                        this.imagen = response.data[0].imagen
                        this.seccion = response.data[0].seccion
                    } else {
                        this.bannerTexto = response.data[1].texto
                        this.bannerTitulo = response.data[1].titulo
                        this.idBanner = response.data[1].id
                        this.imagen = response.data[1].imagen
                        this.seccion = response.data[1].seccion
                    }

                    $('#editor').summernote('code', this.bannerTexto);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.summerNote();
        this.obtenerBannerInformacion();


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

.imagen {
    width: 100%;
    height: 100%;
}
</style>
