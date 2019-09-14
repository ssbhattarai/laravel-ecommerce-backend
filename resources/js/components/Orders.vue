<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Order Table</h3>
          </div>

          <div class="card-body">
            <SortedTable :values="orders">
              <thead>
                <tr>
                  <th scope="col" style="text-align: left; width: 10rem; color:black;">
                    <SortLink name="id" style="color:black;">ID</SortLink>
                  </th>
                  <th scope="col" style="text-align: left; width: 10rem; color:black;">
                    <SortLink name="billing_email" style="color:black;">Billing Email</SortLink>
                  </th>
                  <th scope="col" style="text-align: left; width: 10rem; color:black;">
                    <SortLink name="billing_name" style="color:black;">Billing Name</SortLink>
                  </th>
                  <th scope="col" style="text-align: left; width: 10rem; color:black;">
                    <SortLink name="billing_city" style="color:black;">Billing City</SortLink>
                  </th>
                  <th scope="col" style="text-align: left; width: 10rem; color:black;">
                    <SortLink name="billing_province" style="color:black;">Billing Province</SortLink>
                  </th>
                  <th scope="col" style="text-align: left; width: 10rem; color:black;">
                    <SortLink name="billing_phone" style="color:black;">Billing Phone</SortLink>
                  </th>
                </tr>
              </thead>
              <tbody slot="body" slot-scope="sort">
                <!-- remaing to add the sort in loop as sort:orders -->
                <tr v-for="value in orders" :key="value.id">
                  <td>{{ value.id }}</td>
                  <td>{{ value.billing_email }}</td>
                  <td>{{ value.billing_name }}</td>
                  <td>{{ value.billing_city }}</td>
                  <td>{{ value.billing_province }}</td>
                  <td>{{ value.billing_phone }}</td>
                </tr>
              </tbody>
            </SortedTable>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      orders: []
    };
  },
  created() {
    axios.get("api/orders").then(response => {
      this.orders = response.data;
    });
  }
};
</script>
