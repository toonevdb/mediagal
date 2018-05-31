<template>
    <img :src="content.url" class="img-thumbnail">
</template>

<script>
    export default {
        props: ['content'],
        mounted() {
            console.info('CCCOMP mounted')
        }
    }
</script>
