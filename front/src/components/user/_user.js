// @vue/component
import {mapState} from 'vuex';

export default {
    name: 'User',

    components: {},

    mixins: [],

    props: {},

    computed: mapState(['user']),

    data() {
        return {
            userUpdate: {
                tipo: 'jogador'
            }
        }
    },

    watch: {},

    created () {

    },

    methods: {
        updateUser() {
            this.$http.put(`user/${this.user.id}`, {
                'name': this.user.name,
                'email': this.user.email,
                'password': this.user.password,
                'tipo': this.userUpdate.tipo
            }).then(() => {
                this.$router.push({path: '/'})
                this.$toasted.success("Alterado com sucesso", {theme: "bubble", position: "top-right", duration : 10000})
            })
        }
    }
}
