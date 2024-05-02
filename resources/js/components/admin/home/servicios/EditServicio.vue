<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR SERVICIO</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">orden</label>
                <input type="text" class="form-control" id="orden" :value="this.orden">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Icono</label>
                    <input type="text" class="form-control" id="icono">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Icono actual</label>
                    <div v-html="this.icono"></div>
                </div>
            </div>
            <div class="mb-3 mt-2">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>

            <div class="w-100 d-flex justify-content-end">
                <button @click="updateServicio()" type="button" class="btn"
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
            orden: null,
            texto: null,
            icono: null,
            servicio: null


        }

    },
    computed: {
        idServicio() {
            return this.$store.getters['getIdServicio'];
        },
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        }
    },
    methods: {

        updateServicio() {
            let formData = new FormData();
            formData.append('idServicio', this.idServicio);
            formData.append('orden', $('#orden').val());
            if($('#icono').val() == ''){
                formData.append('icono', this.icono);

            }else{
                formData.append('icono', $('#icono').val());
            }
            formData.append('texto', $('#editor').summernote('code').toString());


            axios.post('/api/updateServicio', formData)
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Servicio actualizado con éxito');                 
                    this.$store.commit('mostrarComponente', 21);

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
        obtenerServicio() {
            axios.get(`/api/obtenerServicio/${this.idServicio}`)
                .then(response => {
                    this.servicio = response.data;
                    this.orden = response.data.orden
                    this.texto = response.data.texto
                    this.icono = response.data.icono
                    $('#editor').summernote('code', this.servicio.texto);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.summerNote();
        this.obtenerServicio();


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
