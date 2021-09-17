<template>
  <div id="app" :class="{'hide-menu': !isMenuVisible || !user}">
    <Header
        titulo = "Pipas - Bingo"
        :hide-toggle="!user"
        :hide-drop-down="!user"/>
<!--    <PageTitle />-->
    <Menu v-if="user"/>
    <Loading v-if="validatatingTotken"/>
    <Content v-else/>
    <Footer />
  </div>
</template>

<script>

import {mapState} from 'vuex'
import Header from './components/template/header/header'
import Content from './components/template/content/content'
import Menu from './components/template/menu/menu'
import Footer from './components/template/footer/footer'
import {userKey} from './global';
import Loading from './components/template/loading/loading'

export default {
  name: 'App',
  components: {
    Header,
    Content,
    Menu,
    Footer,
    Loading
  },
  computed: mapState(['isMenuVisible','user']),

  data(){
    return {
      validatatingTotken: true
    }
  },
  created() {
    this.validateToken()
  },
  methods: {
    async validateToken() {
      this.validatatingTotken = true
      const json = localStorage.getItem(userKey)
      const userDate = JSON.parse(json)
      this.$store.commit('setUser', null)
      if(!userDate) {
        this.validatatingTotken = false
        return this.$router.push({name: 'auth'})
      }
      const res = await this.$http.post('me', userDate)
      if(res.data) {
        this.$store.commit('setUser', userDate)
      }else{
        localStorage.removeItem(userKey)
        this.$router.push({name: 'auth'})
      }
      this.validatatingTotken = false
    }
  },
}
</script>

<style>
  *{
    font-family: "Lato", sans-serif;
  }
  body {
    margin: 0;
  }

  #app {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;

    height: 100vh;
    display: grid;
    grid-template-rows: 60px 1fr 40px;
    grid-template-columns: 300px 1fr;
    grid-template-areas:
        "header header"
        "menu content"
        "menu footer";
  }

  #app.hide-menu {
    grid-template-areas:
    "header header"
    "content content"
    "footer footer"
  ;
  }
</style>
