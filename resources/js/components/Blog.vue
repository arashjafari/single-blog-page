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
            <post :title="title" />
        </div>
    </div>

</template>

<script>
    import Post from './Post'

    export default {
        components: {
            Post
        },
        name: 'Blog',
        data() {
            return { 
                title: 'Awesome blog',
            }
        }, 
    }
</script>

<style>

</style>