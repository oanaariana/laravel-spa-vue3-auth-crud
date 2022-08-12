<template>
    <div>
        <h4 class="text-center">Add Wizkid</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addWizkid">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="wizkid.name">
                    </div><br>
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" class="form-control" v-model="wizkid.role">
                    </div><br>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="wizkid.email">
                    </div><br>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="text" class="form-control" v-model="wizkid.picture">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Add Wizkid</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            wizkid: {}
        }
    },
    methods: {
        addWizkid() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/wizkids/add', this.wizkid)
                    .then(response => {
                        this.$router.push({name: 'wizkids'})
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
