<template>
    <div>
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
    methods: {
        getPostDetails() {
            const slug = this.$route.params.slug;
            Axios
            .get(`/api/posts/${slug}`)
            .then((resp) => {
                this.post = resp.data.results;
            })
        }
    }
}
</script>

<style lang="">
    
</style>