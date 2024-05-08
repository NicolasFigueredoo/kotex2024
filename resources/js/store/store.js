import { createStore } from 'vuex';

export default createStore({
  state: {
    selectedProductId: null,
    selectedAplicacionId: null,
    registros: JSON.parse(localStorage.getItem('registros')) || [],
    mostrarComponente: 0,
    idSliderHome: null,
    idCategoriaHome: null,
    idUsuario: null,
    idRed: null,
    idContacto: null,
    idLogo: null,
    idSeccion: null,
    idServicio: null,
    idAplicacion: null,
    idProducto: null,
    idMetadato:null,
    mensajeAlerta: null,
    mostrarAlerta: null,
    alertaClase: null,
    summer: null,
    idLogin: JSON.parse(localStorage.getItem('idLogin')) || null,
    

  },
  mutations: {

    setSummer(state,bool){
      state.summer = bool
    },
    setMetadatoId(state,idMetadato){
      state.idMetadato = idMetadato
    },
    setLoginId(state,idLogin){
      state.idLogin = idLogin
      localStorage.setItem('idLogin', JSON.stringify(state.idLogin));

    },
    setProductoId(state,idProducto){
      state.idProducto = idProducto
    },
    setAplicacionId(state,idAplicacion){
      state.idAplicacion = idAplicacion
    },
    setServicioId(state,idServicio){
      state.idServicio = idServicio
    },
    setSeccionId(state,idSeccion){
      state.idSeccion = idSeccion
    },
    setClaseAlerta(state,alertaClase){
      state.alertaClase = alertaClase
    },
    setMostrarAlerta(state,mostrarAlerta){
      state.mostrarAlerta = mostrarAlerta
    },
    setMensajeAlerta(state,mensajeAlerta){
      state.mensajeAlerta = mensajeAlerta
    },
    setLogoId(state,idLogo){
      state.idLogo = idLogo
    },
    setContactoId(state,idContacto){
      state.idContacto = idContacto
    },
    setRedId(state,idRed){
      state.idRed = idRed
    },
    setUsuarioId(state,idUsuario){
      state.idUsuario = idUsuario
    },
    setCategoriaIdComponent(state,idCategoriaHome){
      state.idCategoriaHome = idCategoriaHome
    },
    setSliderIdComponent(state,idSliderHome){
      state.idSliderHome = idSliderHome
    },
    mostrarComponente(state,idComponente){
      state.mostrarComponente = idComponente
    },
 
    agregarRegistro(state, nuevoRegistro ) {
      state.registros.push(nuevoRegistro);
      localStorage.setItem('registros', JSON.stringify(state.registros));
    },

    eliminarRegistro(state, idRegistro ) {
      state.registros = state.registros.filter(registro => registro.idRegistro !== idRegistro);
      localStorage.setItem('registros', JSON.stringify(state.registros));
    },

    updateRegistros(state, registros) {
      state.registros = registros;
      localStorage.setItem('registros', JSON.stringify(registros));
        },


    setSelectedProductId(state, productId) {
        state.selectedProductId = productId;
    },

      setSelectedAplicacionId(state, aplicacionId) {
        state.selectedAplicacionId = aplicacionId;
      }
  },
 
  getters: {

    getSummer(state){
      return state.summer;

    },
    getIdMetadato(state){
      return state.idMetadato;
    },
    getIdLogin(state){
      return state.idLogin;
    },
    getIdProducto(state){
      return state.idProducto;
    },
    getIdAplicacion(state){
      return state.idAplicacion;
    },
    getIdServicio(state){
      return state.idServicio;
    },
    getIdSeccion(state){
      return state.idSeccion;
    },
    getAlertaClase(state) {
      return state.alertaClase;
    },
    getMostrarAlerta(state) {
      return state.mostrarAlerta;
    },
    getMensajeAlerta(state) {
      return state.mensajeAlerta;
    },
    getIdLogo(state) {
      return state.idLogo;
    },
    getIdContacto(state) {
      return state.idContacto;
    },
    getIdRed(state) {
      return state.idRed;
    },
    getIdUsuario(state) {
      return state.idUsuario;
    },
    getidCategoriaHome(state) {
      return state.idCategoriaHome;
    },
    getidSliderHome(state) {
      return state.idSliderHome;
    },
    getMostrarComponente(state) {
      return state.mostrarComponente;
    },
    getSelectedProductId(state) {
      return state.selectedProductId;
    },

    getSelectedAplicacionId(state) {
      return state.selectedAplicacionId;
    },
    
    obtenerRegistros(state) {
      return state.registros;
    },

    
  
  }
});
