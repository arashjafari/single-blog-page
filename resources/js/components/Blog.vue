<template>
  
    <div>
        <div class="h-40 md:h-80 max-w-screen-2xl overflow-hidden">
            <div class="header-bg bottom-0 top-0 opacity-50 h-40 md:h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
            </div>
            <div
                class="header-bg header-bg-2 bottom-0 top-0 opacity-50 h-40 md:h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
            </div>
            <div
                class="header-bg header-bg-3 bottom-0 top-0 opacity-50 h-40 md:h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
            </div>
        </div>

        <div class="-mt-40 md:-mt-80 w-full h-60">
            <div class="w-11/12 md:w-3/4 mx-auto my-0 shadow-xl">
                <div class="min-h-min md:h-52 xl:h-72 relative bg-teal-600 bg-header-image bg-cover bg-fixed">
                    <h2 class="font-bold text-2xl md:text-3xl leading-tight relative md:absolute pt-12 pb-7 md:pt-7 md:pb-0 mx-10 md:mx-12 top-2/4 text-gray-200 uppercase">
                        {{ title }}
                    </h2>
                </div>
                <post :title="title" :postId="postId" />
            </div>
            
            <comment-box :postId="postId" ></comment-box>
        </div>
    </div>

</template>

<script>
    import Post from './Post.vue'
    import CommentBox from './comments/CommentBox.vue';

    export default {
        components: {
            Post,
            CommentBox,
        },
        name: 'Blog',
        data() {
            return { 
                title: 'Awesome blog',
                postId: 1, 
            }
        },  
    }
</script>

<style>

</style>