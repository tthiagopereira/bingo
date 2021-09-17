<template>
    <div class="bolaSorteada">
        <main>
            <div class="card "  :class="{'cor-azul': cor, 'cor-vermelho': !cor}">
                <span class="">{{bola}}</span>
            </div>
        </main>
    </div>
</template>

<script src="./_BolaSorteada.js" lang="js"></script>
<style src="./_BolaSorteada.css" lang="css" scoped></style>
