<template>
  <div>
    <div class="contenedorImg">
      <iframe class="mapa"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.809473704295!2d-58.524614623504235!3d-34.58368715644198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb7a5c4215ac1%3A0x76a652edf6c37bda!2sKotex%20srl!5e0!3m2!1ses!2sar!4v1713355691535!5m2!1ses!2sar"
        height="600" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container contacto" style="margin-bottom: 260px;">

      <div>
        <p class="titulo">Contacto</p>
      </div>
      <div class="row">


        <div class="col-lg-4 informacion" style="margin-top: 20px;">
          <div class="ubicacion" style="cursor: pointer;">
            <div style="width: 20px">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-geo-alt iconContacto" viewBox="0 0 16 16">
                <path
                  d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
              </svg>
            </div>
            <p id="ubi" style="margin-left: 20px">{{ direccion }}</p>
          </div>
          <div class="telefono" style="cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-telephone iconContacto" viewBox="0 0 16 16">
              <path
                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
            </svg>
            <p style="margin-left: 20px">{{ telefono }}</p>
          </div>
          <div class="email" style="cursor: pointer;">
            <font-awesome-icon class="iconContacto" :icon="['far', 'envelope']" @click="abrirEmail()" />
            <p style="margin-left: 20px">{{ emailC }}</p>
          </div>
        </div>

        <form id="formularioI" class="col-lg-8">
          <div class="row">
            <div class="col-lg-6">
              <span>Nombre*</span>
              <input type="text" class="form-control" v-model="nombre">
            </div>
            <div class="col-lg-6">
              <span>Apellido*</span>
              <input type="text" class="form-control" v-model="apellido">
            </div>
          </div>
          <div class="row" style="margin-top: 20px;">
            <div class="col-lg-6">
              <span>Email*</span>
              <input type="text" class="form-control" v-model="email">
            </div>
            <div class="col-lg-6">
              <span>Celular</span>
              <input type="text" class="form-control" v-model="celular">
            </div>
          </div>

          <div class="row" style="margin-top: 20px;">
            <div class="col-lg-6">
              <span>Mensaje</span>
              <textarea class="form-control" id="mensajeInput" style="width: 100%; height: 150px; border-radius: 0%;"
                v-model="mensaje"></textarea>
            </div>
            <div class="col-lg-6">
              <div style="margin-top: 20px;">
                <p>*Datos Obligatorios</p>
              </div>
              <div>
                <button id="enviarContacto" type="button" style="border-radius: 0%; width: 100%" class="btn btn-primary"
                  @click="enviarCorreo()">ENVIAR CONSULTA</button>
                <div id="mensajePresupuesto">

                </div>
              </div>
            </div>
          </div>

        </form>


      </div>

    </div>
  </div>

</template>


<script>
import axios from "axios";

export default {

  data() {
    return {
      nombre: '',
      apellido: '',
      email: '',
      celular: '',
      mensaje: '',
      telefono: null,
      emailC: null,
      whatsappLink: null,
      direccion: null
    };
  },
  methods: {

    abrirEmail() {
      const destinatario = 'kotexsrl@hotmail.com';
      const asunto = 'Contacto desde la web de kotex';
      const cuerpo = 'Hola queria consultar';

      const mailtoLink = `mailto:${destinatario}?subject=${encodeURIComponent(asunto)}&body=${encodeURIComponent(cuerpo)}`;
      window.location.href = mailtoLink;
    },
    obtenerContacto() {
      axios.get(`/api/obtenerContacto`)
        .then(response => {
          this.telefono = response.data[0].telefono
          this.emailC = response.data[0].email
          this.direccion = response.data[0].direccion



        })
        .catch(error => {
          console.error('Error al traer los contactos:', error);
        });
    },
    enviarCorreo() {

      let self = this;
      if (!this.nombre || !this.apellido || !this.email) {
        $('#mensajePresupuesto').html('<p class="text-danger">Mensaje fallido faltan rellenar campos obligatorios</p>');
        return;
      }


      grecaptcha.ready(function () {
        grecaptcha.execute('6LeJzdQpAAAAAI3K6I4CjWYz0c0dRO3K3GOfqBpc', { action: 'submit' }).then(function (token) {

          $('#mensajePresupuesto').html('<p class="text-success">Enviando..</p>');

          axios.post('/enviarCorreo', {
            nombre: self.nombre,
            apellido: self.apellido,
            email: self.email,
            celular: self.celular,
            mensaje: self.mensaje,
            recaptchaToken: token,
            recaptchaSecret: '6LeJzdQpAAAAAJycX7CjAZc5bySJlt-vNJ23eNSL'

          })
            .then(response => {
              $('#mensajePresupuesto').html('<p class="text-success">Mensaje enviado correctamente</p>');
            })
            .catch(error => {
              $('#mensajePresupuesto').html('<p class="text-danger">Mensaje fallido revisar campos</p>');
            });
        });
      });

    },
  },
  mounted() {
    this.obtenerContacto()
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

.mapa {
  width: 100%;
}




.contacto {
  background-color: white;
  margin-top: 50px;

}

.titulo {
  font-family: "Montserrat", sans-serif;
  font-size: 35px;
  font-weight: 600;
  line-height: 42.67px;
}

.informacion {
  font-size: 18px;
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
  line-height: 21.94px;
  margin-top: 18px;
}

.informacion div p:hover {
  color: #33447F;
}

.ubicacion {
  display: flex;
  width: 350px;
  font-size: 16px;
  font-family: 'Montserrat';
  font-weight: 500;
}

.telefono {
  display: flex;
  font-size: 16px;
  font-family: 'Montserrat';
  font-weight: 500;
}

.email {
  display: flex;
  font-size: 16px;
  font-family: 'Montserrat';
  font-weight: 500;
}

.iconContacto {
  align-items: center;
  font-size: 20px;
  color: #33447F;
}

.iconContacto:hover {
  transform: scale(1.2);
  transition: 0.50s;
}



.casilla span {
  font-size: 16px;
  font-family: 'Montserrat';
  font-weight: 400;
}



#enviarContacto {
  margin-top: 58px;
  background: rgba(51, 68, 127, 1);
  border: none;
  font-family: "Montserrat";
  font-size: 16px;
  font-weight: 300;
  width: 400px;
  height: 50px;
}

.enviar {
  display: flex;
  flex-direction: column;
  margin-top: 20px;
}

.form-control {
  border-radius: 0%;
}

@media only screen and (max-width: 400px) {
  .ubicacion {
    width: 100px;
  }

}
</style>