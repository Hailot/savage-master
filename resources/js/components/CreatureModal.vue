<template>
    <transition name="modal">
        <div class="modal modal-mask" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-dialog-scrollable modal-wrapper modal-lg" role="document">
                <div class="modal-content modal-container bg-dark">

                    <div class="modal-header">
                        <div class="text-center">
                           <h3>{{ creature.name }}</h3>

                        </div>
                        <button class="modal-default-button float-right" @click="$emit('close')">
                            Close
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                        <div id="monsterView">

                            <div class="row">
                                <div class="row">
                                        <div class="col-4" v-if="creature.pic != '' ">
                                                <img :src="creature.url" alt="..." class=" img-thumbnail rounded float-left">

                                        </div>
                                        <div class="col-4" v-else>
                                            <img src="" alt="..." class=" img-thumbnail rounded float-left">

                                        </div>
                                        <div class="col-6 p-2">
                                            <div class="">
                                                <label>Name:<input name="name" type="text" v-model="creature.name" /></label>
                                                <label>Type:<input name="type" type="text" v-model="creature.type.name" /></label>
                                                <label>Subtype:<input name="subtype" type="text" /></label>
                                                <label>Pic:<input name="pic" type="text" v-model="creature.pic" /></label>
                                                <label>Source:<input name="source" type="text" v-model="creature.source" /></label>

                                            </div>
                                        </div>



                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="abilityScores">
                                            <div class="score">
                                                <label>Strength: <input type="text" v-model="creature.strength"/></label>
                                                <div class="abilityBonus"></div>
                                            </div>
                                            <div class="score">
                                                <label>Dexterity: <input type="text" v-model="creature.dexterity" /></label>
                                                <div class="abilityBonus"></div>
                                            </div>
                                            <div class="score">
                                                <label>Constitution: <input type="text" v-model="creature.constitution" /></label>
                                                <div class="abilityBonus"></div>
                                            </div>
                                            <div class="score">
                                                <label>Intelligence: <input type="text" v-model="creature.intelligence" /></label>
                                                <div class="abilityBonus"></div>
                                            </div>
                                            <div class="score">
                                                <label>Wisdom: <input type="text" v-model="creature.wisdom" /></label>
                                                <div class="abilityBonus"></div>
                                            </div>

                                            <div class="score">
                                                <label>Charisma: <input type="text" v-model="creature.charisma" /></label>
                                                <div class="abilityBonus"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-1"></div>
                                        <div class="col-6">
                                                <label  class="smallLabel" >Cr:<input name="cr" type="text" v-model="creature.challenge_rating" /></label>
                                                <label  class="smallLabel">AC:<input name="ac" type="number" v-model="creature.armor_class" /></label>
                                                <label>Alignment:<input name="alignment" type="text" v-model="creature.alignment" /></label>
                                                <label>Hit Points:<input name="hp" type="text" v-model="creature.average_hitpoints" /></label>
                                                <label>Speed:<input name="speed" type="text" v-model="creature.speed" /></label>
                                                <label>Size:<input name="size" type="text" v-model="creature.size" /></label>

                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-12">
                                            <textarea rows="2" v-model="creature.saving_throws"></textarea>
                                            <textarea rows="2" v-model="creature.skills"></textarea>
                                            <textarea rows="2" v-model="creature.senses"></textarea>
                                            <textarea rows="2" v-model="creature.languages"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <textarea rows="2" v-model="creature.damage_vulnerabilities"></textarea>
                                            <textarea rows="2" v-model="creature.damage_resistances"></textarea>
                                            <textarea rows="2" v-model="creature.damage_immunities" placeholder="Damage immunities..."></textarea>
                                            <textarea rows="2" v-model="creature.condition_immunities" placeholder="Condition immunities..."></textarea>
                                        </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">

                                            <textarea class="col-4" v-model="creature.special_abilities" placeholder="Special abilities..."></textarea>


                                            <textarea class="col-4" v-model="creature.attacks" placeholder="Actions..."></textarea>


                                            <textarea class="col-4" v-model="creature.legendary_actions" placeholder="Legendary Actions..."></textarea>

                                    </div>
                                </div>
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
            return {

            }
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
    body {
        height: 100%;
        margin: 0px;
        background-color: #1f2532;
        overflow: hidden;
    }


    #monsterView {
        height: calc(100% - 0px);
        width: calc(100% - 0px);
        overflow: hidden;
        color: darkgrey;
        padding: 10px;
        font-family: 'Quicksand', sans-serif;
    }

    #monsterView input, #monsterView select {
        height: 30px;
        width: 200px;
        border: none;
        border-radius: 3px;
        padding-left: 10px;
        padding-right: 10px;
        margin-left: 5px;
        margin-bottom: 5px;
        float: right;
        font-family: inherit;
        font-size: 14px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0, 0.2);
        background-color: #475062;
        color: lightgrey;
    }
    #monsterView .smallLabel input {
        width: 100px;
    }
    #monsterView select {
        width: 220px;
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
        box-shadow: 0px 0px 10px 0px rgba(0,0,0, 0.2);
        background-color: #475062;
        color: lightgrey;
    }

    #monsterView textarea.small {
        height: 28px;
        width: 300px;
        line-height: 15px;
    }

    #monsterView label {
        display: inline-block;
        width: 320px;
        text-align: right;
        line-height: 30px;
    }

    #monsterView label.smallLabel {
        display: inline-block;
        width: 150px;
        text-align: right;
        line-height: 30px;
        margin-left: 10px;
    }

    #monsterView .top {
        float: left;
        width: 320px;
        height: 220px;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    #monsterView .image {
        float: left;
        width: 220px;
        height: 220px;
        overflow: hidden;
        margin-right: 5px;
        margin-bottom: 5px;
        box-shadow: 0px 0px 10px 0px rgba(172, 172, 172, 0.2);
        background-color: white;
    }

    #monsterView .abilityScores {
        height: 220px;
        width: 220px;
        margin-right: 5px;
        margin-bottom: 5px;
        float: left;
    }
        #monsterView .abilityScores .score {
        width: 210px;
        float: left;
        height: 35px;
        line-height: 30px;
    }
    #monsterView .abilityScores .score input {
        width: 40px;
        margin-right: 5px;
    }
    #monsterView .abilityScores .score label {
        float: left;
        width: 180px;
    }

    #monsterView .abilityScores .score .abilityBonus {
        width: 30px;
        height: 30px;
        line-height: 30px;
        float: right;
        text-align: center;
        border-top-right-radius: 3px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0, 0.2);
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
