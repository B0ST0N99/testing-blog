<template>
    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form @submit.prevent="saveNewComment">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           v-model="name"
                           aria-describedby="emailHelp"
                           placeholder="Enter name"
                           required>
                </div>

                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text"
                           class="form-control"
                           id="surname"
                           name="surname"
                           v-model="surname"
                           aria-describedby="emailHelp"
                           placeholder="Enter surname"
                           required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control"
                              id="content"
                              name="content"
                              v-model="content"
                              rows="3"
                              placeholder="Enter your comment here"
                              required/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>


    export default {
        data() {
            return {
                name: '',
                surname: '',
                content: '',
            }
        },
        methods: {
            saveNewComment() {
                if( this.name === this.surname &&  this.name === this.content && this.name === '')
                {
                    alert('Type comment data please')
                    return;
                }
                this.$emit('saveNewComment', this.name,this.surname,this.content);
                this.name = this.surname = this.content = '';
            }
        }
    }
</script>

