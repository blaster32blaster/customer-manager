<template>
    <div class="container customer-emails">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2 email-address">
                <div class="row">
                    Email
                </div>
                <div class="row">
                    <input type="text" v-model="emailData.email"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center email-buttons">
            <div class="col col-lg-2">
                <button class="btn-success" @click="saveEmail" type="button">Save Email</button>
            </div>
            <div class="col col-lg-2">
                <button class="btn-danger" @click="deleteEmail" type="button">Delete Email</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            email: {}
        },
        data: function () {
            return {
                emailData: this.email
            }
        },
        methods: {
            saveEmail () {
                axios.put('/api/email/' + this.email.id, {
                    address: this.emailData.email
                })
                    .then(response => {
                        this.$emit('updatedEmail')
                    })
                    .catch(error => {
                        console.log('updating email data error')
                    });
            },
            deleteEmail () {
                axios.delete('/api/email/' + this.email.id)
                    .then(response => {
                        this.$emit('deletedEmail')
                    })
                    .catch(error => {
                        console.log('deleting email data error')
                    });
            }
        },
        mounted() {
        }
    }
</script>