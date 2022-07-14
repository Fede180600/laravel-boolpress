<template>
    <div class="text-left">
        <section v-if="post">
            <h1>Dettagli post:</h1>
            <h3>Titolo Post: {{ post.title }}</h3>
            <p>Contenuto: {{ post.content }}</p>
            <p>Categoria: {{ categoryName }}</p>
            <i class="fa fa-smile"></i>
            <div>
                <span v-for="tag in post.tags" :key="tag.id" class="badge bg-primary">{{ tag.name }}</span>
            </div>
        </section>
        <section v-else>
            <h2>Loading...</h2>
        </section>
    </div>
</template>

<script>
import Axios from 'axios';

export default {
    name: 'SinglePost',
    data() {
        return {
            post: null
        }
    },
    created() {
        this.getPostDetails();
    },
    computed: {
        categoryName() {
            return this.post.category ? this.post.category.name : 'nessuna';
        },
    },
    methods: {
        getPostDetails() {
            const slug = this.$route.params.slug;
            Axios
            .get(`/api/posts/${slug}`)
            .then((resp) => {
                if(resp.data.success) {
                    this.post = resp.data.results;
                } else {
                    this.$router.push({ name: 'not-found'});
                };
            })
        }
    }
}
</script>

<style lang="">
    
</style>