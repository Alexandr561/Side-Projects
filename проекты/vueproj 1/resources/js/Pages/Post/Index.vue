<script setup>
import {Link} from '@inertiajs/vue3'

</script>

<script>

import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "index",
    layout: MainLayout,
    props: [
        'posts'
    ],

   methods: {
        deletePost(id) {
            this.$inertia.delete(`/posts/${id}`)
        }
   }
}
</script>

<template>

        <h1 class="text-lg mb-4">Посты:</h1>
        <div>
            <Link :href="route('post.create')"
                  class="hover:bg-red-500 hover:text-black hover:border-2 hover:border-black border-b-black bg-sky-500 rounded-full text-center p-2 text-white">
                Add Post
            </Link>
        </div>
        <div v-if="posts">
            <div class="mt-3 mb-3 pt-6 border-t border-gray-400" v-for="post in posts">
                <div>id: {{ post.id }}</div>
                <div>title: {{ post.title }}</div>
                <div>content: {{ post.content }}</div>
                <div class="text-sm text-right">date: {{ post.date }}</div>
                <div class="text-sm text-right">
                    <Link class="text-sky-500" :href="route('post.show', post.id)">Show</Link>
                </div>
                <div class="text-sm text-right">
                    <Link class="text-sky-500" :href="route('post.edit', post.id)">Edit</Link>
                </div>
                <div class="text-sm text-right">
                    <p @click="deletePost(post.id)" class="cursor-pointer text-red-500" >Delete</p>
                </div>
            </div>
        </div>

</template>

<style scoped>

</style>
