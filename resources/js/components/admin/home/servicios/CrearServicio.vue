<template>
    <div class="container">
        <div class="w-100 border-bottom">
            <h1>CREAR SERVICIO</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">orden</label>
                <input type="text" class="form-control" id="orden" />
            </div>
            <div class="row">
                <div>
                    <label class="form-label">Icono</label>
                    <input type="text" class="form-control" id="icono" />
                </div>
            </div>
            <div class="mb-3 mt-2">
                <label class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>

            <div class="w-100 d-flex justify-content-end">
                <button @click="crearServicio()" type="button" class="btn"
                    style="background-color: rgb(52, 68, 127); color: white">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import "jquery";
import "bootstrap";
import "summernote";
import "summernote/dist/summernote-bs4.css";
import axios from "axios";
export default {


    computed: {
        getSummer() {
            return this.$store.getters['getSummer'];
        }
    },
    methods: {
        crearServicio() {
            let formData = new FormData();
            const parser = new DOMParser();
            const svgDOM = parser.parseFromString($("#icono").val(), "image/svg+xml");
            svgDOM.documentElement.classList.add("svgIcono");
            const serializer = new XMLSerializer();
            const svgString = serializer.serializeToString(svgDOM.documentElement);

            formData.append("icono", svgString);
            formData.append("texto", $("#editor").summernote("code").toString());
            formData.append("orden", $("#orden").val());

            axios
                .post("/api/crearServicio", formData)
                .then((response) => {
                    this.$store.commit("setServicioId", null);
                    this.$store.commit("setMostrarAlerta", true);
                    this.$store.commit("setClaseAlerta", 1);
                    this.$store.commit("setMensajeAlerta", "Servicio creado con éxito");
                    this.$store.commit("mostrarComponente", 21);
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        resetInputs() {
            $('#orden').val('');
            $('#icono').val('');
            $('#editor').summernote('code', '');
        },
        summerNote() {

            if (this.getSummer === null && this.getSummer !== true) {
                $('#editor').summernote({
                    height: 300,
                });
                var noteBar = $('.note-toolbar');
                noteBar.find('[data-toggle]').each(function () {
                    $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
                });

                this.$store.commit('setSummer', true);
            }


        }
    },


    mounted() {
        this.summerNote();
    },
};
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
