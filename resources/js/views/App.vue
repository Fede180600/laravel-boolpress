<template>
    <div>
        <Header />
        <div class="container text-center py-2">

            <router-view></router-view>

        </div>
    </div>
</template>

<script>
import Header from '../components/Header.vue';

export default {
    name: 'App',
    components: {
        Header
    }
    
}
</script>

<style lang="">
    
</style>