
<script>
import {Link} from  '@inertiajs/vue3'
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Edit",

    layout: MainLayout,
    props: [
        'post'
    ],

    components: {
        Link
    },

    data() {
        return{
            id: this.post.id,
            title: this.post.title,
            content: this.post.content,
        }
    },

    methods: {
        update() {
            this.$inertia.patch('/posts/'+ this.id, {title: this.title, content: this.content})
        }
    }
}
</script>


<template>

        <h1 class="text-lg font-semibold mb-4">Изменить пост</h1>

        <div class="mb-8">
        <Link :href="route('post.index')" class="text-sky-500 text-sm mb-8" >Назад</Link>
        </div>

        <form @submit.prevent="update" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="title">Название:</label>
                <input
                    v-model="title"
                type="text"
                id="title"
                placeholder="Введите название поста"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none"
                />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="content">Содержание:</label>
                <textarea
                    id="content"
                    v-model="content"
                rows="4"
                placeholder="Напишите содержание поста..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none resize-none"
                ></textarea>
            </div>
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
                >
                   Изменить!
                </button>
            </div>
        </form>
</template>
<style scoped>

</style>
<!--v-model="form.title"-->
