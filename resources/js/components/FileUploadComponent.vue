<template>
    <div class="container">
        <div class="row justify-content-center mb-3 text-dark" ref="imageUpload">
            <div class="col-12 bg-dark text-white rounded text-center p-5 ">Drop images here</div>
        </div>
    </div>
</template>

<script>
    import Dropzone from 'dropzone';

    export default {
        data: function(){
            return{
                dropzone: null,
            }
        },
        mounted() {
            //Passing the div to this dropzone
            this.dropzone = new Dropzone(this.$refs.imageUpload, {
                url: '/api/images'
            });
            // console.log('Component mounted Dropzone.')
        }
    }
</script>

<style>

</style>