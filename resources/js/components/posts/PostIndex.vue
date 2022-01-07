<template>

    <div>
        Post Component

        <comment-list :comments="comments"></comment-list>
        <comment-create :postId="1"></comment-create>
    </div>
</template>

<script> 
    import CommentList from '../comments/CommentList.vue';
    import CommentCreate from '../comments/CommentCreate.vue';
    import useComments from "../../composables/comments";
    import { onMounted } from "vue"; 
  
    export default {
        components: {
            CommentList,
            CommentCreate
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
 