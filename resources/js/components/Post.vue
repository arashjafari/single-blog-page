<template>
  
  <div>  
        <div class="bg-white">
            <div class="px-7 md:px-24 py-6 text-justify">
                <h2 class="font-bold text-xl">What is Lorem Ipsum?</h2>
                <p class="py-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and
                    scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                    the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing
                    software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>

                <p class="py-3">
                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it
                    to make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic
                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like
                    Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div> 
  </div>

</template>

<script> 
    export default { 
        name: 'PostIndex',
        props: { 
            title: {
                type: String,
                required: true,
            },
            postId: {
                type: Number,
                required: true,
            },
        },
    }
</script>

<style>

</style>