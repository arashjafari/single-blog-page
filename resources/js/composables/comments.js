import { ref } from 'vue'
import axios from "axios"; 

export default function useComments() {
    const comments = ref([]) 
    const errors = ref('')
    const loading = ref(false)
    const error500 = ref(false)

    const getComments = async (post_id) => {
        loading.value = true
        error500.value = false
        try {
            let response = await axios.get(`/api/v1/comments/${post_id}`)
            comments.value = response.data.comments; 
        } catch (error) {
            if (error.response.status === 500) {
                error500.value = true
            } 
        }
        loading.value = false
    }

    const storeComment = async (data) => {
        loading.value = true
        error500.value = false
        errors.value = ''
        try {
            await axios.post('/api/v1/comments', data)
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            } else if (e.response.status === 500) { 
                error500.value = true 
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
        error500,
    }
}
