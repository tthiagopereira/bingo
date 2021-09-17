// @vue/component
import PageTitle from '../../template/PageTitle/PageTitle'
export default {
    name: 'Financeiro',

    components: {PageTitle},

    mixins: [],

    props: {},

    data () {
        return {
            money: 0,
            historico:[],
        }
    },

    computed: {},

    watch: {},

    created () {
        this.index()
    },

    methods: {
        index() {
            this.$http.get('historico')
                .then(resp => {
                    this.historico = resp.data
                    console.log(resp.data)
                })
        }
    }
}
