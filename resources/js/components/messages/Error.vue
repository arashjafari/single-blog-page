<template>
    <div class="flex items-center justify-center bg-red-600 text-white">
        <p class="p-2">{{ message }}</p>
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