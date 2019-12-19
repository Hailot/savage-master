<template>
    <div class="table-responsive">
        <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>
            <div class="row">
                <div class="col-sm-2">

                    <div class="form-group mt-4 pt-2" >
                        <button :disabled='isDisabled' type="button" name="jsonfile" id="jsonfile" class="btn btn-primary btn-block form-control text-center" v-on:click="makefile">Create Json
                        </button>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="search">Text Search:</label>

                        <input class="form-control" name="search" id="search" type="text" v-model="search" placeholder="Search by Text..."/>
                    </div>



                </div>
            </div>
            <table class="table table-hover table-dark ">

                <div v-if="loading" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <thead>
                <tr>
                    <th>
                        <label class="form-checkbox">
                            <input type="checkbox" v-model="selectAll" @click="select">
                        </label>
                    </th>
                    <th scope="col" v-for="column in columns">
                        <a class="btn btn-block btn-outline-info" href="#" @click="sortBy(column)">
                            {{ column | capitalize }}
                        </a>
                    </th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                    <tr v-for="creature in displayedCreatures" :key="creature.id">
                        <td>
                            <label class="form-checkbox">
                                <input type="checkbox" :value="creature.id" v-model="selected">
                            </label>
                        </td>
                        <td>{{ creature.challenge_rating }}</td>
                        <td>{{ creature.name}}</td>
                        <td>{{ creature.type.name}}</td>
                        <td>{{ creature.average_hitpoints}}</td>
                        <td>{{ creature.source}}</td>
                        <td> <button id="show-modal" @click="viewModal(creature)">Full Info</button> </td>
                    </tr>
                </tbody>


            </table>
            <div class="clearfix btn-group col-md-2 offset-md-5">
                <button type="button" class="btn btn-sm btn-outline-primary" v-if="page != 1" @click="page--"> << </button>
                <button type="button" class="btn btn-sm btn-outline-primary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-primary"> >> </button>
            </div>
        </section>
        <creature-modal  v-if="showModal"  @close="showModal = false" v-bind:creature="showedCreature"></creature-modal>
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
                sortKey: ['challenge_rating'],
                sortDirection: ['asc'],
                search: '',
                columns: ['CR','name','Type','Avg Hitpoints','source'],
                showedCreature: '',
                showModal: false


            }
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },

        mounted () {

        },
        created() {
            this.fetchCreatures();
        },
        methods: {
            viewModal(creature) {
                this.showModal = true;
                this.showedCreature = creature;
            },
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
            sortBy: function(sortKey) {

                if(sortKey === 'CR'){sortKey = 'challenge_rating';}
                if(sortKey === 'Type'){sortKey = 'type.name';}
                if(sortKey === 'Avg Hitpoints'){sortKey = 'average_hitpoints';}
                if(this.sortKey === sortKey){
                    this.sortDirection = (this.sortDirection == 'asc') ? 'desc' : 'asc';

                }
                else {
                    this.sortDirection = 'asc';
                    this.sortKey = sortKey;
                }

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
                return this.paginate(this.orderedList);
            },
            filteredList() {
                var self = this;

                return self.creatures.filter(function (creature) {
                    var searchRegex = new RegExp(self.search, 'i')
                    return  (
                        searchRegex.test(creature.name) ||
                        searchRegex.test(creature.type.name) ||
                        searchRegex.test(creature.source)
                    )})

            },

            orderedList: function () {
                return _.orderBy(this.filteredList, this.sortKey,this.sortDirection)
            }
        },
    }
</script>

<style scoped>

</style>
