<template>

    <div>
        Post Component

        <comment-list :comments="comments"></comment-list>
    </div>
</template>

<script> 
    import CommentList from '../comments/CommentList.vue';
    import useComments from "../../composables/comments";
    import { onMounted } from "vue";
  
    export default {
        components: {
            CommentList
        },
        setup() {
            const { comments, getComments } = useComments()

            onMounted(getComments(1)) // get comments for post 1
 
            return {
                comments
            }
        } 
    }
</script>
 