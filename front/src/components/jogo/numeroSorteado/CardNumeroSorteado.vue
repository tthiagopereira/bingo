<template>
  <div class="CardNumeroSorteado">
    <Video />
    <div class="row">
      <div class="col-md-3 text-center">
        <b>Bola sorteada</b>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-5">
            <button class="btn btn-info" v-on:click="bolaSorteadaSalvar(bola)" >Registrar bola</button>
          </div>
          <div class="col-md-3">
            <BolaSorteada :bola="this.bolaNumero" :cor="this.corStatusAzul"/>
          </div>
          <div class="col-md-4"></div>
        </div>

      </div>
      <div class="col-md-3"></div>
    </div>
    <hr>
    <main>
      <div v-for="(item) in numerosSorteados" :key="item.id" >
        <span v-if="item.bola < 19" class="card" :class="{'cor-verde': item.status, 'cor-vermelho': !item.status}" v-on:click="bolaSorteada(item)">{{item.bola}}</span>
      </div>
    </main>
    <main>
      <div v-for="(item) in numerosSorteados" :key="item.id" >
        <span v-if="item.bola > 18 && item.bola < 37" class="card" :class="{'cor-verde': item.status, 'cor-vermelho': !item.status}" v-on:click="bolaSorteada(item)">{{item.bola}}</span>
      </div>
    </main>
    <main>
      <div v-for="(item) in numerosSorteados" :key="item.id" >
        <span v-if="item.bola > 36 && item.bola < 55" class="card" :class="{'cor-verde': item.status, 'cor-vermelho': !item.status}" v-on:click="bolaSorteada(item)">{{item.bola}}</span>
      </div>
    </main>
    <main>
      <div v-for="(item) in numerosSorteados" :key="item.id" >
        <span v-if="item.bola > 54 && item.bola < 73" class="card" :class="{'cor-verde': item.status, 'cor-vermelho': !item.status}" v-on:click="bolaSorteada(item)">{{item.bola}}</span>
      </div>
    </main>
    <main>
      <div v-for="(item) in numerosSorteados" :key="item.id" >
        <span v-if="item.bola > 72 && item.bola < 91" class="card" :class="{'cor-verde': item.status, 'cor-vermelho': !item.status}" v-on:click="bolaSorteada(item)">{{item.bola}}</span>
      </div>
    </main>
    <hr>
    <div>
      <div class="row">
        <div class="col-md-4">
          <PageTitle icon="fa fa-dice" main="Linha" sub="Sorteio" />
          <table class="table table-hover">
            <thead>
            <tr>
              <th scope="col">Cartela</th>
              <th scope="col">Linha</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item) in ganhadores" :key="item.id">
              <td>{{item.cartela_id}}</td>
              <td>{{item.linha}}</td>
              <td>{{item.name}}</td>
              <td>{{item.email}}</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
          <PageTitle icon="fa fa-dice" main="Linha Dupla" sub="Sorteio"/>
          <table class="table table-hover">
            <thead>
            <tr>
              <th scope="col">Cartela</th>
              <th scope="col">Linha</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item) in ganhadoresLinhaDupla" :key="item.id">
              <td>{{item.cartela_id}}</td>
              <td>{{item.linha}}</td>
              <td>{{item.name}}</td>
              <td>{{item.email}}</td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./_CardNumeroSorteado.js" lang="js"></script>
<style src="./_CardNumeroSorteado.css" lang="css" scoped></style>
