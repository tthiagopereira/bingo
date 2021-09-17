// @vue/component
import Partida from '../../../domain/Partida';

export default {
    name: 'Partida',

    components: {},

    mixins: [],

    props: {},

    data () {
        return {
            exibirForm: false,
            partida: new Partida(),
            itens: [],
            item_id: null
        }
    },

    computed: {},

    watch: {},

    created () {
        this.index()
    },

    methods: {
        viewForm() {
            this.exibirForm = !this.exibirForm
        },
        store() {
            if(this.item_id) {
                this.$http.put(`/partida/${this.item_id}`, this.partida)
                    .then(() => {
                        this.exibirForm = false
                        this.index()
                        this.$toasted.info("Alterado com sucesso !", {theme: "bubble", position: "top-right", duration : 10000});
                    })
            }else {

                this.$http.post('/partida', this.partida)
                    .then(() => {
                        this.exibirForm = false
                        this.partida = new Partida()
                        this.index()
                        this.$toasted.success("Registrado com sucesso !", {theme: "bubble", position: "top-right", duration : 10000});
                    }
                )
            }

        },
        index() {
            this.$http.get('/partida')
                .then(resp => {
                    this.itens = resp.data
                })
        },
        loadPremiacao(partida, mode = 'store') {
            this.mode = mode
            this.partida = {...partida}
        },
        destroy(id) {
            console.log(id)
            this.$http.delete('/partida/'+id)
                .then(() => this.index());
        },

        edit(partida){
            console.log(partida)
            this.partida = partida
            this.exibirForm = true
            this.item_id = partida.id
        }
    }
}
