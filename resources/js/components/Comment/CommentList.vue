<template>
    <div>
        <!-- Single Comment -->
        <div class="media mb-4" v-for="comment in comments" :key="comment.id">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">{{ comment.author }}</h5>
                {{ comment.content }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            comments: {
                type: Array,
                default: []
            }
        }
    }
</script>

<style>

</style>

