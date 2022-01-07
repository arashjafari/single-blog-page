<template>
    <div class="bg-white my-5 p-6">
        <p class="font-bold">{{ comment.name }}</p>
        <p class="text-gray-500 text-sm">{{ comment.created_at }}</p> 
        <p>{{ comment.body }}</p>
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