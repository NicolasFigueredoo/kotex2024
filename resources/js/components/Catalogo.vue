<template>
  <div>
    <div class="container d-flex">

    <div class="justify-content-start indicador" style="margin-left: 0%">
      <p><b>Inicio ></b> Catalogo </p>
    </div>
    </div>
    <div class="container">
      <div class="row d-flex justify-content-center" style="margin-bottom: 330px;">
        <div class="col-lg-4" style="width: 270px; height: 339px; padding-right: 0px; margin-right: 0px;">
          <img :src="getImagen(catalogoImagen)" alt="" style="width: 100%; height: 100%;">
        </div>

        <div class="col-lg-5" style="background-color: green; padding-left: 50px; padding-right: 120px; background-color: #FAFAFA;">
          <div style="margin-top: 50px;">
            <p class="catalogoTitle">{{ catalogoTitulo }}</p>
          </div>

          <div style="margin-top: 40px;">
            <div class="catalogoText" v-html="catalogoTexto"> </div>
          </div>

          <div class="botones">
          <button @click="descargarArchivo()" type="button" id="descargar" class="btn">Descargar</button>
          <a href="/api/obtenerCatalogo" target="_blank">
            <button type="button" id="visualizar" class="btn">Visualizar</button>
          </a>
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
      catalogo: null,
      link: null,
      catalogoTitulo: null,
      catalogoTexto: null,
      catalogoImagen: null
    }
  },

  methods: {
    getImagen(fileName){
      if(fileName){
      const filePath = fileName.split('/').pop();
      return '/api/getImage/' + filePath
    }

    },
    descargarArchivo() {
      axios.get('/api/obtenerCatalogo',{ responseType: 'blob' })
        .then(response => {
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement('a');
          this.link = url;
          link.href = url;
          link.setAttribute('download', 'catalogo.pdf');
          document.body.appendChild(link);
          link.click();

        })
        .catch(error => {
          console.error(error);
        });
    },

    obtenerCatalogoInformacion(){
      axios.get('/api/obtenerCatalogoDate',)
        .then(response => {
          this.catalogoTitulo = response.data.titulo;
          this.catalogoTexto = response.data.texto;
          this.catalogoImagen = response.data.imagen

        

        })
        .catch(error => {
          console.error(error);
        });
    }
  },
  mounted(){
    this.obtenerCatalogoInformacion()
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

#descargar {
  background-color: #2F3F78;
  color: white;
  border-radius: 0%;
  width: 184px;
  height: 49px;
}

#visualizar {
  background-color: white;
  color: black;
  border-radius: 0%;
  margin-left: 20px;
  width: 184px;
  height: 49px;
  color: #2F3F78;
}

.catalogoTitle {
  
  color: #131313;
font-family: Montserrat;
font-size: 24px;
font-style: normal;
font-weight: 500;
line-height: normal;
  

}

.catalogoText {
  font-weight: 400;
  font-family: "Montserrat", sans-serif;
  font-size: 16px;
}

.catalogoBotones {
  display: flex;
  flex-direction: column;
  padding: 70px;
  font-weight: 400;
  font-family: "Montserrat", sans-serif;
  font-size: 13px;
  width: 100%;
}

.botones {
  display: flex;
  justify-content: start;
  margin-top: 60px;
}

.indicador {
  color: black;
  margin-top: 10px;
  font-size: 15px;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  line-height: 60px;
}

.catalogo {
  background-color: #FAFAFA;
  display: flex;
  justify-content: center;
  margin-left: 32%;
  margin-right: auto;
  width: 55%;
  margin-bottom: 311px;
  height: 339px;


}

.informacionCatalogo {
  display: flex;
  justify-content: start;
}

#imgCatalogo {
  width: 265px;
  height: 339px;
}


@media only screen and  (max-width: 1800px) {



  .catalogoBotones{
    width: 400px;

  }

  .catalogoTitle{
    font-size: 20px;
  }

 }

 @media only screen and  (max-width: 1200px) {


.catalogoBotones{
  width: 400px;

}

.catalogoTitle{
  font-size: 20px;
}

}

@media only screen and  (max-width: 800px) {
  .catalogo {
    width: 48%;
    margin-top: 200px;
  display: flex;
  flex-direction: column

}
.catalogoBotones{
  padding: 50px;
}
}

@media only screen and  (max-width: 500px) {
  .catalogo {
    width: 60%;
    margin-bottom: 200px;

}

.catalogoBotones{
  width: 100%;
  padding: 0px;
}


.catalogoTitle{
  font-size: 15px;
}
.catalogoText{
  font-size: 15px;
  width: 150px;
}
.informacionCatalogo{
  width: 100%
}
#imgCatalogo{
  width: 100%
}

.botones{
  display: flex;
  flex-direction: column
}
}

@media only screen and  (max-width: 250px) {

  #descargar{
    width: 100px;
  }
  #visualizar{
    width: 100px;
  }

}
</style>
