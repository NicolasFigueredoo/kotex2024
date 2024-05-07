import { createApp } from 'vue';
import App from './app.vue';
import router from './router/index.js';
import store from './store/store.js';
import VueRecaptcha from 'vue-recaptcha-v3';




//bootstrap
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'; 

//bus

//fontawesome
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faEnvelope,faEye, faCheckCircle} from '@fortawesome/free-regular-svg-icons';
import { faWhatsapp, faFacebookF, faInstagram} from '@fortawesome/free-brands-svg-icons';
import { faMagnifyingGlass, faPhone, faBullseye, faArrowRight, faLocationDot, faCubes, faGem, faTruck, faHeadset} from '@fortawesome/free-solid-svg-icons';

library.add(faEnvelope,faWhatsapp,faMagnifyingGlass, faFacebookF, faInstagram, 
    faPhone,faEye,faCheckCircle,faBullseye,faArrowRight, faLocationDot, faCubes,faGem,faTruck,faHeadset)


const app = createApp(App);
app.component('font-awesome-icon', FontAwesomeIcon)
app.use(router);
app.use(store);
app.use(VueRecaptcha, {
    siteKey: '6LeJzdQpAAAAAI3K6I4CjWYz0c0dRO3K3GOfqBpc',
    loaderOptions: {
      useRecaptchaNet: true,
      autoHideBadge: true
    }
  });
app.mount('#app'); 

