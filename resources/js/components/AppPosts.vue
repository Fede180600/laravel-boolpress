<template>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col" v-for="post in posts" :key="post.id">
                <div class="card m-2" style="width: 18rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">
                            {{ post.content}}
                        </p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
        </div>
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