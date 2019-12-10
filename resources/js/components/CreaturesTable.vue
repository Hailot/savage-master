<template>
    <div class="table-responsive">
        <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>
            <table class="table table-striped table-hover table-dark ">
                <div class="search-wrapper justify-content-center">
                    <label>Search title:</label>

                    <input type="text" v-model="search" placeholder="Search title.."/>
                </div>
                <button :disabled='isDisabled' type="button" class="btn btn-primary" v-on:click="makefile">Create Json</button>
                <div v-if="loading" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <tr>
                    <th>
                        <label class="form-checkbox">
                            <input type="checkbox" v-model="selectAll" @click="select">
                        </label>
                    </th>
                    <th>CR</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Avg. Hitpoints</th>
                    <th>Source</th>
                    <th></th>
                </tr>

                <tr v-for="creature in displayedCreatures" :key="creature.id">
                    <td>
                        <label class="form-checkbox">
                            <input type="checkbox" :value="creature.id" v-model="selected">
                            <i class="form-icon"></i>
                        </label>
                    </td>
                    <td>{{ creature.challenge_rating }}</td>
                    <td>{{ creature.name}}</td>
                    <td>{{ creature.type.name}}</td>
                    <td>{{ creature.average_hitpoints}}</td>
                    <td>{{ creature.source}}</td>
                    <td><a href="#creature-modal">Full Info</a> </td>


                </tr>
            </table>
            <div class="clearfix btn-group col-md-2 offset-md-5">
                <button type="button" class="btn btn-sm btn-outline-primary" v-if="page != 1" @click="page--"> << </button>
                <button type="button" class="btn btn-sm btn-outline-primary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-primary"> >> </button>
            </div>
        </section>
    </div>

</template>

<script>
    export default {
        name: "CreaturesTable.vue",
        data () {
            return {
                creatures: [],
                loading: true,
                errored: false,
                page: 1,
                perPage: 10,
                pages: [],
                selected: [],
                selectAll: false,
                disButton: false,
                search: '',


            }
        },
        filters: {

        },

        mounted () {

        },
        created() {
            this.fetchCreatures();
        },
        methods: {
            fetchCreatures() {
                this.loading = true;
                axios.get('/creatures/api-data')
                    .then(response => {
                        this.creatures = response.data;
                        console.log(response);
                    }).finally( this.loading = false)

            },
            setPages () {
                let numberOfPages = Math.ceil(this.creatures.length / this.perPage);
                for (let index = 1; index <= numberOfPages; index++) {
                    this.pages.push(index);
                }
            },
            paginate (creatures) {
                let page = this.page;
                let perPage = this.perPage;
                let from = (page * perPage) - perPage;
                let to = (page * perPage);
                return  creatures.slice(from, to);
            },
            select() {
                this.selected = [];
                if (!this.selectAll) {
                    for (let i in this.creatures) {
                        this.selected.push(this.creatures   [i].id);
                    }
                }
            },
            makefile(){
                this.loading = true;
                this.disButton = true;
                axios.post('/jsonfile/make-file', {
                        'selectedIds': this.selected,
                        'dataType': 'creatures'
                    }
                ).then(response => {

                    window.location.replace('/user-files')

                })

            },



        },
        watch: {
            creatures () {
                this.setPages();
            }
        },
        computed: {
            isDisabled: function(){
                return this.disButton;
            },
            displayedCreatures () {
                return this.paginate(this.filteredList);
            },
            filteredList() {
                return this.creatures.filter(creature => {
                    return creature.name.toLowerCase().includes(this.search.toLowerCase())
                })
            },
        },
    }
</script>

<style scoped>

</style>
