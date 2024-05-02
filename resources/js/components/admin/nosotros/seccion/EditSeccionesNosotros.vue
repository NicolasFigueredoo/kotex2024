<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR VALOR</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Orden</label>
                    <input type="text" class="form-control" id="orden" :value="this.seccion.orden">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" :value="this.seccion.titulo">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label">Icono</label>
                    <input type="text" class="form-control" id="icono">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Icono actual</label>
                    <div v-html="this.seccion.icono"></div>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>

            <div class="w-100 d-flex justify-content-end mb-5">
                <button @click="updateSeccion()" type="btn" class="btn"
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
            seccion: []
        }

    },
    computed: {
        idSeccion() {
            return this.$store.getters['getIdSeccion'];
        }
    },
    methods: {
        updateSeccion() {
            let formData = new FormData();
            formData.append('idSeccion', this.idSeccion);
            formData.append('orden', $("#orden").val());
            formData.append('titulo', $("#titulo").val());
            if($('#icono').val() == ''){
                formData.append('icono', this.seccion.icono);

            }else{
                formData.append('icono', $('#icono').val());
            }
            formData.append('texto', $('#editor').summernote('code').toString());

            axios.post('/api/updateSeccion', formData, {})
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Valor modificado con éxito');
                    this.$store.commit('mostrarComponente', 8);

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
        obtenerSeccionInformacion() {
            axios.get(`/api/obtenerSeccion/${this.idSeccion}`)
                .then(response => {
                    this.seccion = response.data;
                    $('#editor').summernote('code', this.seccion.texto);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.summerNote();
        this.obtenerSeccionInformacion();


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
