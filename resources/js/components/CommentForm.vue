<template>
    <form @submit.prevent="submit">
        <div v-html="successComment" class="">
            
        </div>
        <div class="form-group">
            <textarea class="form-control" name="comment" id="comment" cols="34" rows="2" v-model="fields.comment" placeholder="Add a comment..."></textarea>
            <div v-if="errors && errors.comment" class="text-danger">{{ errors.comment[0] }}</div>
        </div>
        <button type="submit" class="btn btn-primary">Save comment</button>
    </form>
</template>

<script>
    export default {
        props: ['postId'],

        data() {
            return {
                fields: {},
                errors: {},
                success: false,
                loaded: true,
                comment: ''
            }
        },
        methods: {
            submit() {
                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};                    
                                            
                    axios.post('/comment/' + this.postId, this.fields)
                    .then(response => {
                        console.log(response.data);
                        var data = response.data.comment;
                        this.comment = '<p><span class="font-weight-bold"><a href="/profile/'+ data.user_id + '"><span class="text-dark">you</span></a></span><span class="pl-1">' + data.comment + '</span><small class="text-muted"> '+ response.data.timeAdded +'</small></p>';
                        this.fields = {};
                        this.loaded = true;
                        this.success = true;
                    }).catch(error => {
                        this.loaded = true;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
                }
            },
        },

        computed: {
            successComment() {                
                return this.comment;
            }
        }
    }
</script>
