<template>
  <div class="presupuestoDiv">
    <div class="indicador">
      <p>Inicio > Presupuesto</p>
    </div>
    <div class="formulario">

      <form class="mt-3" style="width: 77.5%; margin-left: 20px;">
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

        <div class="row">
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

    <div class="tabla">
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
            <td id="botonAgregar" style="padding-right: 0px; padding-left: 0px">
              <button id="agregar" type="button" style="border-radius: 0%" class="btn btn-primary"
                @click="deleteProducto(registro.idRegistro)">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash"
                  viewBox="0 0 16 16">
                  <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                  <path
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                </svg>
              </button>
            </td>



          </tr>
        </tbody>
      </table>
      <div class="addProducto">
        <router-link class="route" to="/productosespeciales" :style="{ fontWeight: isRouteActive('/productosespeciales') ? 'bold' : '500' }">

        <button id="agregarProducto" type="button" style="border-radius: 0%;" class="btn btn-primary">+ AGREGAR MAS PRODUCTOS</button>
      </router-link>

      </div>
    </div>

    <div class="foot">
      <div class="form-floating mensaje">
        <span>Mensaje</span>
        <textarea class="form-control" placeholder="Leave a comment here" id="mensaje"
          style="height: 177px; border-radius: 0%;"></textarea>
      </div>
      <div class="file">
        <div>
          <span>Adjuntar archivo</span>
        </div>
        <div class="file-select" id="src-file1">
          <input id="fileArchive" @change="onFileChange()" class="form-control" ref="fileArchive" type="file" name="src-file1" aria-label="Archivo">
        </div>

        <div>
          <button @click="enviarPresupuesto()" id="presupuesto" type="button" style="border-radius: 0%;" class="btn btn-primary">ENVIAR PRESUPUESTO</button>
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
  
  data(){
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
  methods:{
    deleteProducto(idRegistro){
        this.$store.commit('eliminarRegistro', idRegistro );
    },
    isRouteActive(route){
      this.$store.commit('setSelectedProductId', null);

      return this.$route.path === route;
    },
    onFileChange(event) {
      const FILE = this.$refs.fileArchive;
      this.file = FILE.files[0]

    },
    enviarPresupuesto(){
      if(!$('#nombre').val() || !$('#apellido').val() || !$('#email').val()){
        $('#mensajePresupuesto').html('<p class="textE text-danger ">Presupuesto fallido faltan rellenar campos obligatorios</p>')
      }else{
        $('#mensajePresupuesto').html('<p class="textE text-success ">Enviando..</p>')

      axios.post('/api/enviarPresupuesto', 
            {
              nombre: $('#nombre').val(),
              apellido: $('#apellido').val(),
              email: $('#email').val(),
              celular: $('#celular').val(),
              mensaje: $('#mensaje').val(),
              productos: this.registros,
              file: this.file,
             
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



    }
  }

}
</script>

<style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');



 

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
  margin-left: 17%;
  font-size: 15px;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 60px;
}

.formulario {
  display: flex;
  flex-direction: row;
  width: 100%;
  padding-left: 16%;
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
  margin-left: 17%;
  width: 65.2%;
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

.foot {
  margin-top: 50px;
  margin-left: 17.5%;
  display: flex;
  margin-bottom: 200px;

}

.mensaje {
  width: 650px;
}

.file {
  display: flex;
  flex-direction: column;
  margin-left: 1%;
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
  width: 565px;
  height: 45px;
  display: inline-block;
}

#presupuesto {
  margin-left: 49%;
  margin-top: 80px;
  background: rgba(51, 68, 127, 1);
  border: none;
  font-family: "Montserrat";
  font-size: 16px;
  font-weight: 300;
  width: 290px;
  height: 50px;
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

#mensajePresupuesto{
  font-family: "Montserrat";
  font-size: 15px;
  font-weight: 500;
}

@media only screen and (max-width: 1200px) {
  .foot{
    display:flex;
    flex-direction: column

  }

  #src-file1{
    width: 30%
  }

}

@media only screen and (max-width: 900px) {
  .foot{
    display:flex;
    flex-direction: column

  }

  #src-file1{
    width: 80%
  }

  #mensaje{
    width:65%
  }

  #presupuesto{
    margin-left: 0px;
  }

  .tabla{
    margin-left:0px;
  }

}

@media only screen and (max-width: 600px) {
  .tabla{
    font-size: 12px;
  }

  .tabla th{
    font-size: 12px;
  }
}

@media only screen and (max-width: 500px) {
  .tabla{
    font-size: 8px;
    width: 100%;
  }
  .tabla th{
    font-size: 8px;
  }
  .foot{
    margin-left: 0px;
  }
}
</style>
