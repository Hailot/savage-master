<template>
    <div class="table-responsive">
        <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>

            <!--        <label>-->
            <!--            Search-->
            <!--            <input v-model="query"/>-->
            <!--        </label>-->
            <table class="table table-striped table-hover table-dark">
                <div class="search-wrapper justify-content-center">
                    <label>Search title:</label>

                    <input type="text" v-model="search" placeholder="Search title.."/>
                </div>
                <button :disabled='isDisabled' type="button" class="btn btn-primary" v-on:click="makefile">Create Json
                </button>
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
                    <td>
                        <label class="form-checkbox">
                            <input type="checkbox" :value="spell.id" v-model="selected">
                            <i class="form-icon"></i>
                        </label>
                    </td>
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
    import fz from 'fuzzaldrin-plus';

    export default {
        name: "SpellsTable.vue",
        data() {
            return {
                spells: [],
                loading: false,
                errored: false,
                page: 1,
                perPage: 10,
                pages: [],
                selected: [],
                selectAll: false,
                search: '',
                disButton: false,


            }
        },
        filters: {},
        mounted() {

        },
        created() {
            this.fetchSpells();
        },
        methods: {
            fetchSpells() {
                this.loading = true;
                axios.get('/spells/api-data')
                    .then(response => {
                        this.spells = response.data;
                        console.log(response);
                    }).finally(this.loading = false)

            },
            setPages() {
                let numberOfPages = Math.ceil(this.spells.length / this.perPage);
                for (let index = 1; index <= numberOfPages; index++) {
                    this.pages.push(index);
                }
            },
            paginate(spells) {
                this.setPages()
                let page = this.page;
                let perPage = this.perPage;
                let from = (page * perPage) - perPage;
                let to = (page * perPage);
                return spells.slice(from, to);
            },
            select() {
                this.selected = [];
                if (!this.selectAll) {
                    for (let i in this.spells) {
                        this.selected.push(this.spells[i].id);
                    }
                }
            },


            makefile() {
                this.loading = true;
                this.disButton = true;
                axios.post('/jsonfile/make-file', {
                        'selectedIds': this.selected,
                        'dataType': 'spells'
                    }
                ).then(response => {

                    window.location.replace('/user-files')

                })

            },

            forceFileDownload(response) {
                const url = window.URL.createObjectURL(new Blob([response.data]))
                const link = document.createElement('a')
                link.href = url
                link.setAttribute('download', 'spells.json') //or any other extension
                document.body.appendChild(link)
                link.click()
            },


        },
        watch: {
            spells() {
                this.setPages();
            }
        },
        computed: {
            isDisabled: function () {
                return this.disButton;
            },
            displayedSpells() {
                return this.paginate(this.filteredList);
            },
            filteredList() {
               return this.spells.filter(spell => {
                   return spell.name.toLowerCase().includes(this.search.toLowerCase())
               })
            }
        },
    }
</script>

<style scoped>

</style>
