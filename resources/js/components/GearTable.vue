<template>
    <div class="table-responsive">
        <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>
            <div v-if="loading">Loading...</div>

            <table class="table table-hoved table-dark ">
                <button type="button" class="btn btn-primary" v-on:click="makefile">Create Json</button>

                <tr>
                    <th>
                        <label class="form-checkbox">
                            <input type="checkbox" v-model="selectAll" @click="select">
                        </label>
                    </th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Weight</th>
                    <th>Properties</th>


                </tr>

                <tr v-for="gear in displayedGear" :key="gear.id">
                    <td>
                        <label class="form-checkbox">
                            <input type="checkbox" :value="gear.id" v-model="selected">
                            <i class="form-icon"></i>
                        </label>
                    </td>
                    <td>{{ gear.type}}</td>
                    <td>{{ gear.name}}</td>
                    <td>{{ gear.cost}}</td>
                    <td>{{ gear.weight}} Lbs</td>
                    <td>{{ gear.properties}}</td>


                </tr>
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
                loading: true,
                errored: false,
                page: 1,
                perPage: 10,
                pages: [],
                selected: [],
                selectAll: false

            }
        },
        filters: {},
        mounted() {

        },
        created() {
            this.fetchGear();
        },
        methods: {
            fetchGear() {

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



            makefile(){

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
            displayedGear() {
                return this.paginate(this.gears);
            }
        },
    }
</script>

<style scoped>

</style>
