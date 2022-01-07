<template>
    
    <div class="w-3/4 my-7 mx-auto "> 
        <div class="px-24 py-6 text-justify"> 
            <p class="font-bold text-xl">Comments</p>
            <div>
                <custom-button :onClick="showCreateComment" color="green" class="w-full m-3" >
                    Leave a comment
                </custom-button>
            </div>
            <comment-list  @replay="replay($event)" :comments="comments"></comment-list>
            <comment-create v-if="activeCreateComment" @hideCreateComment="hideCreateComment" :parentId="parentId" :replyTo="replyTo" @reloadComments="reloadComments()" :postId="1"></comment-create>
        </div>
    </div>

</template>

<script> 
    import CommentList from '../comments/CommentList.vue'
    import CommentCreate from '../comments/CommentCreate.vue'
    import CustomButton from '../CustomButton.vue'
    import useComments from "../../composables/comments"
    import { onMounted } from "vue"

    const { comments, getComments } = useComments()
  
    export default {
        components: {
            CommentList,
            CommentCreate,
            CustomButton
        },
        name: 'PostIndex',
        data() {
            return { 
                parentId: null,
                replyTo: null,
                activeCreateComment: false,
            }
        },
        methods: {
            replay(comment) {
                this.parentId = comment.id
                this.replyTo = comment.name
                this.activeCreateComment = true
            },
            reloadComments() { 
                getComments(1)
                this.parentId = null
                this.replyTo = null
            },
            showCreateComment() {
                this.activeCreateComment = true
            },
            hideCreateComment() {
                this.activeCreateComment = false
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
 