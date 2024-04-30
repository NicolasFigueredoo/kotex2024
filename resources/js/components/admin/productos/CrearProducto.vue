<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>Crear producto</h1>
        </div>



        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Nombre producto</label>
                <input type="text" class="form-control" id="direccion">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Material</label>
                    <input type="text" class="form-control" id="email">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="telefono">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Categorias</label>
                    <div class="d-flex mt-2">

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox1">
                            <label class="form-check-label" for="checkbox1">Productos de linea</label>
                        </div>
                        <div class="form-group form-check" style="margin-left: 20px;">
                            <input type="checkbox" class="form-check-input" id="checkbox2">
                            <label class="form-check-label" for="checkbox2">Productos especiales</label>
                        </div>
                        <div class="form-group form-check" style="margin-left: 20px;">
                            <input type="checkbox" class="form-check-input" id="checkbox3">
                            <label class="form-check-label" for="checkbox3">Destacado</label>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Color</label>
                    <input type="text" class="form-control" id="facebook">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Medida (ej:5mm)</label>
                    <input type="text" class="form-control" id="instagram">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="instagram">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Unidad venta</label>
                    <input type="text" class="form-control" id="instagram">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Aplicacion</label>
                    <select @change="aplicacionSelect()" id="aplicacionSelect" class="form-select" aria-label="Default select example" style="height: 50px;">
                        <option selected>Open this select menu</option>
                        <option value="Indumentaria">Indumentaria</option>
                        <option value="Ropa interior">Ropa interior</option>
                        <option value="Calzado">Calzado</option>
                    </select>
                </div>


            </div>

            <div class="row mt-2 w-100">
                <label class="form-label">Aplicaciones</label>
                <div id="contenedorAplicaciones">
                   
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end">

                <button @click="updateContacto()" type="button" class="btn mt-3"
                    style="background-color: rgb(52, 68, 127); color: white;">Crear</button>

            </div>

        </form>



    </div>

</template>

<script>
import 'jquery';
import 'bootstrap';
import axios from 'axios';

export default {

    data() {
        return {
            usuario: null,
            email: null,
            contraseña: null,
            aplicaciones: []
        }

    },
    methods: {
        aplicacionSelect(){
            let aplicacion = $('#aplicacionSelect').val();
            this.aplicaciones.push(aplicacion);
            $('#contenedorAplicaciones').append(
                `<button type="button" class="btn"
                style="background-color: rgb(52, 68, 127); color: white; margin-left:10px">${aplicacion}</button>`
            )
            console.log(this.aplicaciones)

        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        crearUsuario() {
            axios.post('/api/crearUsuario', {
                usuario: this.usuario,
                email: this.email,
                contraseña: this.contraseña
            })
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.error('Error ingresar Admin:', error);
                });

        },
    },


}
</script>


<style scoped>

.form-check-input:checked {
    background-color: rgba(51, 68, 127, 1);
    border-color: rgba(51, 68, 127, 1);
}

</style>