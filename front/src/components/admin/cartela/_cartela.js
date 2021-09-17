// @vue/component
export default {
    name: 'Cartela',

    components: {},

    mixins: [],

    props: {},

    data () {
        return {
            itens: [],
        }
    },

    computed: {},

    watch: {},

    created () {
        this.index()
    },

    methods: {
        index() {
            this.$http.get('/cartela')
                .then(resp => {
                    this.itens = resp.data
                    console.log(resp.data)
                })
        }
    }
}
