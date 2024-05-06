<template>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 formulario">
                <form>
                    <div class="mb-3 justify-content-center align-items-center">
                        <img class="imgKotex" src="../../../../img/kotex.jpg" alt="">
                    </div>
                    <div class="mb-3">
                        <input v-model="usuario" placeholder="Usuario" type="text" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input v-model="contraseña" placeholder="Contraseña" type="password" class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mensaje">

                    </div>

                    <button type="button" class="btn btn-dark w-100" @click="verificarLogin()">Login</button>

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
            contraseña: null

        }
    },

    methods: {

    
        verificarLogin() {


                axios.post('/api/verificarLogin', {
                    usuario: this.usuario,
                    contraseña: this.contraseña
                })
                    .then(response => {
                        console.log(response)
                            if(response.data !== false){
                            
                                let mensaje = 'Bienvenido ' + this.usuario
                                this.$store.commit('setLoginId', response.data);
                                this.$store.commit('setMostrarAlerta', true);
                                this.$store.commit('setClaseAlerta', 1);
                                this.$store.commit('setMensajeAlerta', mensaje);  
                                this.$router.push('/panelAdmin');
                            }else{
                                $('.mensaje').append('<p class="text-danger">Usuario incorrecto</p>')

                            }
                        
                    })
                    .catch(error => {
                        $('.mensaje').html('<p class="text-danger">Usuario incorrecto</p>')
                        console.error('Error ingresar Admin:', error);
                    });
            


        },
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
