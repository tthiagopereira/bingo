<template>
    <div class="PageTitle">
      <h1><i v-if="icon" :class="icon"></i> {{ main}}</h1>
      <h2>{{ sub}}</h2>
      <hr>
    </div>
</template>

<script src="./_PageTitle.js" lang="js"></script>
<style src="./_PageTitle.css" lang="css" scoped></style>
