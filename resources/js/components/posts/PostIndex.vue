<template>
    
    <div class="bg-white w-4/6 my-7 mx-auto p-5">
        <div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Placeat minima iure, quibusdam, voluptates, consectetur quaerat perferendis aspernatur quidem aperiam tempora quae. 
                Aperiam perspiciatis pariatur aliquam earum. Error ducimus odio at!
            </p>  
            <p>
                Nam at lectus urna duis convallis. Quis imperdiet massa tincidunt nunc pulvinar sapien et ligula. Nam aliquam sem et tortor consequat. Viverra adipiscing at in tellus integer. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum. Nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Posuere ac ut consequat semper viverra nam libero justo laoreet. Purus faucibus ornare suspendisse sed nisi lacus. Mi bibendum neque egestas congue. Varius morbi enim nunc faucibus a pellentesque sit. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Massa tempor nec feugiat nisl. Sollicitudin ac orci phasellus egestas tellus rutrum tellus.
            </p>
        </div> 
    </div>

    <div class="w-4/6 my-7 mx-auto "> 
        <p class="font-bold text-xl">Comments</p>
        <comment-list  @replay="replay($event)" :comments="comments"></comment-list>
        <comment-create :parentId="parentId" :replyTo="replyTo" @reloadComments="reloadComments()" :postId="1"></comment-create>
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
 