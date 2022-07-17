<template>
    <div class="container">
        <h5>Post trovati: {{ totalPosts }}</h5>
        <div class="row row-cols-3">
            <!-- single post -->
            <div class="col" v-for="post in posts" :key="post.id">
                <div class="card m-2" style="width: 18rem;">
                <div v-if="post.cover">
                    <img :src="post.cover" class="card-img-top" alt="...">
                </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">
                            {{ troncateText(post.content, 50) }}
                        </p>
                        <router-link :to="{name: 'single-post', params: { slug: post.slug}}" class="btn btn-primary">Dettagli post</router-link>
                    </div>
                </div>
            </div>
            <!-- /single post -->

        </div>
        
        <!-- page number box -->
        <div class="mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" :class="{ disabled: currentPage === 1}"><a @click="getPosts(currentPage - 1)" class="page-link" href="#">Previous</a></li>

                    <li class="page-item" v-for="n in lastPage" :key="n" :class="{ active: currentPage === n }"><a @click="getPosts(n)" class="page-link" href="#">{{ n }}</a></li>

                    <li class="page-item" :class="{ disabled: currentPage === lastPage }"><a @click="getPosts(currentPage + 1)" class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
        <!-- /page number box -->

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
            lastPage: 0,
            totalPosts: 0,
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
                    this.lastPage = resp.data.results.last_page;
                    this.totalPosts = resp.data.results.total;
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