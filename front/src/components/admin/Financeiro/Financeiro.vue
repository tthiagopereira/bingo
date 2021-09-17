<template>
  <div class="Financeiro">
    <PageTitle icon="fa fa-dollar-sign" main="Financeiro" sub="Historico"/>
    <div class="container">
      <div class="row">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">Bingo</th>
            <th scope="col">Valor da cartela</th>
            <th scope="col">Cartelas vendidas</th>
            <th scope="col">Total</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(item) in historico" :key="item.id">
            <th scope="row">{{item.bingo}}</th>
            <td class="">R$ {{item.valor}}</td>
            <td>QTD: {{item.quantidade}}</td>
            <td>R$ {{item.total}}</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script src="./_Financeiro.js" lang="js"></script>
<style src="./_Financeiro.css" lang="css" scoped></style>
