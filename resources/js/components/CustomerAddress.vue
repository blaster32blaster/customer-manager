<template>
    <div class="container customer-address">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2 address-country">
                <div class="row">
                    Country
                </div>
                <div class="row">
                    <input type="text" v-model="addressData.country"/>
                </div>
            </div>
            <div class="col col-lg-2 address-state">
                <div class="row">
                    State
                </div>
                <div class="row">
                    <input type="text" v-model="addressData.state"/>
                </div>
            </div>
            <div class="col col-lg-2 address-city">
                <div class="row">
                    City
                </div>
                <div class="row">
                    <input type="text" v-model="addressData.city"/>
                </div>
            </div>
            <div class="col col-lg-2 address-street">
                <div class="row">
                    Street
                </div>
                <div class="row">
                    <input type="text" v-model="addressData.street"/>
                </div>
            </div>
            <div class="col col-lg-2 address-zip">
                <div class="row">
                    Zip
                </div>
                <div class="row">
                    <input type="text" v-model="addressData.zip"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center address-buttons">
            <div class="col col-lg-2">
                <button class="btn-success" @click="saveAddress" type="button">Save Address</button>
            </div>
            <div class="col col-lg-2">
                <button class="btn-danger" @click="deleteAddress" type="button">Delete Address</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            address: {}
        },
        data: function () {
            return {
                addressData: this.address
            }
        },
        methods: {
            saveAddress () {
                axios.put('/api/address/' + this.address.id, {
                    country: this.addressData.country,
                    state: this.addressData.state,
                    city: this.addressData.city,
                    street: this.addressData.street,
                    zip: this.addressData.zip,
                })
                    .then(response => {
                        this.$emit('updatedAddress')
                    })
                    .catch(error => {
                        console.log('updating address data error')
                    });
            },
            deleteAddress () {
                console.log('here wew area')
                axios.delete('/api/address/' + this.address.id)
                    .then(response => {
                        this.$emit('deletedAddress')
                    })
                    .catch(error => {
                        console.log('deleting address data error')
                    });
            }
        },
        mounted() {
        }
    }
</script>