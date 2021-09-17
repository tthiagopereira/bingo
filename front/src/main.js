import Vue from 'vue'
import App from './App.vue'
import './plugins/axios'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import './config/bootstrap'
import './config/message'
import './config/mq'
import './config/axios'
import './global'

import store from './config/store'
import router from './config/router'



// import router from './router'

Vue.config.productionTip = false

// require('axios').defaults.headers.common['Authorization'] = 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYyMzAyODcxNCwiZXhwIjoxNjIzMDMyMzE0LCJuYmYiOjE2MjMwMjg3MTQsImp0aSI6InNubDBLaVdQYWhpWElmTXciLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.eOE8ECFl5q9M05zJqIflD4Vd5_ltda93RrRHwvbOTlU'

new Vue({
  store,
  router,
  render: h => h(App),
}).$mount('#app')
