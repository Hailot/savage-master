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
            <button type="button" class="btn btn-primary" v-on:click="makefile">Create Json</button>
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

            <div v-if="loading" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <tr v-for="spell in queryResults" :key="spell.id">
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
                <button type="button" class="btn btn-sm btn-outline-primary" v-if="page != 1" @click="page--"> << </button>
                <button type="button" class="btn btn-sm btn-outline-primary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-primary"> >> </button>
            </div>
        </section>
    </div>
</template>

<script>
    import fz from 'fuzzaldrin-plus';
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
                selected: [],
                selectAll: false,
                query: '',

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
            },
            select() {
                this.selected = [];
                if (!this.selectAll) {
                    for (let i in this.spells) {
                        this.selected.push(this.spells[i].id);
                    }
                }
            },downloadspell(file) {
                this.$http.get( '/jsonfile/download/' + file, {responseType: 'arraybuffer'})
                    .then(response => {
                        this.downloadFile(response, 'spells.json')
                    }, response => {
                        console.warn('error from download_contract')
                        console.log(response)
                        // Manage errors
                    }
            )
    },

    downloadFile(response, filename) {
        // It is necessary to create a new blob object with mime-type explicitly set
        // otherwise only Chrome works like it should
        var newBlob = new Blob([response.body], {type: 'application/pdf'})

        // IE doesn't allow using a blob object directly as link href
        // instead it is necessary to use msSaveOrOpenBlob
        if (window.navigator && window.navigator.msSaveOrOpenBlob) {
            window.navigator.msSaveOrOpenBlob(newBlob)
            return
        }

        // For other browsers:
        // Create a link pointing to the ObjectURL containing the blob.
        const data = window.URL.createObjectURL(newBlob)
        var link = document.createElement('a')
        link.href = data
        link.download = filename + '.pdf'
        link.click()
        setTimeout(function () {
            // For Firefox it is necessary to delay revoking the ObjectURL
            window.URL.revokeObjectURL(data)
        }, 100)
    },
            makefile(){

                axios.post('/jsonfile/make-file', {
                        'selectedIds': this.selected,
                    'dataType': 'spells'
                }
                ).then(response => {
                    axios({
                        url: response,
                        method: 'GET',
                        responseType: 'blob',
                    }).then((response) => {
                       this.downloadspell(response.data)
                    });
                })

            },

            forceFileDownload(response){
                const url = window.URL.createObjectURL(new Blob([response.data]))
                const link = document.createElement('a')
                link.href = url
                link.setAttribute('download', 'spells.json') //or any other extension
                document.body.appendChild(link)
                link.click()
            },


        },
        watch: {
            spells () {
                this.setPages();
            }
        },
        computed: {
            displayedSpells () {
                return this.paginate(this.spells);
            },
            queryResults() {
                if(!this.query) return this.displayedSpells;

                const preparedQuery = fz.prepareQuery(this.query);
                const scores = {};

                return this.displayedSpells
                    .map((spell, index) => {
                        const scorableFields = [
                            spell.name,
                            spell.school.name,
                            spell.classes,
                            spell.source,

                        ].map(toScore => fz.score(toScore, this.query, { preparedQuery }));

                        scores[spell.uuid] = Math.max(...scorableFields);

                        return spell;
                    })
                    .filter(spell => scores[spell.uuid] > 1)
                    .sort((a, b) => scores[b.uuid] - scores[a.uuid])
                    ;
            }
        },
    }
</script>

<style scoped>

</style>
