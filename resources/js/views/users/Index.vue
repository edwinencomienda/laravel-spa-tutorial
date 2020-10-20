<template>
    <div>
        this is the users index
        {{ app.currentUser }}
    </div>
</template>

<script>
export default {
    mounted() {
        console.log(this.app, 'edwin')
    }
}
</script>