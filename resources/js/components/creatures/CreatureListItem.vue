<template>
    <tr>
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
        <td><a @click.prevent="toggleModal(creature)" href="#">Open Modal</a></td>


    </tr>
</template>

<script>
    export default {
        name: "CreatureListItem",
        props: ['creature'],
        methods: {
            toggleModal(creature) {
                Event.$emit('toggleModal',creature)
            }
        }
    }
</script>

<style scoped>

</style>
