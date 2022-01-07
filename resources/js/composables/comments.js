import { ref } from 'vue'
import axios from "axios"; 

export default function useComments() {
    const comments = ref([]) 

    const getComments = async (post_id) => {
        let response = await axios.get(`/api/v1/comments/${post_id}`)
        comments.value = response.data.comments;
    }
  
    return {
        comments, 
        getComments, 
    }
}
