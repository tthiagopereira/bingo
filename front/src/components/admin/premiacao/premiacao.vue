<template>
  <div class="premiacao">
    <div class="card" v-if="exibirForm">
      <div class="card-header">
        Registrar Premiação
      </div>
      <div class="card-body" >
        <form >
          <div class="form-group">
            <label for="exampleFormControlSelect1">Moeda</label>
            <select class="form-control mt-1" v-model="premiacao.moeda" id="exampleFormControlSelect1">
              <option disabled>Escolha uma moeda</option>
              <option>BRL</option>
              <option>USD</option>
              <option>EUR</option>
            </select>
            <small id="" class="form-text text-muted">Informe a moeda.</small>
          </div>
          <div class="form-group mt-2" >
            <label for="valor">Valor</label>
            <input type="text" v-model="premiacao.valor" class="form-control mt-2" id="valor" aria-describedby="emailHelp" placeholder="">
            <small id="valorHelp" class="form-text text-muted">Informe o valor.</small>
          </div>
          <div class="form-group mt-2" >
            <label for="percentual">Percentual</label>
            <input type="text" v-model="premiacao.percentual" class="form-control mt-2" id="percentual" aria-describedby="emailHelp" placeholder="">
            <small class="form-text text-muted">Informe o percentual.</small>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Linha </label>

                <select class="form-control mt-2" v-model="premiacao.linha" id="exampleFormControlSelect1">
                  <option disabled>Escolha uma moeda</option>
                  <option value="1">Sim</option>
                  <option value="0">Não</option>
                </select>

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group" >
                <label for="percentualLinha">Percentual linha</label>
                <input type="text" v-model="premiacao.linha_percentual" class="form-control mt-2" id="percentualLinha" aria-describedby="emailHelp" placeholder="">

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Linha dupla</label>

                <select class="form-control mt-2" v-model="premiacao.linha_dupla" id="exampleFormControlSelect1">
                  <option disabled>Escolha uma moeda</option>
                  <option value="1">Sim</option>
                  <option value="0">Não</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group " >
                <label for="percentualLinhaDupla">Percentual linha dupla</label>
                <input type="te" v-model="premiacao.linha_dupla_percentual" class="form-control mt-2" id="percentualLinhaDupla" aria-describedby="emailHelp" placeholder="">
              </div>
            </div>
          </div>
          <div class="form-group mt-2" >
            <label for="exampleInputEmail1">Bingo Percentual</label>
            <input type="text" class="form-control mt-2" v-model="premiacao.bingo_percentual" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small class="form-text text-muted">Informe o numero do bingo.</small>
          </div>
          <div class="form-group mt-2" >
            <label for="exampleInputEmail1">User Id</label>
            <input type="text" v-model="premiacao.user_id" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

          <button  @click="store" class="btn btn-primary mt-4">
            <span v-if="item_id">Alterar</span>
            <span v-else>Registrar</span>
          </button>
        </form>
      </div>
    </div>


    <div class="row" v-if="!exibirForm">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3 text-end" >
          <button class="btn btn-primary" @click="viewForm">Registrar nova premiação</button>
        </div>
      </div>
      <div class="container">
        <div class="table-responsive">
          <table class="table table-responsive">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Bingo %</th>
              <th scope="col">Moeda</th>
              <th scope="col">Valor</th>
              <th scope="col">valor%</th>
              <th scope="col">Linha 1</th>
              <th scope="col">Linha 1 %</th>
              <th scope="col">Dupla</th>
              <th scope="col">Linha 2 %</th>
              <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item) in itens" :key="item.id">
              <th scope="row">{{item.id}}</th>
              <td>{{ item.bingo_percentual }}%</td>
              <td>{{item.moeda}}</td>
              <td>{{item.valor}}</td>
              <td>{{ item.percentual }}</td>
              <td>{{ item.linha }}</td>
              <td>{{ item.linha_percentual }}</td>
              <td>{{ item.linha_dupla }}</td>
              <td>{{ item.user_id }}</td>
              <td>
                <button class="btn btn-warning col-md-offset-2" @click="edit(item)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </button>
                <button class="btn btn-danger col-md-offset-2" @click="destroy(item.id)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                  </svg>
                </button>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="mt-4"></div>
  </div>
</template>

<script src="./_premiacao.js" lang="js"></script>
<style src="./_premiacao.css" lang="css" scoped></style>
