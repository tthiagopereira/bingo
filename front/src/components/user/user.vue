<template>
  <div class="user">
    <template>
      <div>
        <b-card class="mt-3" header="Seus dados">

            <b-form-group id="input-group-1" label="Email address:" label-for="input-1" description="Informe seu e-mail">
              <b-form-input id="input-1" v-model="user.email" type="email" placeholder="Enter email" required></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Nome:" label-for="input-2">
              <b-form-input id="input-2" v-model="user.name" placeholder="Enter name" required></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Senha:" label-for="input-2">
              <b-form-input id="input-2" v-model="user.password" placeholder="Deseja troca sua senha" required></b-form-input>
            </b-form-group>

            <b-button class="mt-5" type="submit" @click="updateUser" variant="primary">Atualizar seus dados</b-button>

        </b-card>
      </div>
    </template>
  </div>
</template>

<script src="./_user.js" lang="js"></script>
<style src="./_user.css" lang="css" scoped></style>
