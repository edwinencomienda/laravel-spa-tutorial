<template>
    <div class="row">
        <div class="card col-6">
            <div class="card-body">
                <h1 class="card-title">{{ isEditing ? 'Edit Item' : 'Add New Item' }}</h1>
                <form @submit.prevent="() => isEditing ? update() : create()">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input v-model="form.name" type="text" class="form-control">
                    <span class="text-danger text-small">{{ errors.first('name') }}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input v-model="form.price" type="text" class="form-control">
                    <span class="text-danger text-small">{{ errors.first('price') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { Errors } from 'form-backend-validation'

export default {
    data: () => ({
        form: {},
        loading: false,
        errors: new Errors
    }),
    computed: {
        isEditing() {
            return this.$route.params.id !== undefined
        }
    },  
    created() {
        if (this.isEditing) {
            this.getData()
        }
    },
    methods: {
        create() {
            this.loading = true
            axios.post('/web-api/items', this.form)
                .then(response => {
                    this.$router.go(-1)
                })
                .catch(error => this.errors = new Errors(error.response.data.errors))
                .finally(() => this.loading = false)
            
        },
        update() {
            this.loading = true
            axios.put(`/web-api/items/${this.$route.params.id}`, this.form)
                .then(response => {
                    this.$router.go(-1)
                })
                .catch(error => this.errors = new Errors(error.response.data.errors))
                .finally(() => this.loading = false)
            
        },
        getData() {
            this.loading = true
            axios.get(`/web-api/items/${this.$route.params.id}`)
                .then(response => this.form = response.data.data)
                .finally(() => this.loading = false)
        }
    }
}
</script>