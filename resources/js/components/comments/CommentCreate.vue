<template>
    <div class="bg-white py-6 px-24 fixed bottom-0 left-0 right-0 border-t border-gray-100">
        <div class="w-3/4 my-0 mx-auto">
            <div v-if="errors">
                <div v-for="(v, k) in errors" :key="k" >
                    <p v-for="error in v" :key="error">
                    {{ error }}
                    </p>
                </div>
            </div>
    
            <form @submit.prevent="saveComment" >
                <div class="flex flex-row gap-6 items-center"> 
                    <input type="text" name="name" id="name" class="w-2/5 px-3 py-2 border m-0" placeholder="Name" v-model="form.name"> 

                    <div v-if="parentId != null" class="flex flex-row items-center">
                        <span class="leading-none">
                            Replay to: 
                        </span>

                        <div class="flex gap-0 bg-green-600 items-stretch ml-1 text-white">
                            <span class="leading-none p-2">{{ replyTo }}</span>
                            <button class="m-0 px-2 leading-none bg-green-500 text-white" @click="parentId = null">
                             x 
                            </button>
                        </div>

                    </div>
                </div>
                <div class="flex flex-row items-end mt-2"> 
                    <textarea name="body" id="body" cols="30" rows="2" class="grow mr-5 p-3 border" v-model="form.body" placeholder="Please leave a comment"></textarea> 
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:red-blue-700 dark:focus:ring-red-800 flex-none">
                        Post comment
                    </button>
                </div>
                
                
            </form>
        </div>
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
