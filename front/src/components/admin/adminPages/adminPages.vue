<template>
  <div class="adminPages">
    <PageTitle icon="fa fa-cogs" main="Administrador" sub="Operador"/>
    <div>
      <b-card no-body>
        <b-tabs content-class="mt-3">
          <b-tab title="Premiação" active>
            <div class="container">
              <FormPremiacao />
            </div>
          </b-tab>
          <b-tab title="Registrar Partida">
            <div class="container">
              <Partida />
            </div>
          </b-tab>
          <b-tab title="Cartela">
            <div class="container">
              <Cartela />
            </div>
          </b-tab>
        </b-tabs>
      </b-card>
    </div>
  </div>
</template>

<script src="./_adminPages.js" lang="js"></script>
<style src="./_adminPages.css" lang="css" scoped></style>
