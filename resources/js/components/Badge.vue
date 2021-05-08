<template>
    <div class="badge">
        <div class="title">{{title}}</div>
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: [
        'title'
    ]
}
</script>

<style scoped>

</style>
