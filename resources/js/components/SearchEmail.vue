<template>
    <div>

        <label class="d-block">Search user</label>

        <input type="text" v-model="keywords">
        <select class="custom-show mt-2" name="recip_id" id="" v-if="results.length > 0">
            <option class="form-control mt-1 font-weight-bolder">Choose a user</option>
            <option class="form-control mt-1 text-primary font-weight-bolder">Send to all users</option>
            <option class="" v-for="result in results" :key="result.id" v-text="result.email" :value="result.id"></option>
        </select>
<!--        <ul v-if="results.length > 0">-->
<!--            <li class="" v-for="result in results" :key="result.id" v-text="result.email"></li>-->
<!--        </ul>-->

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
                axios.get('http://194.5.157.101/FreeAds/public/api/search/searchEmail', { params: { keywords: this.keywords } })
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
    
    @media only screen and (min-width: 768px){
        .custom-show{
            display: inline-block;
        }
    }
    @media only screen and (min-width: 1024px){
        .custom-show{
            display: inline-block;
            margin-left: 5%;
        }
    }
    
</style>
