<template>
    <div>
        <transition-group name="list-complete" tag="div">\
            <!-- Single Comment -->
            <div class="media mb-4 list-complete-item" v-for="comment in comments" :key="comment.id">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{ comment.author }}</h5>
                    {{ comment.content }}
                </div>
            </div>
        </transition-group>
    </div>
</template>

<script>
    export default {
        props: {
            comments: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
                items: [1,2,3,4,5,6,7,8,9],
                nextNum: 10,
            }
        },
        methods: {
            randomIndex: function () {
                return Math.floor(Math.random() * this.items.length)
            },
            add: function () {
                this.items.splice(this.randomIndex(), 0, this.nextNum++)
            },
            remove: function () {
                this.items.splice(this.randomIndex(), 1)
            },
            shuffle: function () {
                this.items = _.shuffle(this.items)
            },
        }
    }
</script>

<style>
    .list-complete-item {
        transition: all 1s;
        /*display: inline-block;*/
        margin-right: 10px;
    }
    .list-complete-enter, .list-complete-leave-to
        /* .list-complete-leave-active до версии 2.1.8 */ {
        opacity: 0;
        transform: translateY(-30px);
    }
    .list-complete-leave-active {
        position: absolute;
    }
</style>


