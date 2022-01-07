<template>
    
    <div class="w-3/4 my-7 mx-auto "> 
        <div class="px-24 py-6 text-justify"> 
            <p class="font-bold text-xl">Comments</p>
            <comment-list  @replay="replay($event)" :comments="comments"></comment-list>
            <comment-create :parentId="parentId" :replyTo="replyTo" @reloadComments="reloadComments()" :postId="1"></comment-create>
        </div>
    </div>

</template>

<script> 
    import CommentList from '../comments/CommentList.vue';
    import CommentCreate from '../comments/CommentCreate.vue';
    import useComments from "../../composables/comments";
    import { onMounted } from "vue"; 
    const { comments, getComments } = useComments()
  
    export default {
        components: {
            CommentList,
            CommentCreate
        },
        name: 'PostIndex',
        data() {
            return { 
                parentId: null,
                replyTo: null,
            }
        },
        methods: {
            replay(comment) {
                this.parentId = comment.id
                this.replyTo = comment.name
            },
            reloadComments() { 
                getComments(1)
                this.parentId = null
                this.replyTo = null
            },
        },
        setup() { 
            onMounted(getComments(1)) // get comments for post 1
 
            return {
                comments
            }
        } 
    }
</script>
 