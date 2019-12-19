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
            <div class="search-wrapper justify-content-center">
                <label>Search title:</label>

                <input type="text" v-model="search" placeholder="Search title.."/>
            </div>
            <button :disabled='isDisabled' type="button" class="btn btn-primary" v-on:click="makefile">Create Json
            </button>
            <table class="table table-striped table-hover table-dark">

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
                    <th v-for="column in columns">
                        <a href="#" @click="sortBy(column)">
                            {{ column | capitalize }}
                        </a>
                    </th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
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
                    <td>   <button class="btn-sm btn-info" id="show-modal" @click="viewModal(spell)">View</button>
                    </td>
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
        <spell-modal v-if="showModal"  @close="showModal = false" v-bind:spell="showedSpell"></spell-modal>

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
                sortKey: ['level'],
                sortDirection: ['asc'],
                search: '',
                columns: ['level','name', 'school', 'classes', 'components','casting Time', 'duration', 'range','source'],
                disButton: false,
                showModal: false,
                showedSpell: '',


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
            viewModal(spell) {
                this.showModal = true;
                this.showedSpell = spell;
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
            sortBy: function(sortKey) {
                if(sortKey === 'level'){
                    sortKey = 'level_name';
                }
                if(sortKey === 'school'){
                    sortKey = 'school.name'
                }
                if(sortKey === 'casting Time'){
                    sortKey = 'casting_time'
                }

                if(this.sortKey === sortKey){
                    console.log(this.sortKey);
                    this.sortDirection = (this.sortDirection == 'asc') ? 'desc' : 'asc';

                }
                else {
                    this.sortDirection = 'asc';
                    this.sortKey = sortKey;
                }

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
            },
        },
        computed: {
            isDisabled: function () {
                return this.disButton;
            },
            displayedSpells() {
                return this.paginate(this.orderedList);
            },
            filteredList() {
                var self = this;

                return self.spells.filter(function (spell) {
                        var searchRegex = new RegExp(self.search, 'i')
                        return  (
                            searchRegex.test(spell.name) ||
                            searchRegex.test(spell.classes) ||
                                searchRegex.test(spell.school.name) ||
                                searchRegex.test(spell.source)
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
