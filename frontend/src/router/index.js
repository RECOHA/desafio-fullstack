import Vue from 'vue'
import Router from 'vue-router'
import Usuario from '@/components/Usuario'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    { path: '/', name: 'Usuários', component: Usuario },
    { path: '/diegoBoladao', name: 'Diego Bolado', component: Usuario }
  ]
})
