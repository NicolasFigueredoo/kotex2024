<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR PRODUCTO</h1>
        </div>


        <form class="mt-3">
            <div class="row">
                <div class="col-md-10">
                    <label class="form-label">Nombre producto</label>
                    <input type="text" class="form-control" id="nombre" :value="this.nombre">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Orden</label>
                    <input type="text" class="form-control" id="orden" :value="this.orden">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Material</label>
                    <input type="text" class="form-control" id="material" :value="this.material">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="tipo" :value="this.tipo">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Categorias</label>
                    <div class="d-flex mt-2">

                        <div v-for="categoria in categorias" :key="categoria.id">
                            <div style="margin-left: 10px;">
                                <input style="margin-right: 8px;" type="checkbox" class="form-check-input"
                                    :id="categoria.valor">
                                <label class="form-check-label" for="checkbox1">{{ categoria.texto }}</label>
                            </div>
                        </div>
                        <div class="form-group form-check" style="margin-left: 20px;">
                            <input type="checkbox" class="form-check-input" id="destacado">
                            <label class="form-check-label" for="checkbox3">Destacado</label>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" :value="this.color">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Imagen (Tamaño recomendado 285x273)</label>
                    <input @change="guardarFoto()" type="file" ref="fotoProduct" class="form-control" id="imagen">
                </div>
                <div class="col-md-6">
                    <label class="form-label mt-2">Imagen secundaria (Tamaño recomendado 285x273)</label>
                    <input @change="guardarFoto2()" type="file" ref="fotoProduct2" class="form-control" id="imagen">
                </div>


            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Medida (ej:5mm)</label>
                    <input type="text" class="form-control" id="medida" :value="this.medida">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Unidad venta</label>
                    <input type="text" class="form-control" id="unidad" :value="this.unidad">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Aplicacion</label>
                    <select @change="aplicacionSelect()" id="aplicacionSelect" class="form-select"
                        aria-label="Default select example" style="height: 50px;">
                        <option selected>Seleccionar</option>
                        <option v-for="aplicacion in aplicaciones" :key="aplicacion.id" :value="aplicacion.id">{{
                        aplicacion.nombre }}</option>

                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Aplicaciones</label>
                    <div id="contenedorAplicaciones">
                        <button v-for="app in aplicacionProducto" :key="app.id" type="button" class="btn"
                            style="background-color: rgb(52, 68, 127); color: white; margin-left:10px">
                            {{ app.nombre }}
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"
                                @click="deleteApp(app.id)">
                                <path fill="#ffffff"
                                    d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


            <div class="w-100 d-flex justify-content-end">
                <button @click="updateProducto()" type="button" class="btn mt-3"
                    style="background-color: rgb(52, 68, 127); color: white;">Guardar</button>
            </div>

        </form>
    </div>

</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            orden: '',
            nombre: '',
            tipo: '',
            medida: '',
            unidad: '',
            material: '',
            foto: null,
            producto: [],
            aplicacionProducto: [],
            aplicaciones: [],
            aplicacionesProducto: [],
            fotoProducto: null,
            fotoProducto2: null,
            productoLinea: null,
            productoEspecial: null,
            productoDestacado: null,
            categorias: []

        }
    },

    computed: {
        idProducto() {
            return this.$store.getters['getIdProducto'];
        },
    },
    methods: {
        obtenerCategoriasHome() {

            axios
                .get("/api/obtenerCategoriasHome")
                .then((response) => {
                    this.categorias = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });

        },
        updateProducto() {
            let linea = $('#linea').prop("checked");
            let especial = $('#especial').prop("checked");
            let destacado = $('#destacado').prop("checked");

            if (linea === true) {
                this.productoLinea = 1;
            }
            if (especial === true) {
                this.productoEspecial = 1;
            }
            if (destacado === true) {
                this.productoDestacado = 1;
            }

            axios.post('/api/updateProducto', {
                idProducto: this.idProducto,
                orden: $('#orden').val(),
                nombre: $('#nombre').val(),
                material: $('#material').val(),
                tipo: $('#tipo').val(),
                linea: this.productoLinea,
                especial: this.productoEspecial,
                destacado: this.productoDestacado,
                color: $('#color').val(),
                medida: $('#medida').val(),
                imagen: this.fotoProducto,
                imagen2: this.fotoProducto2,
                unidad: $('#unidad').val(),
                aplicaciones: this.aplicacionProducto
            },
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }

            )
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Producto actualizado con éxito');
                    this.$store.commit('mostrarComponente', 25);

                })
                .catch(error => {
                    console.error('Error ingresar Admin:', error);
                });

        },
        guardarFoto() {
            const file = this.$refs.fotoProduct;
            this.fotoProducto = file.files[0]
        },
        guardarFoto2() {
            const file = this.$refs.fotoProduct2;
            this.fotoProducto2 = file.files[0]
        },
        obtenerAplicaciones() {
            axios.get('/api/aplicaciones')
                .then(response => {
                    this.aplicaciones = response.data
                })
                .catch(error => {
                    console.error(error);
                });
        },
        deleteApp(id) {
            this.aplicacionProducto = this.aplicacionProducto.filter(app => app.id !== id);
        },
        aplicacionSelect() {
            let app = this.aplicaciones.find(aplicacion => aplicacion.id == $('#aplicacionSelect').val());
            let aplicacion = { id: app.id, nombre: app.nombre }
            this.aplicacionProducto.push(aplicacion);
        },
        obtenerProducto() {
            axios.get(`/api/obtenerProducto/${this.idProducto}`)
                .then(response => {
                    this.producto = response.data
                    this.nombre = response.data[0].producto.nombre
                    this.orden = response.data[0].orden
                    this.material = response.data[0].material
                    this.tipo = response.data[0].tipo
                    this.color = response.data[0].color
                    this.medida = response.data[0].medida
                    this.unidad = response.data[0].unidades_venta[0].unidad

                    setTimeout(function () {
                        response.data[0].categorias.forEach(element => {
                            if (element.id == 1) {
                                $('#linea').prop('checked', true);
                            }
                            if (element.id == 2) {
                                $('#especial').prop('checked', true);
                            }
                            if (element.id == 3) {
                                $('#destacado').prop('checked', true);
                            }
                        });
                    }, 100);


                    response.data[0].aplicaciones.forEach(element => {
                        let aplicacion = { id: element.id, nombre: element.nombre }
                        this.aplicacionProducto.push(aplicacion);

                    });

                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerCategoriasHome();
        this.obtenerProducto()
        this.obtenerAplicaciones()
    }

}
</script>

<style scoped>
.form-check-input:checked {
    background-color: rgba(51, 68, 127, 1);
    border-color: rgba(51, 68, 127, 1);
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
