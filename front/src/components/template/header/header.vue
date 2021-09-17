<template>
  <header class="header">
    <a class="toggle" @click="toggleMenu" v-if="!hideToggle">
      <i class="fa fa-lg" :class="icon"></i>
    </a>
    <h1 class="titulo">
      <router-link to="/">
        {{ titulo }}
      </router-link>
    </h1>
    <DropdownUser v-if="!hideDropDown"/>
  </header>
</template>

<script src="./_header.js" lang="js"></script>
<style src="./_header.css" lang="css" scoped></style>
