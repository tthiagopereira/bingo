<template>
  <div class="cartela">
    <div class="row">
      <div class="col-md-12">
        <PageTitle icon="fa fa-dice" main="Cartelas" sub="Suas Cartelas" />
      </div>
    </div>

    <div class="row">
      <!--      <PageAux icon="fa fa-user" :main="user.name" :sub="user.email" />-->
      <div class="col-md-3 alert alert-danger">
        Partida <input type="text" v-model="cartela.partida_id">
      </div>
      <div class="col-md-4 alert alert-danger">
        Id: {{user.id}} - Nome: {{user.name}}
      </div>
      <div class="col-md-5 alert alert-danger">
        E-mail: {{user.email}}
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
          <Video />
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
    </div>
    <div class="row">
      <div class="col-md-1">
        <button class="btn btn-info" v-on:click="menosCartelas">-</button>
      </div>
      <div class="col-md-1">
        <BolaSorteada :bola="cartela.quantidade"/>
      </div>
      <div class="col-md-1">
        <button class="btn btn-info" v-on:click="maisCartelas">+</button>
      </div>
      <div class="col-md-3">
        <button class="btn btn-info" v-on:click="registerCartela(user.id)">Adicionar cartelas</button>
      </div>
      <div class="col-md-6">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active">
            <strong>Premio</strong> - 1
          </a>
          <span v-for="(item) in ganhadorPremio" :key="item.id">
            <a href="#" class="list-group-item list-group-item-action">
              <strong>Cartela:</strong> {{item.cartela_id}},
              <strong>Linha:</strong> {{item.linha}},
              <strong>Premiação: </strong>{{item.premiacao}},
              <strong>Partida: </strong>{{item.partida}},
              <strong>MOEDA: </strong>{{item.moeda}},
              <strong>valor: </strong>R$ {{item.valor * valorBruto.valor}},
            </a>
          </span>
        </div>
      </div>
    </div>
    <template >

      <div class="container-fluid mt-3">
        <b>Cartelas adquiridas</b>
        <hr>
        <div class="row">
          <div class="col-md-3 alert alert-info offset-md-1" v-for="(item) in cartelas" :key="item.id">
            Cartela {{ item.id }}
            <hr>

            <main class="mt-3">
              <div v-for="(bolas) in item.bola_cartelas" :key="bolas.id">
                <div class="card" :class="{'cor-verde': bolas.status, 'cor-vermelho': !bolas.status}" v-if="bolas.linha == 1">
                  {{bolas.bola}}
                </div>
              </div>
            </main>
            <main class="mt-3">
              <div v-for="(bolas) in item.bola_cartelas" :key="bolas.id">
                <div class="card" :class="{'cor-verde': bolas.status, 'cor-vermelho': !bolas.status}" v-if="bolas.linha == 2">
                  {{bolas.bola}}
                </div>
              </div>
            </main>
            <main class="mt-3">
              <div v-for="(bolas) in item.bola_cartelas" :key="bolas.id">
                <div class="card" :class="{'cor-verde': bolas.status, 'cor-vermelho': !bolas.status}" v-if="bolas.linha == 3">
                  {{bolas.bola}}
                </div>
              </div>
            </main>
          </div>
        </div>
        <div class="mt-3"></div>
      </div>
    </template>
  </div>
</template>

<script src="./_cartela.js" lang="js"></script>
<style src="./_cartela.css" lang="css" scoped></style>
