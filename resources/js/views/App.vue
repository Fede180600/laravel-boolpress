<template>
    <div>
        <div class="container text-center py-2">
            <h1>Lista dei posts:</h1>
            <AppPosts />
        </div>
    </div>
</template>

<script>
import AppPosts from '../components/AppPosts.vue';

export default {
    name: 'App',
    components: {
        AppPosts
    }

}
</script>

<style lang="">
    
</style>