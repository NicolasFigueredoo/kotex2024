import { createRouter, createWebHashHistory } from 'vue-router';
import Nosotros from '../views/nosotros/NosotrosView.vue';
import Catalogo from '../views/catalogo/CatalogoView.vue';
import Presupuesto from '../views/presupuesto/PresupuestoView.vue';
import Contacto from '../views/contacto/ContactoView.vue';

import ProductosLinea from '../views/productosDeLinea/ProductosLineaView.vue';
import ProductosEspeciales from '../views/productosEspeciales/ProductosEspecialesView.vue';

import Aplicaciones from '../views/aplicaciones/AplicacionesView.vue';
import Home from '../views/home/HomeView.vue';
import Admin from '../views/admin/login/AdminView.vue';
import PanelAdmin from '../views/admin/panel/panelView.vue';


const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/home',
        name: 'Home',
        component: Home
    },
    {
        path: '/nosotros',
        name: 'nosotros',
        component: Nosotros
    },   
    {
        path: '/productosdelinea',
        name: 'ProductosLinea',
        component: ProductosLinea
    },
    {
        path: '/productosespeciales',
        name: 'ProductosEspeciales',
        component: ProductosEspeciales
    },
    {
        path: '/catalogo',
        name: 'Catalogo',
        component: Catalogo
    },
    {
        path: '/aplicaciones',
        name: 'Aplicaciones',
        component: Aplicaciones
    },
    {
        path: '/presupuesto',
        name: 'Presupuesto',
        component: Presupuesto
    }
    ,
    {
        path: '/contacto',
        name: 'Contacto',
        component: Contacto
    },
    {
        path: '/admin/login',
        name: 'Admin',
        component: Admin
    },
    {
        path: '/panelAdmin',
        name: 'PanelAdmin',
        component: PanelAdmin
    }

];


const router = createRouter({
    history: createWebHashHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return { left: 0, top: 0 };
    }
});


export default router;
