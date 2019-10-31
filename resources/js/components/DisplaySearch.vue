<template>
    <div class="center-input container-fluid p-0">
        <label class="mt-2 pb-2 bg-success p-2 rounded mr-1">Quick-Match</label>
        <input type="text" v-model="keywords" placeholder="Search what you need">
        <div class="w-100 box-quick latest-adverts border-custom">
            <div class="row no-gutters row-custom" v-if="results.length > 0">
                <div class="col-md-8 d-block foto-hover text-center mt-3 " v-for="result in results" :key="result.id">
                    <p class="bg-dark text-white rounded p-1">{{result.title}}</p>
                    <a :href="'advert/' + result.slug">
                        <img :src="result.image" class="img-fluid card-img w-50 foto-hover mt-0" alt="result.image" style="height: 100px; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; border: 2px solid black;">
                        <mark class="mt-1 font-weight-bolder"><p class="card-text text-dark">Price <small class="font-weight-bolder" v-text="result.price"> </small> &euro;</p></mark>
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
        //wacthing for typed characters
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
            // console.log('Component searchEmail mounted.')
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
</style>
