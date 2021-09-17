// @vue/component
export default {
    name: 'Start',

    components: {},

    mixins: [],

    props: ['title','value','icon','calor'],

    data () {
        return {}
    },

    computed: {
        style() {
            return "color: "+(this.color || "#000")
        }
    },

    watch: {},

    created () {},

    methods: {}
}
