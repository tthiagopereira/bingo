<template>
    <div class="start">
      <div class="start-icon">
        <i :class="icon" :style="style"></i>
      </div>
      <div class="stat-info">
        <span class="stat-title"> {{ title }}</span>
        <span class="stat-value"> {{ value }}</span>
      </div>
    </div>
</template>

<script src="./_start.js" lang="js"></script>
<style src="./_start.css" lang="css" scoped></style>
