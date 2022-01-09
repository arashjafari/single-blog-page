<template>
    
    <div class="w-full md:w-3/4 my-7 mx-auto "> 
    
        <error v-if="error500" message="Something went wrong!"></error>
 
        <div class="px-6 md:px-24 py-6 text-justify"> 
            <p class="font-bold text-xl">Comments</p>
            <div>
                <custom-button :onClick="showCreateComment" color="green" class="w-full m-0 my-3 md:m-3" >
                    Leave a comment
                </custom-button>
            </div>

            <div v-if="loading && comments.length !== 0" class="flex items-center justify-center ">
                <div class="w-8 h-8 border-b-2 border-gray-900 rounded-full animate-spin"></div>
            </div>
 
            <alert v-if="!loading && comments.length === 0" message="No comments yet"></alert>

            <div v-if="loading && comments.length === 0">
                <preview-animation v-for="n in 3" v-bind:key="n"></preview-animation>     
            </div>    
 
            <comment-list  @replay="replay($event)" :comments="comments"></comment-list>
            <comment-create :class="{ 'scale-100': activeCreateComment, 'scale-0': !activeCreateComment }" @hideCreateComment="hideCreateComment" :parentId="parentId" :replyTo="replyTo" @reloadComments="reloadComments()" :postId="postId"></comment-create>
        </div>
    </div>

</template>

<script> 
    import { onMounted } from 'vue' 
    import CommentCreate from '../comments/CommentCreate.vue'
    import CommentList from '../comments/CommentList.vue'
    import PreviewAnimation from '../comments/PreviewAnimation.vue'
    import CustomButton from '../CustomButton.vue'
    import Error from '../messages/Error.vue'
    import Alert from '../messages/Alert.vue'
    import useComments from '../../composables/comments'

    const { comments, getComments, loading, error500 } = useComments()
  
    export default {
        components: {
            CommentList,
            CommentCreate,
            CustomButton,
            Error,
            Alert,
            PreviewAnimation,
        },
        name: 'PostIndex',
        props: {
            postId: {
                type: Number,
                required: true,
            },
        },
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
                getComments(this.postId)
                this.clearReplyTo()
                this.hideCreateComment()
            },
            showCreateComment() { 
                this.clearReplyTo()
                this.activeCreateComment = true 
            },
            hideCreateComment() {
                this.activeCreateComment = false
            }, 
            clearReplyTo() {
                this.parentId = null
                this.replyTo = null
            },
        },
        setup(props) { 
            onMounted(getComments(props.postId)) 
 
            return {
                comments,
                loading,
                error500
            }
        } 
    }
</script>
 