<template>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col" v-for="post in posts" :key="post.id">
                <div class="card m-2" style="width: 18rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">
                            {{ troncateText(post.content, 50) }}
                        </p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                    <li class="page-item"><a @click="getPosts(currentPage + 1)" class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';


export default {
    name: 'AppPosts',
    data() {
        return {
            posts: [],
            currentPage: 1,
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts(pageNumber) {
            Axios
                .get("http://127.0.0.1:8000/api/posts", {
                    params: {
                        page: pageNumber
                    }
                })
                .then((resp) => {
                    this.posts = resp.data.results.data;
                    this.currentPage = resp.data.results.current_page;
                });
        },
        troncateText(text, maxCharNum) {
            if (text.length > maxCharNum) {
                return text.substr(0, maxCharNum) + '...';
            }
            return text;
        }
    }

}
</script>

<style lang="">
    
</style>