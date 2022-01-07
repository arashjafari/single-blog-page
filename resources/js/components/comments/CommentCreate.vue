<template>
    <div class="bg-white p-6">
        <div v-if="errors">
            <div v-for="(v, k) in errors" :key="k" >
                <p v-for="error in v" :key="error">
                {{ error }}
                </p>
            </div>
        </div>
 
        <form @submit.prevent="saveComment" >
            <div> 
                <input type="text" name="name" id="name" class="w-2/5 px-3 py-2 border" placeholder="Name" v-model="form.name"> 

                <span v-if="parentId != null">
                    replay to: <b>{{ replyTo }}</b>

                    <button class="m-2 p-1 leading-none bg-red-400" @click="parentId = null"> x </button>
                </span>
            </div>
            <div> 
                <textarea name="body" id="body" cols="30" rows="3" class="my-3 w-full p-3 border" v-model="form.body" placeholder="Please leave a comment"></textarea> 
            </div>
            
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Post comment
            </button>
        </form>
    </div>
</template>

<script>
    import { reactive } from "vue";  
    import useComments from "../../composables/comments";

    export default {
        props: {
            postId: {
                type: Number,
                required: true
            },
            parentId: {
                type: Number,
                default: null
            },
            replyTo: {
                type: String,
                default: null
            },
        },
        name: 'CommentCreate', 
        setup(props, { emit }) {  
            
            const form = reactive({
                'name': '',
                'body': '',
                'post_id': props.postId,
                'parent_id': null,
            })

            const { errors, storeComment } = useComments()

            const clearForm = () => {
                form.name = ''
                form.body = ''
                form.parent_id = null
            }
 
            const saveComment = async () => {
                form.parent_id = props.parentId
                await storeComment({...form})

                clearForm();
                
                emit('reloadComments')
            }

            return {
                form,
                errors,
                saveComment,
            }
        }
    }
</script>
