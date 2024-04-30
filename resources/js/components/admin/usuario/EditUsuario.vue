<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>Editar usuario</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" :value="this.usuario.usuario"> 
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" id="email" :value="this.usuario.email"> 
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="contraseña" > 
            </div>
        

            <button @click="updateUsuario()" type="button" class="btn"
                style="background-color: rgb(52, 68, 127); color: white;">Guardar</button>
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
            usuario: []
        }

    },
    computed:{
        idUsuario(){
            return this.$store.getters['getIdUsuario'];
        }
    },
    methods: {
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        updateUsuario() {
            axios.post('/api/updateUsuario', 
            {
                idUsuario: this.idUsuario,
                usuario: $('#usuario').val(),
                email: $('#email').val(),
                contraseña: $('#contraseña').val()

            }
            , {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('mostrarComponente', 3);

                })
                .catch(error => {
                    console.error(error);
                });

                
        },
        obtenerUsuarioInformacion(){
            axios.get(`/api/obtenerIdUsuario/${this.idUsuario}`)
                .then(response => {
                    this.usuario = response.data;
                    console.log(response.data)
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.obtenerUsuarioInformacion();
        

    }

}
</script>

<style scoped>
.encabezado {
    background-color: rgb(52, 68, 127);
    color: white;
}
</style>
