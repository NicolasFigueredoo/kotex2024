<template>
  <div class="presupuestoDiv">
    <div class="container indicador">
      <p><b> Inicio ></b> Presupuesto</p>
    </div>

    <div class="container">

      <div class="formulario">

        <form class="mt-3">
          <div class="row">
            <div class="col-md-6">
              <span>Nombre*</span>
              <input class="form-control" id="nombre" type="text">
            </div>
            <div class="col-md-6">
              <span>Apellido*</span>
              <input class="form-control" id="apellido" type="text">
            </div>
          </div>

          <div class="row" style="margin-top: 20px;">
            <div class="col-md-6">
              <span>Email*</span>
              <input class="form-control" id="email" type="text">
            </div>

            <div class="col-md-6">
              <span>Celular</span>
              <input class="form-control" id="celular" type="text">
            </div>

          </div>

        </form>


      </div>
    </div>

    <div class="container tabla">
      <table class="table table-responsive">
        <thead style="height: 40px;">
          <tr>
            <th scope="col" class="encabezado">Categoria</th>
            <th scope="col" class="encabezado">Nombre</th>
            <th scope="col" class="encabezado">Color</th>
            <th scope="col" class="encabezado">Medida</th>
            <th scope="col" class="encabezado">Unidad de Venta</th>
            <th scope="col" class="encabezado">Cant.</th>
            <th class="encabezado"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="registro in registros" :key="registro.idRegistro">
            <td>{{ registro.categoria }}</td>
            <td>{{ registro.nombre }}</td>
            <td>{{ registro.color }}</td>
            <td>{{ registro.medida }}</td>
            <td>{{ registro.unidadVenta }}</td>
            <td>{{ registro.cantidad }}</td>
            <td style="text-align: end; margin-right: 0px; padding-right: 0px;">
              <button id="agregar" type="button" style="border-radius: 0%" class="btn btn-primary"
                @click="deleteProducto(registro.idRegistro)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M14 11V17M10 11V17M6 7V19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7M4 7H20M7 7L9 3H15L17 7"
                    stroke="#33447F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
            </td>



          </tr>
        </tbody>
      </table>
      <div class="addProducto">
        <router-link class="route" to="/productosespeciales"
          :style="{ fontWeight: isRouteActive('/productosespeciales') ? 'bold' : '500' }">

          <button id="agregarProducto" type="button" style="border-radius: 0%;" class="btn btn-primary">+ AGREGAR MAS
            PRODUCTOS</button>
        </router-link>

      </div>
    </div>

    <div class="container foot" style="margin-top: 41px">
      <div class="row">

        <div class="col-lg-6 form-floating mensaje">
          <span>Mensaje</span>
          <textarea class="form-control" placeholder="Leave a comment here" id="mensaje"
            style="height: 177px; border-radius: 0%;"></textarea>
        </div>
        <div class="col-lg-6 file">
          <div>
            <span>Adjuntar archivo</span>
          </div>
          <div class="file-select" id="src-file1" style="width: 100%">
            <input id="fileArchive" @change="onFileChange()" class="form-control" ref="fileArchive" type="file"
              name="src-file1" aria-label="Archivo">
          </div>

          <div class="d-flex justify-content-end">
            <button @click="enviarPresupuesto()" id="presupuesto" type="button" style="border-radius: 0%;"
              class="btn btn-primary">ENVIAR PRESUPUESTO</button>
          </div>
          <div id="mensajePresupuesto">

          </div>
        </div>
      </div>

    </div>

  </div>
</template>

<script>
import axios from 'axios';

