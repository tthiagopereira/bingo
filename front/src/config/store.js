import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    isMenuVisible: false,
    user: null,
    ganhadorPorLinha: [],
    ganhadorPorLinhaDupla: [],
  },
  mutations: {
    toggleMenu(state, isVisible) {

      if(!state.user) {
        state.isMenuVisible = false
        return
      }

      if(isVisible === undefined) {
        state.isMenuVisible = !state.isMenuVisible
      }else{
        state.isMenuVisible = isVisible
      }
      // console.log('toggleMenu: '+state.isMenuVisible)
    },

    setUser(state, user) {
      state.user = user
      if(user) {
        axios.defaults.headers.common['Authorization'] = `bearer ${user.token}`
        state.isMenuVisible = true
      }else{
        delete axios.defaults.headers.common['Authorization']
        state.isMenuVisible = false
      }
    },

    setGanhador(state, id) {
      axios.get('ganhadores/'+id)
          .then(res => {
            state.ganhadorPorLinha = res.data
          })
    },
  },
  getters: {
    atualizarListaGanhadores(state) {
      let id = 1;
      axios.get('ganhadores/'+id)
          .then(res => {
            state.ganhadorPorLinha = res.data
          })
    }
  }
})
