<template>
    <div>
        <comment-item @replay="replay($event)" v-for="comment in comments" :key="comment.id" :comment="comment"></comment-item>
    </div>
</template>

<script>
    import CommentItem from './CommentItem.vue';
    export default {
        components: {
            CommentItem,
        },
        name: 'CommentList',
        props: {
            comments: {
                type: Array,
                required: true,
            },
        },
        methods: {
            replay(comment) { 
                this.$emit('replay', comment);
            },
        },
    }
</script>
 