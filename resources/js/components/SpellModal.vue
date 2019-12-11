<template>
    <transition name="modal">
        <div class="modal modal-mask" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-dialog-scrollable modal-wrapper" role="document">
                <div class="modal-content modal-container bg-dark">

                    <div class="modal-header">
                        {{ creature.name }}
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div id="spellView">
                                <div class="top">
                                    <label>Name:<input name="name" type="text" placeholder="Name..." /></label>
                                    <label>School:<input name="school" type="text"  placeholder="School..." /></label>
                                    <label class="small">Level:<input name="level" type="text"  /></label>
                                    <label class="small left checkbox-label">
                                        <div class="labelText">Ritual:</div>
                                        <input name="ritual" type="checkbox" checked=""}  />
                                        <span class="checkbox-custom circular"></span>
                                    </label>
                                    <label>Casting Time:<input name="time" type="text" placeholder="Casting Time..." /></label>
                                    <label>Range:<input name="range" type="text" placeholder="Range..." /></label>
                                    <label>Duration:<input name="duration" type="text"placeholder="Duration..." /></label>
                                    <label>Components:<input name="components" type="text"  placeholder="Components..." /></label>
                                    <label>Classes:<input name="classes" type="text" placeholder="Classes..." /></label>
                                    <label>Sources:<input name="sources" type="text"  placeholder="Sources..." /></label>
                                </div>
                                <textarea  placeholder="Describtion..."></textarea>


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
        name: "SpellModal",
        data() {
            return {

            }
        },
        props: {
            spell: Object
        }
    }
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
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
    #spellView {
        height: calc(100% - 20px);
        width: calc(100% - 20px);
        overflow: hidden;
        color: darkgray;
        padding: 10px;
        font-family: 'Quicksand', sans-serif;
    }

    #spellView input, #spellView select {
        height: 30px;
        width: 300px;
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

    #spellView select {
        width: 320px;
    }

    #spellView button {
        height: 28px;
        width: auto;
        border: none;
        border-radius: 5px;
        padding-left: 10px;
        padding-right: 10px;
        margin-left: 10px;
        margin-bottom: 5px;
        text-align: center;
        float: left;
        font-family: inherit;
        font-size: 14px;
        background-color: #522a82;
        color: #cfc8d8;
        border-bottom: 2px solid transparent;
        cursor: pointer;
    }

    #spellView button:hover {
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.7);
        cursor: pointer;
    }

    #spellView button.delete {
        background-color: darkred;
    }

    #spellView textarea {
        height: 309px;
        width: 444px;
        float: left;
        resize: none;
        border-radius: 3px;
        border-bottom-right-radius: 0px;
        border: none;
        padding: 10px;
        font-family: inherit;
        font-size: 14px;
        margin-bottom: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0, 0.2);
        background-color: lightgrey;
        color: inherit;
    }

    #spellView label {
        display: inline-block;
        width: 450px;
        text-align: right;
        line-height: 30px;
        float: left;
    }
    #spellView label .labelText{
        float: left;
        height: 37px;
        line-height: 33px;
    }
    #spellView label.small {
        width: 225px;
    }
    #spellView label.left {
        width: 215px;
        float:left;
        text-align: left;
        padding-left: 5px;
        padding-right: 5px;
    }
    #spellView label.small input{
        width: 75px;
    }
    #spellView label.left input{
        float: left;
    }
    #spellView label.small input[type=checkbox]{
        width: 15px;
        background: none;
        box-shadow: none;
    }

    #spellView .top {
        float: left;
        width: 450px;
        margin-right: 10px;
    }

    #spellView::-webkit-scrollbar,
    #spellView textarea::-webkit-scrollbar {
        width: 6px;
        background-color: rgba(0, 0, 0, 0.425);
        border-radius: 5px;
    }

    #spellView::-webkit-scrollbar-thumb,
    #spellView textarea::-webkit-scrollbar-thumb {
        background-color: #8000ff;
        border-radius: 5px;
    }

    .checkbox-label {
        display: block;
        position: relative;
        cursor: pointer;
    }

    .checkbox-label input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkbox-label .checkbox-custom {
        position: absolute;
        top: 2px;
        left: 60px;
        height: 24px;
        width: 24px;
        background-color: transparent;
        border-radius: 5px;
        transition: all 0.3s ease-out;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        border: 2px solid #FFFFFF;
        box-shadow: 0px 0px 10px 0px rgba(172, 172, 172, 0.2);
    }


    .checkbox-label input:checked ~ .checkbox-custom {
        border-radius: 5px;
        -webkit-transform: rotate(0deg) scale(1);
        -ms-transform: rotate(0deg) scale(1);
        transform: rotate(0deg) scale(1);
        opacity:1;
        border: 2px solid #FFFFFF;
        background-color: lightgrey;
    }


    .checkbox-label .checkbox-custom::after {
        position: absolute;
        content: "";
        left: 12px;
        top: 12px;
        height: 0px;
        width: 0px;
        border-radius: 5px;
        border: solid #8000ff;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(0deg) scale(0);
        -ms-transform: rotate(0deg) scale(0);
        transform: rotate(0deg) scale(0);
        opacity:1;
        transition: all 0.3s ease-out;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
    }


    .checkbox-label input:checked ~ .checkbox-custom::after {
        -webkit-transform: rotate(45deg) scale(1);
        -ms-transform: rotate(45deg) scale(1);
        transform: rotate(45deg) scale(1);
        opacity:1;
        left: 8px;
        top: 3px;
        width: 6px;
        height: 12px;
        border: solid #8000ff;
        border-width: 0 2px 2px 0;
        background-color: transparent;
        border-radius: 0;
    }

    .checkbox-label input:checked ~ .checkbox-custom::before {
        transition: all 0.3s ease-out;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
    }


    /* Style for Circular Checkbox */
    .checkbox-label .checkbox-custom.circular {
        border-radius: 50%;
        border: 2px solid #8000ff;
    }

    .checkbox-label input:checked ~ .checkbox-custom.circular {
        background-color: lightgrey;
        border-radius: 50%;
        border: 2px solid lightgrey;
    }
    .checkbox-label input:checked ~ .checkbox-custom.circular::after {
        border: solid #8000ff;
        border-width: 0 2px 2px 0;
    }
    .checkbox-label .checkbox-custom.circular::after {
        border-radius: 50%;
    }

    .checkbox-label .checkbox-custom.circular::before {
        border-radius: 50%;
        border: 2px solid #FFFFFF;
    }

    .checkbox-label input:checked ~ .checkbox-custom.circular::before {
        border-radius: 50%;
    }
</style>
