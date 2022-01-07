<template>
    <div class="mt-5 text-sm"  v-bind:class="{ 'pl-7' : (level > 1) }">
        <div v-bind:class="{ 'bg-slate-200 rounded-md p-4' : (level > 1) }">
            <div class="flex flex-row"> 
                <img src="/img/profile.png" alt="profile" class="w-12 opacity-50"> 
                <div class="pl-5">
                    <div class="font-bold">{{ comment.name }}</div>
                    <div class="text-gray-500 text-sm">{{ comment.created_at }}</div> 
                </div>
            </div>
        
            <p>{{ comment.body }}</p> 
            <div v-if="level < 3">
                <button class="text-red-700 font-bold" @click="replay(comment)">Reply</button>
            </div> 
        </div>
        <div v-if="comment.nested_children.length > 0">   
            <comment-item  @replay="replay($event)" v-for="comment in comment.nested_children" :key="comment.id" :level="level + 1" :comment="comment"></comment-item>
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
            level: {
                type: Number,
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