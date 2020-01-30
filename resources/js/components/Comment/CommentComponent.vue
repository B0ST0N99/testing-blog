<template>
    <div>
        <MessageComposer @saveNewComment="newComment"/>
        <CommentList :comments="comments"/>
    </div>
</template>

<script>
    import CommentList from './CommentList'
    import MessageComposer from './MessageComposer'

    export default {
        props: {
            itemId: {
                type: Number,
                required: true
            },
            commentType: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                comments: [],
            }
        },
        mounted() {
            axios.get(`/comment/${this.commentType}/${this.itemId}`)
                .then(response => {
                    console.log(response);
                    this.comments = response.data.comments;
                })
                .catch(errors => {
                    console.log(errors);
                });
            console.log('Component mounted.')
        },
        methods: {
            newComment(name,surname,content){
                let data ={
                    name,
                    surname,
                    content,
                    commentable_id: this.itemId
                };
                axios.post(`/comment/${this.commentType}`,data)
                    .then(response => {
                        console.log(response);
                        this.comments.splice(0,0,response.data.comment);
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            }
        },
        components: {CommentList, MessageComposer}

    }
</script>
