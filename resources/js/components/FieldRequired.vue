<template>
    <div>
        <p v-text="text" class="notification"></p>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: [
            'text',
        ]
    }
</script>

<style>
    .notification {
        display: block;
        color: red;
    }
</style>
