import { ref } from 'vue'
import axios from "axios"; 

export default function useComments() {
    const comments = ref([]) 
    const errors = ref('')

    const getComments = async (post_id) => {
        let response = await axios.get(`/api/v1/comments/${post_id}`)
        comments.value = response.data.comments;
        console.log(comments.value);
    }

    const storeComment = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/v1/comments', data)
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }
  
    return {
        comments, 
        errors,
        getComments, 
        storeComment,
    }
}
