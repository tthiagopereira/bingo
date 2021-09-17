// @vue/component
import DropdownUser from '../../UserDropdown/UserDropdown'
export default {
    name: 'Header',

    components: {DropdownUser},

    mixins: [],

    props: {
        titulo: String,
        hideToggle: Boolean,
        hideDropDown: Boolean
    },

    data () {
        return {}
    },

    computed: {
        icon() {
            return this.$store.state.isMenuVisible ? "fa-angle-left" : "fa-angle-down"
        }
    },

    watch: {},

    created () {},

    methods: {
        toggleMenu() {
            this.$store.commit('toggleMenu')
        }
    }
}
