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
        /*background: #c51244 !important;*/
        /*padding: 10px !important;*/
        /*border-radius: 0 !important;*/
        /*position: relative;*/
        /*display: inline-block !important;*/
        /*box-shadow: 1px 1px 1px #aaaaaa;*/
        /*margin-top: 10px;*/
    }
</style>