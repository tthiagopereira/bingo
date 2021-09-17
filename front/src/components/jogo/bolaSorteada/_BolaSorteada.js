export default {
    name: 'bolaSorteada',
    props: ['bola', 'cor'],
    data(){
        return {
            numerosSorteados: [],
            titulo: 'Bingo',
            status: true,
        }
    },
    created() {
        // this.index()
    },
    methods: {
        index() {
            this.$http.get('/bolasorteada')
                .then(resp => {
                    this.numerosSorteados = resp.data
                    console.log(this.numerosSorteados)
                })
        }
    }
}
