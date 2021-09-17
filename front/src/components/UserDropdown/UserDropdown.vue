<template>
    <div class="UserDropdown">
        <div class="user-button">
          <span class="d-none d-sm-block">{{user.name}}</span>
          <div class="user-dropdown-img">
            <Gravatar :email="user.email" alt="user img"/>
          </div>
          <i class="fa fa-angle-down"></i>
        </div>
        <div class="user-dropdown-content">
          <router-link v-if="user.tipo == 'administrador'" to="/admin"><i class="fa fa-cogs"></i> Administração</router-link>
          <router-link to="/user" href=""><i class="fa fa-cogs"></i> Editar perfil</router-link>
          <a href @click.prevent="logout"><i class="fa fa-sign-out"></i> Sair</a>
        </div>
    </div>
</template>

<script src="./_UserDropdown.js" lang="js"></script>
<style src="./_UserDropdown.css" lang="css" scoped></style>
