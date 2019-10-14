<template>
    <div class="container">
        <div v-if="customers.length > 0" class="row" v-for="(cust, index) in customers">
            <customer
                    :customer="cust"
                    :index="index"
                    @customerDeleted="refreshData"
                    @customerUpdated="refreshData"
                    @updatedData="refreshData"
                    class="customer-entry"
            />
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                customers: {}
            }
        },
        methods: {
          fetchInitData() {
              axios.get('/api/customer/')
                  .then(response => {
                      this.$emit('fetchedCustomerList')
                      this.customers = response.data.data
                  })
                  .catch(error => {
                      console.log('fetching item answers data error')
                  });
          },
          refreshData() {
              this.customers = {}
              this.fetchInitData()
          }
        },
        mounted() {
            this.fetchInitData()
        }
    }
</script>
