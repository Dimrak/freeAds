<template>
    <div class="center-input container-fluid p-0">
        <label class="mt-2 pb-2">Quick-Match</label>
        <input type="text" v-model="keywords" placeholder="Ajax search">
        <!--<input type="text" v-model="keywords" placeholder="Ajax search">-->
        <div class="w-100 custom-bg d-none latest-adverts border-custom">
            <div class="row no-gutters row-custom" v-if="results.length > 0">
                <!--<div class="col-md-8 d-block">-->
                    <!--<h5 class="pt-2 mr-auto ml-auto text-center text-center mt-5 w-75 font-weight-bolder">Match adverts</h5><small>-->
                    <!--<a href="">See more</a></small>-->
                <!--</div>-->
                <!--<div class="col-md-2">-->
                    <!--<h5 class="pt-2 mr-auto ml-auto text-center text-center mt-5 w-75 font-weight-bolder">Latest adverts</h5>-->
                <!--</div>-->
                <div class="col-md-8 d-block foto-hover text-center mt-3 font-weight-bolder" v-for="result in results" :key="result.id">
                    {{result.title}}
                    <a href="">
                        <img :src="result.image" class="img-fluid card-img w-50 foto-hover" alt="result.image" style="height: 100px; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; border: 2px solid black;">
                        <p class="card-text text-dark">Price <small v-text="result.price">  </small></p>
                        <!--<p class="card-text"><small class="text-muted"></small></p>-->
                    </a>
                </div>
            </div>
        </div>

        <!--<ul v-if="results.length > 0">-->
            <!--<li v-for="result in results" :key="result.id" v-text="result.title"></li>-->
        <!--</ul>-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keywords: null,
                results: []
            };
        },
        //wathing for typed characters
        watch: {
            keywords(after, before) {
                this.fetch();
            }
        },

        methods: {
            fetch() {
                axios.get('api/search', { params: { keywords: this.keywords } })
                    .then(response => this.results = response.data)
                    .catch(error => {});
            }
        },
        mounted() {
            console.log('Component searchEmail mounted.')
        },
    }
</script>

<style>

    .row-custom{
        justify-content: center;
    }

    .center-input{
        text-align: center;
    }

    .border-custom{
        display: block;
        width: 126px;
        height: 180px;
        background-color: red;
        border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
    }
</style>