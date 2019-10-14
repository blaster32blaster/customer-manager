<template>
    <div class="container">
        <div class="customer-wrapper">
            <div class="row  justify-content-md-center">
                <div class="col col-lg-2 customer-name">
                    {{ customer.name }}
                </div>
                <div class="col col-lg-2">
                    {{ customer.id }}
                </div>
                <div class="col col-lg-2">
                    <modal-component
                            :show="showModal"
                            :customer="customer"
                            @updatedData="$emit('updatedData')"
                    />
                </div>
                <div class="col col-lg-2">
                    <button class="btn-danger" type="button" @click="deleteUser">
                        Delete User
                    </button>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            customer: {}
        },
        data: function () {
            return {
                showModal: false
            }
        },
        methods: {
            deleteUser () {
                axios.delete('/api/customer/' + this.customer.id)
                    .then(response => {
                        this.$emit('updatedData')
                    })
                    .catch(error => {
                        console.log('deleting user data error')
                    });
            }
        },
        mounted() {
        }
    }
</script>