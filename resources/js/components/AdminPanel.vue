
<template>
    <div>
<div class="wrapper">
    <div class="filters">
        <form>
            <input class="search" name="search">
        </form>
        <button type="submit">Filter</button>
    </div>
    <div class="posts-wrapper">
        <div class="post" v-for="post in posts" :key="post.id">
            <div v-if=post.title class="post-title">{{post.title}}</div>
            <div v-if=post.category class="post-category">Category: {{post.category}}</div>
            <div class="post-description" v-html="post.description"></div>
            <div class="post-title">{{post.author}}</div>
        </div>
    </div>
</div>
        <div class="title">{{title}}</div>
    </div>
</template>

<script>
export default {
    name: "AdminPanel",
    data() {
        return {
            title: 'Posts',
            posts: [],
        };
    },
    props: {
        getPostsRoute: String,
    },
    created() {
        this.fetchPosts();
    },
    methods: {
        fetchPosts() {
            //TODO
            // передать в пропс роут
            //%like search
            fetch('http://127.0.0.1:8000/api/posts')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    this.posts = data.data;
                })
                .catch(error => {
                    console.error('Error while loading the posts', error);
                });
        }
    }

}
</script>
<style scoped>
.search{
    border: 2px solid lightslategrey;
    border-radius: 9px;
}
</style>
