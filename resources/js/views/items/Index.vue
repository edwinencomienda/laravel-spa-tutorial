<template>
    <div>
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="title">Items</h1>
            <router-link to="/items/new" class="btn btn-primary">Add New</router-link>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">price</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.price }}</td>
                    <td>
                        <router-link :to="`/items/${item.id}/edit`" class="btn btn-primary btn-sm">Edit</router-link>
                        <button @click="deleteItem(item.id)" class="btn btn-danger btn-sm">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data: () => ({
        items: []
    }),
    created() {
        this.getData()
    },
    methods: {
        async getData() {
            const response = await axios.get('/web-api/items')
            this.items = response.data.data
        },
        async deleteItem(id) {
            const response = await axios.delete(`/web-api/items/${id}`)
            this.getData()
        }
    }
}
</script>