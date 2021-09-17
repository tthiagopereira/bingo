import BolaSorteada from '../bolaSorteada/BolaSorteada'
import PageTitle from '../../template/PageTitle/PageTitle'
import Video from '../../template/video/video'
// import Ganhadores from '../ganhadores/ganhadores'
// import {mapGetters, mapState} from 'vuex';

export default {
    name: 'CardNumeroSorteado',

    components: {BolaSorteada, PageTitle, Video},

    computed: {
        // ...mapGetters(['atualizarListaGanhadores']),
        // ...mapState(['ganhadorPorLinha'])
    },

    data(){
        return {
            numerosSorteados: [],
            bola: null,
            bolaSalva: null,
            corStatusAzul: true,
            bolaNumero: null,
            ganhadores: [],
            ganhadoresLinhaDupla: [],
            valorBruto: 0
        }
    },

    created() {
        this.index()
        setInterval(() => {
            this.getGanhadores()
            this.getGanhadoresDupla()
        }, 3000)
    },

    methods: {
        index() {
            this.$http.get('/bolasorteada/1')
                .then(resp => {
                    this.numerosSorteados = resp.data
                    this.getGanhadores()
                    this.getGanhadoresDupla()
                })
        },
        bolaSorteada(bola) {

            this.bola = bola
            this.bolaNumero = bola.bola
            this.corStatusAzul = true
            this.$toasted.info("Bola selecionada !", {theme: "bubble", position: "top-right", duration : 3000});

        },
        bolaSorteadaSalvar(bola) {
            this.bolaSalva = bola.id
            this.$http.get('/bola/'+bola.id)
                .then(() => {
                    this.index()
                    this.$toasted.success("Bola registrada !", {theme: "bubble", position: "top-right", duration : 3000});
                })
            this.corStatusAzul = false
        },
        getGanhadores() {
            this.$http.get('ganhadores/1')
                .then(res => {
                    this.ganhadores = res.data
                    console.log('to dentro de ganhador')
                    console.log(res.data)
                })
        },
        getGanhadoresDupla() {
            this.$http.get('ganhadores-dupla/1')
                .then(res => {
                    this.ganhadoresLinhaDupla = res.data
                    console.log('to dentro de ganhador duplo')
                    console.log(res.data)
                })
        },

    }

}
