<template>
    <div class="table-responsive">
        <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>
            <div v-if="loading">Loading...</div>

        <table class="table table-hoved table-dark ">
            <tr>
                <th>Level</th>
                <th>Name</th>
                <th>School</th>
                <th>Classes</th>
                <th>Components</th>
                <th>Casting Time</th>
                <th>Duration</th>
                <th>Range</th>
                <th>Source</th>

            </tr>

            <tr v-for="spell in displayedSpells" :key="spell.id">
                <td>{{ spell.level_name }}</td>
                <td>{{ spell.name}}</td>
                <td>{{ spell.school.name}}</td>
                <td>{{ spell.classes}}</td>
                <td>{{ spell.components}}</td>
                <td>{{ spell.casting_time}}</td>
                <td>{{ spell.duration}}</td>
                <td>{{ spell.range}}</td>
                <td>{{ spell.source}}</td>

            </tr>
        </table>
            <div class="clearfix btn-group col-md-2 offset-md-5">
                <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page--"> << </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> >> </button>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "SpellsTable.vue",
        data () {
            return {
                spells: [],
                loading: true,
                errored: false,
                page: 1,
                perPage: 10,
                pages: [],

            }
        },
        filters: {

        },
        mounted () {

        },
        created() {
            this.fetchSpells();
        },
        methods: {
            fetchSpells() {

                axios.get('/spells/api-data')
                    .then(response => {
                        this.spells = response.data;
                        console.log(response);
                    }).finally( this.loading = false)

            },
            setPages () {
                let numberOfPages = Math.ceil(this.spells.length / this.perPage);
                for (let index = 1; index <= numberOfPages; index++) {
                    this.pages.push(index);
                }
            },
            paginate (spells) {
                let page = this.page;
                let perPage = this.perPage;
                let from = (page * perPage) - perPage;
                let to = (page * perPage);
                return  spells.slice(from, to);
            }


        },
        watch: {
            spells () {
                this.setPages();
            }
        },
        computed: {
            displayedSpells () {
                return this.paginate(this.spells);
            }
        },
    }
</script>

<style scoped>

</style>
