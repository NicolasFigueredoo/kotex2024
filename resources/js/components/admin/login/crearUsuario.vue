<template>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 formulario">
                <form>
                    <div class="mb-3 justify-content-center align-items-center">
                        <img class="imgKotex" src="../../../img/kotex.jpg" alt="">
                    </div>
                    <div class="mb-3">
                        <input v-model="this.usuario" placeholder="Usuario" type="text" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input v-model="this.email" placeholder="Email" type="email" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input v-model="this.contraseña" placeholder="Contraseña" type="password" class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <a id="emailHelp" class="form-text">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="button" class="btn btn-dark w-100" @click="crearUsuario()">Registrarse</button>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            usuario: null,
            email: null,
            contraseña: null

        }
    },

    methods: {
        crearUsuario() {
            axios.post('/api/crearUsuario', {
                usuario: this.usuario,
                email: this.email,
                contraseña: this.contraseña
            })
                .then(response => {
                })
                .catch(error => {
                    console.error('Error ingresar Admin:', error);
                });

        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

.formulario {
    width: 20vw;
    font-family: "Montserrat", sans-serif;
    font-size: 16px;
    font-weight: 400;
    margin-top: -300px;
}
</style>
