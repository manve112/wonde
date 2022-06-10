<template>
    <div class="panel">
        <div class="panel-heading">
            <slot name="panel-heading"></slot>
        </div>
        <slot></slot>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
@import "./resources/css/partials/variables";

.panel {
    background: $white;
    border-radius: $borderRadius;
    padding: 20px;
    box-shadow: $boxShadow;

    .panel-heading {
        padding-bottom: 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid $lightGray;
    }
}
</style>
