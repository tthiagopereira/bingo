import {mapState} from 'vuex'

export default {
  name: 'Menu',

  computed: mapState(['isMenuVisible', 'user']),

  methods: {
    exibirTogglo(){
      if(this.$mq === 'sm' ) {
        this.$store.commit('toggleMenu', false)
      }
    },
    esconderTagglo() {
      this.$store.commit('toggleMenu', true)
    },
    index() {

      // if(this.$mq === 'sm' || this.$mq  === 'md')
      // {
      //   this.$store.commit('toggleMenu', false)
      // }else {
      //   this.$store.commit('toggleMenu', true)
      // }
    }
  },
  created() {
    this.index()
  },
}
