<template>
    <div class="container">
        <h2>Profile Page</h2>
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
            <div class="tab-pane fade" :class="{ 'active show': isActive('profile') }" id="profile">
                <hr>
                <form class="form" action="##" method="post" id="registrationForm">
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="first_name">
                                <h4>First name</h4></label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="last_name">
                                <h4>Last name</h4></label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="phone">
                                <h4>Phone</h4></label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="mobile">
                                <h4>Mobile</h4></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="email">
                                <h4>Email</h4></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="email">
                                <h4>Location</h4></label>
                            <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="password">
                                <h4>Password</h4></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="password2">
                                <h4>Verify</h4></label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" :class="{ 'active show': isActive('files') }" id="files">
                <table class="table table-bordered">
                    <tr>
                        <th>name</th>
                        <th>created</th>
                        <th>Link</th>
                    </tr>

                    <tr v-for="file in files">
                        <td>{{ file.file_name}}</td>
                        <td>{{ file.uploaded_time}}</td>
                        <td><a href="/jsonfile/download/" target="_blank">Link</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserProfile",
        data() {
            return {
                activeItem: 'profile',
                files: []
            }
        },
        created() {
            this.fetchFiles();
        },
        methods: {
            fetchFiles(){
                axios.get('/jsonfile/api-data')
                    .then(response => {
                        this.files = response.data;
                        console.log(response);
                    }).finally()
            },
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
