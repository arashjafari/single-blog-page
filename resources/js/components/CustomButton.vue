<template>
    <button 
        :type="type" 
        @click="onClick" 
        class="focus:ring-1 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
        :class="{
            'text-white bg-red-700 hover:bg-red-800 focus:ring-red-600': (color === '' || color === 'red'),
            'text-white bg-green-700 hover:bg-green-800 focus:ring-green-600': ( color === 'green'),
            'text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-600': ( color === 'blue'),
            'text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-yellow-600': ( color === 'yellow'),
            className
        }">
        <slot/>
    </button>
</template>

<script>
export default {
    name: 'CustomButton',
    props: {
        title: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            default: 'button',
        },
        color: {
            type: String,
            default: '',
        },
        onClick: {
            type: Function,
            required: true,
        },
        className: {
            type: String,
            default: '',
        },

    }, 
}
</script>