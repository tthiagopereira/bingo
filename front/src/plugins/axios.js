import Vue from 'vue'
import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/api/'

Vue.use({
  install(Vue) {
    Vue.prototype.$http = axios
  }
})

export function showError(e)
{
  if(e && e.response && e.response.data) {
    Vue.toasted.global.defaultError({msg: e.response.data })
  }else if(typeof e == 'string') {
    Vue.toasted.global.defaultError({msg: e})
  }else{
    Vue.toasted.global.defaultError()
  }
}
