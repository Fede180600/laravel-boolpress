<template>
    <div>
        
    </div>
</template>

<script>
import Axios from 'axios';


export default {
    name: 'AppPosts',
    data() {
        return {
            posts: []
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            Axios
            .get("http://127.0.0.1:8000/api/posts")
            .then((resp) => {
                this.posts = resp.data.results;
            });
        },
    }

}
</script>

<style lang="">
    
</style>