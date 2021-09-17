// @vue/component
import FormPremiacao from '../../../domain/Premiacao'
import axios from 'axios';
export default {
    name: 'Premiacao',

    components: {},

    mixins: [],

    props: {},

    data () {
        return {
            exibirForm: false,
            premiacao: new FormPremiacao(),
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
                this.$http.put(`/premiacao/${this.item_id}`, this.premiacao)
                    .then(() => {
                        this.exibirForm = false
                        this.index()
                        this.$toasted.info("Registrado com sucesso", {theme: "bubble", position: "top-right", duration : 10000});
                    })
            }else {
                this.$http.post('/premiacao', this.premiacao)
                    .then(() => {
                        this.exibirForm = false
                        this.index()
                        this.$toasted.success("Registrado com sucesso", {theme: "bubble", position: "top-right", duration : 10000});
                    })
            }

        },
        index() {
            axios.get('/premiacao')
                .then(resp => {
                    this.itens = resp.data
                })
        },
        loadPremiacao(premiacao, mode = 'store') {
            this.mode = mode
            this.premiacao = {...premiacao}
        },
        destroy(id) {
            this.$http.delete('/premiacao/'+id)
                .then(() => this.index());
                this.$toasted.error("Deletado com sucesso", {theme: "bubble", position: "top-right", duration : 10000});
        },

        edit(premiacao){
            console.log(premiacao)
            this.premiacao = premiacao
            this.exibirForm = true
            this.item_id = premiacao.id
        }
    }
}
