// @vue/component
import PageTitle from '../../template/PageTitle/PageTitle'
import {mapState} from 'vuex';
export default {
    name: 'Ganhadores',

    components: {PageTitle},

    mixins: [],

    props: ['ganhadores'],

    data () {
        return {
            // ganhadores: [],
        }
    },

    computed: mapState(['user']),

    watch: {},

    created () {
        this.index()
    },

    methods: {
        index() {

        }
    }
}
