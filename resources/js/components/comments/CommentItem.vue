<template>
    <div>
        <span>{{ comment.name }}</span>
        <p>{{ comment.body }}</p>
        <span>{{ comment.created_at }}</span>
        <hr>
    </div>
</template>

<script>
    export default {
        props: {
            comment: {
                type: Object,
                required: true,
            },
        },
    }
</script>