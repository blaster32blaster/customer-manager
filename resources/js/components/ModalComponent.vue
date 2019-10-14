<template>
  <div class="modal-wrapper">
        <!-- template for the modal component -->
    <script type="text/x-template" id="modal-template">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                  default body
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  <button class="modal-default-button btn-danger" @click="$emit('close')">
                    Cancel
                  </button>
                  <button type="button" class="btn-success" @click="$emit('save')">
                    Save
                  </button>
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>

    <!-- app -->
    <div id="app">
      <button id="show-modal" class="btn-primary" @click="showModal = true">Edit User</button>
      <!-- use the modal component, pass in the prop -->
      <modal v-if="showModal" @close="showModal = false">
        <!--
          you can use custom content here to overwrite
          default content
        -->
        <h3 slot="header">{{ customer.name }}</h3>
        <div slot="body">
          <input type="text" v-model="customerData.name"/>
          <div class="customer-addresses" style="margin-top:2rem;" v-if="customer.addresses.data.length > 0">
            <h4 style="text-align: center">Addresses</h4>
            <div class="row" v-for="(address, index) in customer.addresses.data">
              <customer-address
                      :address="address"
                      @deletedAddress="updateData"
                      @updatedAddress="updateData"
              />
            </div>
          </div>
          <div class="customer-addresses" style="margin-top:2rem;" v-if="customer.emails.data.length > 0">
            <h4 style="text-align: center">Emails</h4>
            <div class="row" v-for="(email, index) in customer.emails.data">
              <customer-email
                      :email="email"
                      @deletedEmail="updateData"
                      @updatedEmail="updateData"
              />
            </div>
          </div>
        </div>
        <div slot="footer">
          <button class="modal-default-button btn-danger" @click="$emit('close')">
            Cancel
          </button>
          <button type="button" class="btn-success" @click="updateCustomer">
            Save
          </button>
        </div>
      </modal>
    </div>
  </div>
</template>
<script>
    export default {
        props: {
            customer: {
            }
        },
        data: function () {
            return {
                showModal: false,
                customerData: this.customer
            }
        },
        methods: {
            updateCustomer () {
                axios.put('/api/customer/' + this.customer.id, {
                  name: this.customerData.name
                })
                    .then(response => {
                        this.$emit('updatedData')
                        this.showModal = false
                    })
                    .catch(error => {
                        console.log('updating customer data error')
                    });
            },
            updateData () {
                this.$emit('updatedData')
                this.showModal = false
            }
        },
        mounted() {
        }
    }
</script>
<style>
  .modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
  }

  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }

  .modal-container {
    width: 1200px;
    margin: 0px auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .3s ease;
    font-family: Helvetica, Arial, sans-serif;
  }

  .modal-header h3 {
    margin-top: 0;
    color: #42b983;
  }

  .modal-body {
    margin: 20px 0;
  }

  .modal-default-button {
    float: right;
  }

  .modal-enter {
    opacity: 0;
  }

  .modal-leave-active {
    opacity: 0;
  }

  .modal-enter .modal-container,
  .modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
</style>