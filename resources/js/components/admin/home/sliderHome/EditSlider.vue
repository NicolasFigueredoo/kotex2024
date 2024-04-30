<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR SLIDER</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">orden</label>
                <input type="text" class="form-control" id="orden" :value="this.slider.orden">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen (Tamaño recomendado 1400x720)</label>
                <input type="file" ref="fotoSlider" class="form-control" @change="guardarFoto()">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>

            <div class="w-100 d-flex justify-content-end">
                <button @click="updateSlider()" type="button" class="btn"
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
            jsonCodigoSlider: '',
            foto: null,
            orden: null,
            slider: ''
        }

    },
    computed: {
        idSlider() {
            return this.$store.getters['getidSliderHome'];
        },
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        }
    },
    methods: {
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        updateSlider() {
            let formData = new FormData();
            formData.append('idSlider', this.idSlider);
            formData.append('foto', this.foto);
            formData.append('jsonCodigoSlider', $('#editor').summernote('code').toString());
            formData.append('orden', $('#orden').val());


            axios.post('/api/updateSlider', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Slider modificado con éxito');

                    if (this.idSlider === 1 || this.idSlider === 2 || this.idSlider === 3) {
                        this.$store.commit('mostrarComponente', 1);
                    } else {
                        this.$store.commit('mostrarComponente', 6);
                    }
                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
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
        obtenerSliderInformacion() {
            axios.get(`/api/obtenerSliderHome/${this.idSlider}`)
                .then(response => {
                    this.slider = response.data;
                    $('#editor').summernote('code', this.slider.texto);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.summerNote();
        this.obtenerSliderInformacion();


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
