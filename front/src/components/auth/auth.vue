<template>
  <div class="auth">
    <div class="auth-modal">
      <img src="@/assets/bingo.png" width="200" alt="Logo">
      <hr>
      <div class="auth-title">
        {{ showSingnup ? 'Cadastro' : 'Login' }}
      </div>
      <input v-if="showSingnup" v-model="user.name" type="text" placeholder="Enter name">
      <input type="email" name="email" v-model="user.email" placeholder="Enter email">
      <input type="password" name="password" v-model="user.password" placeholder="Enter password">
      <input v-if="showSingnup" type="password" v-model="user.confirmPassword" placeholder="Enter confirm password">

      <button v-if="showSingnup" @click="signup">Registrar</button>
      <button v-else @click="signin">Entrar</button>

      <a href @click.prevent="showSingnup = !showSingnup">
        <span v-if="showSingnup">Já tem cadastro? Acesse o Login!</span>
        <span v-else>Não tem cadastro? Registra-se aqui!</span>
      </a>
    </div>
  </div>
</template>

<script src="./_auth.js" lang="js"></script>
<style src="./_auth.css" lang="css" scoped></style>
