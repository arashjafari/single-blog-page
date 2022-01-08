<template>
    <div class="flex items-center justify-center">
        <p class="text-gray-600 text-center">{{ message }}</p>
    </div>
</template>

<script>
    export default {
        props: {
            message: {
                type: String,
                required: true,
            }, 
        }
    }
</script> 