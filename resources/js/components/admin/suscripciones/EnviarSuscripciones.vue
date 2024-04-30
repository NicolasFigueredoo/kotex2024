<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>ENVIAR SUSCRIPCION</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Asunto</label>
                <input type="text" class="form-control" id="asunto" > 
            </div>

            <div class="mb-3">
                <label class="form-label">Mensaje</label>
                <textarea type="text" class="form-control" id="texto" style="height: 200px;" > </textarea>
            </div>

            <div class="w-100 d-flex justify-content-end">
                <button @click="enviarMensajeSub()" type="button" class="btn"
                    style="background-color: rgb(52, 68, 127); color: white;">Enviar</button>
            </div>
        
        </form>



    </div>

</template>

<script>
import 'jquery';
import 'bootstrap';
import axios from 'axios';
export default {

    methods: {
        enviarMensajeSub() {
            axios.post('/api/enviarMensajeSub', 
            {
                asunto: $('#asunto').val(),
                texto: $('#texto').val()

            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Suscripcion enviada con éxito');
                    this.$store.commit('mostrarComponente', 17);

                })
                .catch(error => {
                    console.error(error);
                });

                
        },
     
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