export default {

  data() {
    return {
      file: null

    }
  },
  computed: {
    registros() {
      const registros = this.$store.getters.obtenerRegistros;
      return registros;
    },

  },
  methods: {
    deleteProducto(idRegistro) {
      this.$store.commit('eliminarRegistro', idRegistro);
    },
    isRouteActive(route) {
      this.$store.commit('setSelectedProductId', null);

      return this.$route.path === route;
    },
    onFileChange(event) {
      const FILE = this.$refs.fileArchive;
      this.file = FILE.files[0]

    },
    enviarPresupuesto() {

      let self = this;
      if (!$('#nombre').val() || !$('#apellido').val() || !$('#email').val()) {
        $('#mensajePresupuesto').html('<p class="textE text-danger ">Presupuesto fallido faltan rellenar campos obligatorios</p>')
      } else {
        $('#mensajePresupuesto').html('<p class="textE text-success ">Enviando..</p>')



        grecaptcha.ready(function () {
          grecaptcha.execute('6LeJzdQpAAAAAI3K6I4CjWYz0c0dRO3K3GOfqBpc', { action: 'submit' }).then(function (token) {
            axios.post('/api/enviarPresupuesto',
              {
                nombre: $('#nombre').val(),
                apellido: $('#apellido').val(),
                email: $('#email').val(),
                celular: $('#celular').val(),
                mensaje: $('#mensaje').val(),
                productos: self.registros,
                file: self.file,
                recaptchaToken: token,
                recaptchaSecret: '6LeJzdQpAAAAAJycX7CjAZc5bySJlt-vNJ23eNSL'
    
              }
              , {
                headers: {
                  'Content-Type': 'multipart/form-data'
                }
              })
              .then(response => {
                $('#mensajePresupuesto').html('<p class="textE text-success ">Presupuesto enviado correctamente</p>')
              })
              .catch(error => {
                $('#mensajePresupuesto').html('<p class="textE text-danger ">Presupuesto fallido revisar campos</p>')
                console.error(error);
              });
          }

        )}
      )}
   






    }
  }

}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');




.form-control {
  border-radius: 0%;
}

.presupuestoDiv {
  min-height: 950px;
  overflow-y: auto;
}

#agregar {
  border: 1px solid rgba(51, 68, 127, 1);
  background-color: white;
  color: rgba(51, 68, 127, 1);
}

.indicador {
  color: black;
  margin-top: 10px;
  font-size: 15px;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 60px;
}



.casilla {
  display: flex;
  flex-direction: column;
  justify-content: right;
  margin-left: 20px;
}

.casilla div {
  display: flex;
  flex-direction: row;
}

.inputs div {
  display: flex;
  flex-direction: column;
}

.casilla input {
  width: 600px;
  border: 1px solid #DEDEDE
}

.casilla span {
  font-size: 16px;
  font-family: 'Montserrat';
  font-weight: 500;
}

.tabla {
  margin-top: 100px;
}

#cantidad {
  width: 60px;
}

.selects {
  border-radius: 0%;
  background-color: rgba(245, 245, 245, 1);
  border: 1px solid rgba(204, 204, 204, 1)
}

.encabezado {
  background: rgba(51, 68, 127, 1);
  color: white;
  font-family: 'Montserrat';
  font-weight: 500;
  font-size: 15px;
}

#delete {
  border: 1px solid rgba(51, 68, 127, 1);
  background-color: white;
  color: rgba(51, 68, 127, 1);
  width: 61px;
  height: 42px;
}

#botonDelete {
  text-align: right;
}

.addProducto {
  margin-top: 50px;
  text-align: left;
  color: rgba(51, 68, 127, 1);

}






.file-select {
  position: relative;
  display: inline-block;
}

.file-select::before {
  padding-left: 10px;
  background-color: white;
  color: rgba(204, 204, 204, 1);
  display: flex;
  justify-content: left;
  align-items: center;
  border-radius: 0px;
  content: 'Selccionar archivo';
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  border: 1px solid rgba(222, 222, 222, 1)
}

.file-select input[type="file"] {
  opacity: 0;
  width: 100%;
  height: 45px;
  display: inline-block;
}

#presupuesto {
  margin-top: 80px;
  background: rgba(51, 68, 127, 1);
  border: none;
  font-family: "Montserrat";
  font-size: 16px;
  font-weight: 300;
  width: 286px;
  height: 49px;
  flex-shrink: 0;
}

.rowT {
  padding-top: 15px;
}

#agregarProducto {
  border: 1px solid rgba(51, 68, 127, 1);
  color: rgba(51, 68, 127, 1);
  background-color: white;
  width: 275px;
  height: 49px;
  font-family: "Montserrat";
  font-size: 15px;
  font-weight: 500;
}

#mensajePresupuesto {
  font-family: "Montserrat";
  font-size: 15px;
  font-weight: 500;
}
</style>
