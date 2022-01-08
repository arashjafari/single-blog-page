import { ref } from 'vue'
import axios from "axios"; 

export default function useComments() {
    const comments = ref([]) 
    const errors = ref('')
    const loading = ref(false)

    const getComments = async (post_id) => {
        loading.value = true
        let response = await axios.get(`/api/v1/comments/${post_id}`)
        comments.value = response.data.comments; 
        loading.value = false
    }

    const storeComment = async (data) => {
        loading.value = true
        errors.value = ''
        try {
            await axios.post('/api/v1/comments', data)
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
        loading.value = false
    }
  
    return {
        comments, 
        errors,
        getComments, 
        storeComment,
        loading,
    }
}
