<template>
    <div class="container">
        <h2>Tabs in Vue.js:</h2>
        <br>

        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('profile')" :class="{ active: isActive('profile') }" href="#profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('files')" :class="{ active: isActive('files') }" href="#files">files</a>
            </li>
        </ul>
        <div class="tab-content py-3" id="myTabContent">
            <div class="tab-pane fade" :class="{ 'active show': isActive('profile') }" id="profile">Profile Info</div>
            <div class="tab-pane fade" :class="{ 'active show': isActive('files') }" id="files">Files</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserProfile",
        data() {
            return {
                activeItem: 'home'
            }
        },
        methods: {
            isActive (menuItem) {
                return this.activeItem === menuItem
            },
            setActive (menuItem) {
                this.activeItem = menuItem
            }
        }
    }
</script>

<style scoped>

</style>
