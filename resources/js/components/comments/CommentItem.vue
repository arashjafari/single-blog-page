<template>
    <div class="bg-white my-2 p-6">
        <p class="font-bold">{{ comment.name }}</p>
        <p class="text-gray-500 text-sm">{{ comment.created_at }}</p> 
        <p>{{ comment.body }}</p> 
        <div>
            <button>Reply</button>
        </div> 
        <div v-if="comment.nested_children.length > 0">   
            <comment-item v-for="comment in comment.nested_children" :key="comment.id" :comment="comment"></comment-item>
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
    }
</script>