<template>
  <div class="home">
    <PageTitle icon="fa fa-home" main="Dashboard" sub="Home" />
    <div class="stats">
      <Stat title="Cartelas compradas" :value="quantidadeCartela" icon="fa fa-folder" color="#d54d50"/>
      <Stat title="Quantidade de jogadores" :value="quantidadeJogador" icon="fa fa-user" color="#3282cd"/>
      <Stat title="Receira" :value="'R$ '+valor.valor" icon="fas fa-chart-pie" color="#3bc480"/>
    </div>
    <div class="row">
      <div class="col-md-4">
        <PageTitle icon="fa fa-dice" main="Linha" sub="Sorteio" />
        <Ganhadores :ganhadores="ganhadores"/>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-4">
        <PageTitle icon="fa fa-dice" main="Linha Dupla" sub="Sorteio"/>
        <Ganhadores :ganhadores="ganhadoresLinhaDupla"/>
      </div>
    </div>
  </div>
</template>

<script src="./_home.js" lang="js"></script>
<style src="./_home.css" lang="css" scoped></style>
