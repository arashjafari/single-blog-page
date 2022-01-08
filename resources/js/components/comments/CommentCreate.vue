<template>
    <div class="bg-white pt-6 pb-2 md:pb-6 px-6 md:px-24 fixed bottom-0 left-0 right-0 border-t border-gray-100">
        <div class="w-full md:w-3/4 my-0 mx-auto">
            <div v-if="errors" class="text-red-700 text-xs mb-2">
                <div v-for="(v, k) in errors" :key="k" >
                    <p v-for="error in v" :key="error">
                    {{ error }}
                    </p>
                </div>
            </div>
    
            <form @submit.prevent="saveComment" >
                <div class="flex flex-row gap-1 md:gap-6 items-center"> 
                    <input type="text" name="name" id="name" class="w-2/5 px-3 py-1 md:py-2 border m-0 grow md:grow-0 text-smmd:text-base" placeholder="Name" v-model="form.name" required> 

                    <div v-if="parentId != null" class="flex flex-row items-center">
                        <span class="hidden md:inline-block leading-none">
                            Replay to: 
                        </span>

                        <div class="flex gap-0 bg-green-600 items-stretch ml-1 text-white">
                            <span class="leading-none p-2 text-xs md:text-sm">{{ replyTo }}</span>
                            <button class="m-0 px-2 leading-none bg-green-500 hover:bg-green-700 text-white uppercase font-mono" @click="parentId = null">
                             x
                            </button>
                        </div>
                    </div>
                    
                    <div class="grow text-right">
                        <button @click="hideCreateComment" class="ml-2 md:ml-0 text-gray-700 hover:text-gray-900 font-mono">X</button>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-end mt-2"> 
                    <textarea name="body" id="body" cols="30" rows="2" class="grow w-full md:w-auto mr-0 md:mr-5 mb-1 md:mb-0 p-1 md:p-3 border text-sm md:text-base" v-model="form.body" placeholder="Please leave a comment" required></textarea> 
                    
                    <custom-button :onClick="saveComment" color="red" class="w-full md:w-auto flex-none" >
                        Post comment
                    </custom-button>
                    
                </div>
                
                
            </form>
        </div>
    </div>
</template>

<script>
    import { reactive } from 'vue';  
    import CustomButton from '../CustomButton'
    import useComments from "../../composables/comments";

    export default {
        components: {
            CustomButton
        },
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
        methods: {
            hideCreateComment() {
                this.$emit('hideCreateComment')
            },
        },
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

                if(errors.value == '') {
                    clearForm()
                    emit('reloadComments')
                }  
            }

            return {
                form,
                errors,
                saveComment,
            }
        }
    }
</script>
