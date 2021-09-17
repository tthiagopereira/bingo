// @vue/component
import {userKey} from '../../global';

export default {
    name: 'Auth',

    components: {},

    mixins: [],

    props: {},

    data () {
        return {
            showSingnup: false,
            user: {
                name: '',
                email: '',
                password: '',
                confirmPassword: '123123',
                tipo: 'jogador',
                status: true,
                site_id: 1
            }
        }
    },

    computed: {},

    watch: {},

    created () {},

    methods: {
        signin() {
            this.validateLogin()
            this.$http.post('login', this.user)
                .then(resp => {
                    this.$store.commit('setUser', resp.data)
                    localStorage.setItem(userKey, JSON.stringify(resp.data))
                    this.$router.push({path: '/'})
                    this.$toasted.success("Bem vindo", {theme: "bubble", position: "top-right", duration : 10000})
                })
        },
        signup() {
            // this.validate()
            this.$http.post('register', this.user)
                .then(resp => {
                    this.user = {}
                    this.$store.commit('setUser', resp.data)
                    localStorage.setItem(userKey, JSON.stringify(resp.data))
                    this.$router.push({path: '/'})
                    this.$toasted.success("Bem vindo", {theme: "bubble", position: "top-right", duration : 10000})

                })
        },

        validate() {
            if(!this.user.name) {
                this.$toasted.info("Falta o nome", {theme: "bubble", position: "top-right", duration : 10000})
            }else if(!this.user.email){
                this.$toasted.info("Falta o email", {theme: "bubble", position: "top-right", duration : 10000})
            }else if(!this.user.password) {
                this.$toasted.info("Falta a senha", {theme: "bubble", position: "top-right", duration : 10000})
            }else if(this.user.password != this.user.confirmPassword) {
                this.$toasted.info("Senhas não conferem", {theme: "bubble", position: "top-right", duration : 10000})
            }else{
                // this.showSingnup = false
            }
        },

        validateLogin() {
            if(!this.user.email){
                this.$toasted.info("Informe o e-mail", {theme: "bubble", position: "top-right", duration : 10000})
            }else if(!this.user.password) {
                this.$toasted.info("Falta a senha", {theme: "bubble", position: "top-right", duration : 10000})
            }
        }
    }
}
