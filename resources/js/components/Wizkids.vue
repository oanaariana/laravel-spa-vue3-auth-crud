<template>
    <div>
        <h4 class="text-center">All Wizkids</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Picture</th>
                 <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="wizkid in wizkids" :key="wizkid.id">
                <td>{{ wizkid.id }}</td>
                <td>{{ wizkid.name }}</td>
                <td>{{ wizkid.role }}</td>
                <td>{{ wizkid.email }}</td>
                <td>{{ wizkid.picture }}</td>
                <td>{{ wizkid.phone }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editwizkid', params: { id: wizkid.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteWizkid(wizkid.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/wizkids/add')">Add Wizkids</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            wizkids: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/wizkids')
                .then(response => {
                    this.wizkids = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteWizkid(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/wizkids/delete/${id}`)
                    .then(response => {
                        let i = this.wizkids.map(item => item.id).indexOf(id); // find index of your object
                        this.wizkids.splice(i, 1)
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
