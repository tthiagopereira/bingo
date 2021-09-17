import Vue from 'vue'
import VueRouter from 'vue-router';

import Home from '../components/home/home'
import PageAdmin from '../components/admin/adminPages/adminPages'
import Bingo from '../components/jogo/Bingo/Bingo'
import Jogador from '../components/jogador/areaJogador/areaJogador'
import Cartela from '../components/jogo/cartela/cartela'
import Auth from '../components/auth/auth'
import Financeiro from '../components/admin/Financeiro/Financeiro'
import User from '../components/user/user'
import {userKey} from '../global';

Vue.use(VueRouter)

const routes = [
  {name: 'home', path: '/', component: Home},
  {
    name: 'pageAdmin',
    path: '/admin',
    component: PageAdmin,
    meta: {requiresAdmin: true}
  },
  {name: 'bingo', path: '/bingo', component: Bingo},
  {name: 'jogador', path: '/jogador', component: Jogador},
  {name: 'cartela', path: '/cartela', component: Cartela},
  {name: 'auth', path: '/auth', component: Auth},
  {name: 'financeiro', path: '/financeiro', component: Financeiro},
  {name: 'user', path: '/user', component: User}
]

const router = new VueRouter({
  // mode: 'history',
  routes
})

router.beforeEach((to, from, next) => {
  const json = localStorage.getItem(userKey)
  if(to.matched.some(record => record.meta.requiresAdmin)) {
    const user = JSON.parse(json)
    user && user.tipo == 'administrador' ? next() : next({path: '/'})
  }else{
    next()
  }
})

export default router
