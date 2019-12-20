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
            <table class="table table-hover table-dark text-center ">

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
                        <a class="btn btn-block btn-outline-info"  href="#" @click="sortBy(column)">
                            {{ column | capitalize }}
                        </a>
                    </th>
                    <th></th>

                </tr>
                </thead>
                <tbody  v-for="gear in displayedGear" :key="gear.id">
                <tr>
                    <td>
                        <label class="form-checkbox">
                            <input type="checkbox" :value="gear.id" v-model="selected">
                            <i class="form-icon"></i>
                        </label>
                    </td>
                    <td>{{ gear.type}}</td>
                    <td>{{ gear.name}}</td>
                    <td>{{ gear.damage}}</td>
                    <td>{{ gear.cost}}</td>
                    <td>{{ gear.weight}}</td>
                    <td>{{ gear.properties}}</td>


                </tr>
                </tbody>

            </table>
            <div class="clearfix btn-group col-md-2 offset-md-5">
                <button type="button" class="btn btn-sm btn-outline-primary" v-if="page != 1" @click="page--"> <<
                </button>
                <button type="button" class="btn btn-sm btn-outline-primary"
                        v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}}
                </button>
                <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-primary">
                    >>
                </button>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "GearTable.vue",
        data() {
            return {
                gears: [],
                loading: false,
                errored: false,
                page: 1,
                perPage: 10,
                pages: [],
                selected: [],
                selectAll: false,
                disButton: false,
                sortKey: ['name'],
                sortDirection: ['asc'],
                search: '',
                columns: ['type','name','damage','cost','weight','properties'],



            }
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },
        mounted() {

        },
        created() {
            this.fetchGear();
        },
        methods: {
            fetchGear() {
                this.loading = true;

                axios.get('/gear/api-data')
                    .then(response => {
                        this.gears = response.data;
                        console.log(response);
                    }).finally(this.loading = false)

            },
            setPages() {
                let numberOfPages = Math.ceil(this.gears.length / this.perPage);
                for (let index = 1; index <= numberOfPages; index++) {
                    this.pages.push(index);
                }
            },
            paginate(gears) {
                let page = this.page;
                let perPage = this.perPage;
                let from = (page * perPage) - perPage;
                let to = (page * perPage);
                return gears.slice(from, to);
            },
            select() {
                this.selected = [];
                if (!this.selectAll) {
                    for (let i in this.gears) {
                        this.selected.push(this.gears[i].id);
                    }
                }
            },
            sortBy: function(sortKey) {
                if(this.sortKey === sortKey){
                    this.sortDirection = (this.sortDirection == 'asc') ? 'desc' : 'asc';

                }
                else {
                    this.sortDirection = 'asc';
                    this.sortKey = sortKey;
                }

            },



            makefile(){
                this.loading = true;
                this.disButton = true;
                axios.post('/jsonfile/make-file', {
                        'selectedIds': this.selected,
                        'dataType': 'gear'
                    }
                ).then(response => {

                    window.location.replace('/user-files')

                })

            },


        },
        watch: {
            gears() {
                this.setPages();
            }
        },
        computed: {
            isDisabled: function(){
                return this.disButton;
            },
            displayedGear() {
                return this.paginate(this.orderedList);
            },
            filteredList() {
                var self = this;

                return self.gears.filter(function (gear) {
                    var searchRegex = new RegExp(self.search, 'i')
                    return  (
                        searchRegex.test(gear.name) ||
                        searchRegex.test(gear.type) ||
                        searchRegex.test(gear.source)
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
