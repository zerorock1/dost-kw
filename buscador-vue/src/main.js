import Vue from 'vue'
//import App from './App.vue'
import Main from './Main.vue'
import App from './App.vue'
import Ficha from './components/Ficha.vue'
import store from './store'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.config.productionTip = false

const routes = [
  { path: '/', component: App },
  { path: '/ficha/:idficha', component: Ficha }
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

new Vue({
  store,
  router,
  render: h => h(Main)
}).$mount('#app-buscador-vue')
