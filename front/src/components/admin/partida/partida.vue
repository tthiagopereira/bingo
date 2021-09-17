<template>
  <div class="partida">
    <div class="card" v-if="exibirForm">
      <div class="card-header">
        Registrar Partida
      </div>
      <div class="card-body" >
        <form >

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Status </label>
                <select class="form-control mt-2" v-model="partida.status" id="exampleFormControlSelect1">
                  <option disabled>Status da partida</option>
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
                </select>

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group" >
                <label for="percentualLinha">Data</label>
                <input type="date" v-model="partida.data" class="form-control mt-2" id="percentualLinha" aria-describedby="emailHelp" placeholder="">

              </div>
            </div>
          </div>

          <div class="form-group mt-2" >
            <label for="exampleInputEmail1">Premiação ID</label>
            <input type="number" v-model="partida.premiacao_id" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>

          <button  @click="store" class="btn btn-primary mt-4">
            <span v-if="item_id">Alterar</span>
            <span v-else>Registrar</span>
          </button>
        </form>
      </div>
    </div>
    <div class="mt-5"></div>
    <div class="row" v-if="!exibirForm">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3 text-end" >
          <button class="btn btn-primary" @click="viewForm">Registrar nova partida</button>
        </div>
      </div>
      <div class="container">
        <div class="table-responsive">
          <table class="table table-responsive">
            <thead>
            <tr>
              <th scope="col">Partida</th>
              <th scope="col">data</th>
              <th scope="col">status</th>
              <th scope="col">Premiação</th>
              <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item) in itens" :key="item.id">
              <th scope="row">{{item.id}}</th>
              <td>{{item.data}}</td>
              <td>{{item.status ? 'Ativo' : 'Inativo'}}</td>
              <td>{{ item.premiacao_id }}</td>
              <td>
                <button class="btn btn-warning col-md-offset-2" @click="edit(item)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </button>
                <!--              <button class="btn btn-danger col-md-offset-2" @click="destroy(item.id)">-->
                <!--                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">-->
                <!--                  <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>-->
                <!--                </svg>-->
                <!--              </button>-->
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./_partida.js" lang="js"></script>
<style src="./_partida.css" lang="css" scoped></style>
