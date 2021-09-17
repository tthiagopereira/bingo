<template>
    <div class="ganhadores">
      <div class="row">
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
    </div>
</template>
<script src="./_ganhadores.js" lang="js"></script>
<style src="./_ganhadores.css" lang="css" scoped></style>
