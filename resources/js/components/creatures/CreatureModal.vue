<template>
    <transition name="modal">
        <div class="modal modal-mask" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-scrollable modal-wrapper modal-xl" role="document">
                <div class="modal-content modal-container bg-dark">

                    <div class="modal-header">
                        <div class="text-center">
                            <h3>{{ creature.name }}</h3>

                        </div>

                        <button type="button" class="close float-right bg-white" aria-label="Close" @click="$emit('close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div id="monsterView">
                                <form>

                                    <div class="row ml-3">
                                        <div class="col-12">
                                            <div class="row mb-2">
                                                <div class="col-4 img-thumbnail" v-if="creature.pic != '' ">
                                                    <img :src="creature.url" alt="..." class="image">

                                                </div>
                                                <div class="col-4 img-thumbnail" v-else>
                                                    <div class="image">
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-7">
                                                    <div class="form-group row">
                                                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                                                        <div class="col-sm-6">
                                                            <input name="name" id="name" class="form-control"
                                                                   type="text" v-model="creature.name"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="type" class="col-sm-4 col-form-label">Type</label>
                                                        <div class="col-sm-6">
                                                            <input name="type" id="type" class="form-control"
                                                                   type="text" v-model="creature.type.name"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="subtype"
                                                               class="col-sm-4 col-form-label">SubType</label>
                                                        <div class="col-sm-6">
                                                            <input name="subtype" type="text"
                                                                   class="form-control" id="subtype"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="pic" class="col-sm-4 col-form-label">Pic</label>
                                                        <div class="col-sm-6">
                                                            <input name="pic" type="text" id="pic"
                                                                   class="form-control"
                                                                   v-model="creature.url"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="source"
                                                               class="col-sm-4 col-form-label">Source</label>
                                                        <div class="col-sm-6">
                                                            <input name="source" id="source"
                                                                   class="form-control" type="text"
                                                                   v-model="creature.source"/>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4 abilityScores">

                                                    <div class="form-group row score">
                                                        <label for="strength"
                                                               class="col-sm-5 col-form-label">Strength:</label>
                                                        <div class="col-sm-3">
                                                            <input class="form-control" type="text" id="strength"
                                                                   v-model="creature.strength"/>
                                                        </div>
                                                        <div class="col-2 abilityBonus">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row score">
                                                        <label for="dexterity" class="col-sm-5 col-form-label ">Dexterity:</label>
                                                        <div class="col-sm-3">
                                                            <input class="form-control " type="text" id="dexterity"
                                                                   v-model="creature.dexterity"/>

                                                        </div>
                                                        <div class="col-2 abilityBonus">

                                                        </div>

                                                    </div>
                                                    <div class="form-group row score">
                                                        <label for="constitution" class="col-sm-5 col-form-label ">Constitution:</label>
                                                        <div class="col-sm-3">
                                                            <input class="form-control " type="text" id="constitution"
                                                                   v-model="creature.constitution"/>

                                                        </div>
                                                        <div class="col-2 abilityBonus">

                                                        </div>

                                                    </div>
                                                    <div class="form-group row score">
                                                        <label for="intelligence" class="col-sm-5 col-form-label">Intelligence:</label>
                                                        <div class="col-sm-3">
                                                            <input class="form-control " type="text" id="intelligence"
                                                                   v-model="creature.intelligence"/>

                                                        </div>
                                                        <div class="col-2 abilityBonus">

                                                        </div>

                                                    </div>
                                                    <div class="form-group row score">
                                                        <label for="wisdom"
                                                               class="col-sm-5 col-form-label">Wisdom:</label>
                                                        <div class="col-sm-3">
                                                            <input class="form-control " type="text" id="wisdom"
                                                                   v-model="creature.wisdom"/>

                                                        </div>
                                                        <div class="col-2 abilityBonus">

                                                        </div>

                                                    </div>
                                                    <div class="form-group row score">
                                                        <label for="charisma"
                                                               class="col-sm-5 col-form-label">Charisma:</label>
                                                        <div class="col-sm-3">
                                                            <input class="form-control " type="text" id="charisma"
                                                                   v-model="creature.charisma"/>
                                                        </div>
                                                        <div class="col-2 abilityBonus">

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-7">
                                                    <div class="form-group row">
                                                        <div class="col-2"></div>
                                                        <label for="cr" class="col-2 col-form-label">CR: </label>
                                                        <div class="col-2">
                                                            <input name="cr" type="text" id="cr"
                                                                   class="form-control text-center"
                                                                   v-model="creature.challenge_rating"/>
                                                        </div>
                                                        <label for="ac" class="col-2 col-form-label">AC: </label>
                                                        <div class="col-2">
                                                            <input name="ac" type="text" id="ac"
                                                                   class="form-control text-center"
                                                                   v-model="creature.armor_class"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="alignment"
                                                               class="col-sm-4 col-form-label">Alignment</label>
                                                        <div class="col-sm-6">
                                                            <input name="alignment" id="alignment"
                                                                   class="form-control" type="text"
                                                                   v-model="creature.alignment"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="hp" class="col-sm-4 col-form-label">Hit
                                                            Points</label>
                                                        <div class="col-sm-6">
                                                            <input name="hp" id="hp" class="form-control"
                                                                   type="text" v-model="creature.average_hitpoints"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="speed" class="col-sm-4 col-form-label">Speed</label>
                                                        <div class="col-sm-6">
                                                            <input name="speed" id="speed"
                                                                   class="form-control" type="text"
                                                                   v-model="creature.speed"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="size" class="col-sm-4 col-form-label">Size</label>
                                                        <div class="col-sm-6">
                                                            <input name="size" id="size" class="form-control"
                                                                   type="text" v-model="creature.size"/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                            <textarea class="form-control" rows="2"
                                                                      v-model="creature.saving_throws"></textarea>
                                                        </div>
                                                        <div class="col-3">
                                                            <textarea class="form-control" rows="2"
                                                                      v-model="creature.skills"></textarea>
                                                        </div>
                                                        <div class="col-3">
                                                            <textarea class="form-control" rows="2"
                                                                      v-model="creature.senses"></textarea>
                                                        </div>
                                                        <div class="col-3">
                                                            <textarea class="form-control" rows="2"
                                                                      v-model="creature.languages"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                            <textarea rows="2" class="form-control"
                                                                      v-model="creature.damage_vulnerabilities"></textarea>
                                                        </div>
                                                        <div class="col-3">
                                                            <textarea rows="2" class="form-control"
                                                                      v-model="creature.damage_resistances"></textarea>
                                                        </div>
                                                        <div class="col-3">
                                                            <textarea rows="2" class="form-control"
                                                                      v-model="creature.damage_immunities"
                                                                      placeholder="Damage immunities..."></textarea>
                                                        </div>
                                                        <div class="col-3">
                                                            <textarea rows="2" class="form-control"
                                                                      v-model="creature.condition_immunities"
                                                                      placeholder="Condition immunities..."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-4">
                                                            <textarea class="form-control" rows="8"
                                                                      v-model="creature.special_abilities"
                                                                      placeholder="Special abilities..."></textarea>
                                                        </div>
                                                        <div class="col-4">
                                                            <textarea class="form-control" rows="8"
                                                                      v-model="creature.attacks"
                                                                      placeholder="Actions..."></textarea>
                                                        </div>
                                                        <div class="col-4">
                                                            <textarea class="form-control" rows="8"
                                                                      v-model="creature.legendary_actions"
                                                                      placeholder="Legendary Actions..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                        <div class="modal-footer">

                            <button class="modal-default-button" @click="$emit('close')">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "CreatureModal",
        data() {
            return {}
        },
        props: {
            creature: Object
        }
    }
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        vertical-align: middle;
    }

    .modal-container {
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }


    #monsterView {
        height: calc(100% - 0px);
        width: calc(100% - 0px);

        color: darkgrey;
        font-family: 'Quicksand', sans-serif;
    }

    #monsterView input, #monsterView select {

        border: none;
        border-radius: 3px;
        font-family: inherit;
        font-size: 14px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        background-color: #475062;
        color: lightgrey;
    }

    #monsterView .smallLabel input {
    }

    #monsterView select {
    }


    #monsterView button {
        height: 32px;
        width: auto;
        border: none;
        border-radius: 5px;
        padding-left: 10px;
        padding-right: 10px;
        margin-bottom: 5px;
        margin-left: 5px;
        text-align: center;
        float: right;
        font-family: inherit;
        font-size: 14px;
        background-color: #522a82;
        color: #cfc8d8;
        cursor: pointer;
    }

    #monsterView button:hover {
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.7);
        cursor: pointer;
    }

    #monsterView button.delete {
        background-color: darkred;
    }

    #monsterView textarea {

        float: left;
        resize: none;
        border-radius: 3px;
        border-bottom-right-radius: 0px;
        border: none;
        font-family: inherit;
        font-size: 14px;
        margin-bottom: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        background-color: #475062;
        color: lightgrey;
    }

    #monsterView textarea.small {

    }

    #monsterView label {
        text-align: right;
    }

    #monsterView label.smallLabel {

    }

    #monsterView .top {
        float: left;
        width: 320px;
        height: 220px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .img-thumbnail {
        background-color: transparent;
        box-shadow: 0px 0px 10px 0px rgba(172, 172, 172, 0.2);
    }

    #monsterView .image {
        padding: 0.25rem;
        max-width: 100%;
        height: auto;
        max-height: 100%;
    }

    #monsterView .abilityScores {
        text-align: right;

    }

    #monsterView .abilityScores .score {

    }

    #monsterView .abilityScores .score input {
        text-align: center;
    }

    #monsterView .abilityScores .score label {

    }

    #monsterView .abilityScores .score .abilityBonus {

        text-align: center;
        border-top-right-radius: 3px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        border-radius: 30px;
        background-color: #475062;
    }

    #monsterView::-webkit-scrollbar,
    #monsterView textarea::-webkit-scrollbar {
        width: 6px;
        background-color: rgba(0, 0, 0, 0.425);
        border-radius: 5px;
    }

    #monsterView::-webkit-scrollbar-thumb,
    #monsterView textarea::-webkit-scrollbar-thumb {
        background-color: #8000ff;
        border-radius: 5px;
    }
</style>
