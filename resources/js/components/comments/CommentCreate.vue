<template>
    <div>
        <div v-if="errors">
            <div v-for="(v, k) in errors" :key="k" >
                <p v-for="error in v" :key="error">
                {{ error }}
                </p>
            </div>
        </div>

        <form @submit.prevent="saveComment" >
            <label for="name" >Name</label> 
            <input type="text" name="name" id="name"  v-model="form.name"> 
            <label for="body" >Comment</label> 
            <input type="text" name="body" id="body"  v-model="form.body"> 
            <button type="submit">Create</button>
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
            }
        },
        setup(props) { 
 
            const form = reactive({
                'name': '',
                'body': '',
                'post_id': props.postId
            })

            const { errors, storeComment } = useComments()

            const saveComment = async () => {
                await storeComment({...form});
            }

            return {
                form,
                errors,
                saveComment,
            }
        }
    }
</script>
