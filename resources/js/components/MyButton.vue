<template>
    <div>
        <button :type="type" v-text="test.name" class="my-button"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

            axios.post('api/vue',{})
                .then(response => {
                    this.test = response.data;
                })
        },

        data: function (){
          return {
              test: null,
          }
        },

        props: [
            'text',
            'type'
        ]
    }
</script>

<style>
    .my-button{
        background-color: indianred;
        padding: 10px 15px;
    }
</style>
