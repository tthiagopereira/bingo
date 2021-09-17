// @vue/component
import PageTitle from '../template/PageTitle/PageTitle'
import Stat from '../home/start/start'
import Ganhadores from '../jogo/ganhadores/ganhadores'

export default {
    name: 'Home',

    components: {PageTitle, Stat, Ganhadores},

    mixins: [],

    props: {},

    data () {
        return {
            stat: {},
            quantidadeJogador: 0,
            quantidadeCartela: 0,
            valor: 0,
            ganhadores: [],
            ganhadoresLinhaDupla: []
        }
    },

    computed: {},

    watch: {},

    created () {
        this.getQuantidadeJogador()
        this.getQuantidadeCartela()
        this.getValorBruto()
        this.getGanhadores()
        this.getGanhadoresDupla()
    },

    methods: {
        getState() {

        },
        getQuantidadeJogador() {
            this.$http.get('/quantidadeJogador')
                .then(resp => {
                    this.quantidadeJogador = resp.data
                })
        },
        getQuantidadeCartela() {
            this.$http.get('quantidadeCartelas')
                .then(resp => {
                    this.quantidadeCartela = resp.data
                })
        },
        getValorBruto() {
            this.$http.get('valorreceita')
                .then(resp => {
                    this.valor = resp.data
                })
        },
        getGanhadores() {
            this.$http.get('ganhadores/1')
                .then(res => {
                    this.ganhadores = res.data
                })
        },
        getGanhadoresDupla() {
            this.$http.get('ganhadores-dupla/1')
                .then(res => {
                    this.ganhadoresLinhaDupla = res.data
                })
        }
    }
}
