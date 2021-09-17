// @vue/component
import {mapState} from 'vuex'
import Gravatar from 'vue-gravatar'
import {userKey} from '../../global';

export default {
    name: 'Userdropdown',

    components: {Gravatar},

    mixins: [],

    props: {},

    data () {
        return {}
    },

    computed: mapState(['user']),

    watch: {},

    created () {},

    methods: {
        logout() {
            localStorage.removeItem(userKey)
            this.$store.commit('setUser', null)
            this.$router.push({path: 'auth'})
        }
    }
}
