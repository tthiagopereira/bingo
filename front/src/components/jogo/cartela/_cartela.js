// @vue/component

import PageTitle from '../../template/PageTitle/PageTitle'
import {mapState} from 'vuex';
import BolaSorteada from '../bolaSorteada/BolaSorteada'
import PageAux from '../../template/PageAux/PageAux'
import Video from '../../template/video/video'

export default {
    name: 'Cartela',

    components: {
        PageTitle,
        BolaSorteada,
        PageAux,
        Video
    },

    data () {
        return {
            quantidade: 1,
            cartela: {
                user_id: null,
                partida_id: null,
                quantidade: 1
            },
            cartelas: [],
            ganhadorPremio: [],
            valorBruto: 0
        }
    },

    watch: {},

    created () {
        this.listCartelasAdquiridas()
        setInterval(() => {
            this.listCartelasAdquiridas()
            // this.ganhadorIndividual()
        }, 4000)
        setInterval(() => {
            this.ganhadorIndividual()
        }, 5000)
        this.getValorBruto2()
    },
    mounted () {},
    methods: {
        maisCartelas() {
            this.cartela.quantidade++
        },
        menosCartelas() {
            if(this.cartela.quantidade > 1) {
                this.cartela.quantidade--
            }
        },
        registerCartela($id) {
            this.cartela.user_id = $id
            console.log(this.cartela.partida_id)
            this.$http.post('cartela', this.cartela)
                .then(resp => {
                    console.log(resp.data)
                    this.$toasted.success("Quantidade registrada com sucesso !", {theme: "bubble", position: "top-right", duration : 10000});
                    this.listCartelasAdquiridas()
                })
        },
        listCartelasAdquiridas() {
            this.$http.get('minhasCartelas/'+this.user.id)
                .then(resp => {
                    this.cartelas = resp.data

                })
        },
        ganhadorIndividual() {
            this.$http.get('/ganhador-user/'+this.user.id)
                .then(resp => {
                    this.ganhadorPremio = resp.data
                })
        },
        getValorBruto2() {
            this.$http.get('valorreceita')
                .then(resp => {
                    this.valorBruto = resp.data
                })
        }
    },

    computed: mapState(['isMenuVisible','user']),

}
