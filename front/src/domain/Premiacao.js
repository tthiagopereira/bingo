export default class Premiacao {
  constructor(moeda = '',valor = '', percentual ='', linha = '', linha_percentual ='', linha_dupla ='', linha_dupla_percentual= '', bingo='', bingo_percentual='', user_id= '') {
    this.moeda = moeda
    this.valor = valor
    this.percentual = percentual
    this.linha = linha
    this.linha_percentual = linha_percentual
    this.linha_dupla = linha_dupla
    this.linha_dupla_percentual = linha_dupla_percentual
    this.bingo = bingo
    this.bingo_percentual = bingo_percentual
    this.user_id = user_id
  }
}
