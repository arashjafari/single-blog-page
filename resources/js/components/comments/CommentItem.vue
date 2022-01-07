<template>
    <div class="mt-12">
        <p class="font-bold">{{ comment.name }}</p>
        <p class="text-gray-500 text-sm">{{ comment.created_at }}</p> 
        <p>{{ comment.body }}</p> 
        <div>
            <button @click="replay(comment)">Reply</button>
        </div> 
        <div v-if="comment.nested_children.length > 0">   
            <comment-item  @replay="replay($event)" v-for="comment in comment.nested_children" :key="comment.id" :comment="comment"></comment-item>
        </div>
    </div>
</template>

<script> 

    export default { 
        name: 'CommentItem',
        props: {
            comment: {
                type: Object,
                required: true,
            },
        },
        methods: {
            replay(comment) {
                this.$emit('replay', comment)
            },
        },
    }
</script>