<template>
    <form :action="action" :method="method">
        <input type="hidden" name="_token" :value="csrf">
        <slot></slot>
    </form>
</template>

<script>
export default {
    props: [
        'action',
        'method'
    ],
    data()
    {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }
}
</script>
