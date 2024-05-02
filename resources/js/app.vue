<template>
  <div>
    <Navbar_boot v-if="!isAdminRoute && !isAdminPanel"></Navbar_boot>
    <router-view></router-view>
    <Footer_boot v-if="!isAdminRoute && !isAdminPanel"></Footer_boot>
  </div>
</template>

<script>
import Navbar_boot from './components/Navbar.vue';
import Footer_boot from './components/Footer.vue';


export default {
  name: 'App',
  components: {
    Navbar_boot,
    Footer_boot
  },
  data() {
    return {
      isAdminRoute: false,
      isAdminPanel: false,
    };
  },
  created() {
    this.checkAdminRoute();
  },
  watch: {
    '$route'(to, from) {
      this.checkAdminRoute();
    }
  },
  methods: {
    checkAdminRoute() {
      this.isAdminRoute = this.$route.path.startsWith('/admin/login');
      this.isAdminPanel = this.$route.path.startsWith('/panelAdmin');

    }
  }
};
</script>
