<template>
  <aside class="menu" v-show="isMenuVisible">
    <div class="nav-side-menu">
      <div class="brand">
        <router-link to="/">
          <i class="fa fa-home fa-lg"></i> Dashboard
        </router-link>
      </div>
      <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
          <router-link to="/bingo">
            <li  data-toggle="collapse" data-target="#products" class="collapsed active">
              <i class="fa fa-dice"></i> Bingo <span class="arrow"></span>
            </li>
          </router-link>
          <router-link to="/Cartela">
            <li  data-toggle="collapse" data-target="#products" class="collapsed active">
              <i class="fa fa-puzzle-piece"></i> Cartela <span class="arrow"></span>
            </li>
          </router-link>
          <router-link to="/financeiro" v-if="user.tipo == 'administrador'">
            <li  data-toggle="collapse" data-target="#products" class="collapsed active">
              <i class="fa fa-puzzle-piece"></i> Financeiro <span class="arrow"></span>
            </li>
          </router-link>
        </ul>
      </div>
    </div>
  </aside>
</template>

<script src="./_menu.js" lang="js"></script>
<style src="./_menu.css" lang="css" scoped></style>
