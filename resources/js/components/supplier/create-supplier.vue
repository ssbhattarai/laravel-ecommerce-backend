<style>
.form-control:focus {
  border-color: #6265e4 !important;
  box-shadow: 0 0 5px rgba(98, 101, 228, 1) !important;
}

.error-message {
  color: red;
}
</style>
<template>
  <div class="container">
    <div class="card mb-3">
      <div class="card-header bg-dark">
        <h3 class="card-title">create Supplier</h3>
      </div>
      <form @submit.prevent="submitForm">
        <div class="card-body">
          <div class="form-group">
            <label for="supplier_name">Name of Supplier</label>
            <input
              v-model="form.supplier_name"
              type="text"
              class="form-control"
              id="supplier_name"
              name="supplier_name"
              placeholder="Enter Supplier name"
            />
            <p v-if="$v.form.supplier_name.$invalid" class="error-message">This field is invalid*</p>
          </div>
          <div class="form-group">
            <label class="mr-sm-2" for="main_product">Production</label>
            <select
              class="custom-select mr-sm-2 form-control"
              id="main_product"
              v-model="form.main_product"
              name="main_product"
              multiple
            >
              <option value="Apple">Apple</option>
              <option value="Banana">Banana</option>
              <option value="Cauli">Cauli</option>
            </select>
            <p v-if="$v.form.main_product.$invalid" class="error-message">This Field is invalid*</p>
          </div>

          <div class="form-group">
            <label for="supplier_address">Address</label>
            <input
              v-model="form.supplier_address"
              type="text"
              class="form-control"
              id="supplier_address"
              name="supplier_address"
              placeholder="Enter Address "
            />
            <p v-if="$v.form.supplier_address.$invalid" class="error-message">This field is invalid*</p>
          </div>

          <div class="form-group">
            <label for="supplier_address">Phone</label>
            <input
              v-model="form.supplier_phone"
              type="text"
              class="form-control"
              id="supplier_phone"
              name="supplier_phone"
              placeholder="Enter Address "
            />
            <p v-if="$v.form.supplier_phone.$invalid" class="error-message">This field is invalid*</p>
          </div>
        </div>

        <div class="card-footer mb-3">
          <router-link :to="{ name: 'suppliers' }">
            <button
              type="submit"
              class="btn btn-success"
              :disabled="$v.form.supplier_name.$invalid || $v.form.supplier_address.$invalid  || $v.form.main_product.$invalid || $v.form.supplier_phone.$invalid"
              @click="supplierCreate"
            >Create</button>
          </router-link>

          <router-link :to="{ name: 'suppliers' }">
            <button type="button" class="btn btn-danger">Close</button>
          </router-link>
        </div>
      </form>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
import {
  required,
  minLength,
  between,
  integer,
  maxLength,
  alpha,
  numeric
} from "vuelidate/lib/validators/";
export default {
  data() {
    return {
      products: {},
      form: new Form({
        id: "",
        supplier_name: "",
        main_product: [],
        supplier_address: "",
        supplier_phone: ""
      }),
      submitted: false
    };
  },
  validations: {
    form: new Form({
      supplier_name: {
        required,
        minLength: minLength(6)
      },
      main_product: {
        required
      },
      supplier_address: {
        required
      },
      weight_type: {
        required
      },
      supplier_phone: {
        required,
        maxLength: maxLength(10),
        minLength: minLength(9),
        numeric
      }
    })
  },
  methods: {
    submitForm() {
      if (!this.$v.form.$invalid) {
        console.log("Form is submitted", this.form);
      } else {
        console.log("🔴invalid Form");
      }
    },
    supplierCreate() {
      console.log("🖕");
      this.$Progress.start();
      axios
        .post("api/suppliers", this.form)
        .then(response => {
          console.log("yeaaaaaaaaaa");
          this.$Progress.finish();
        })
        .catch(console.log("noooooooo"));
    }
  },
  created() {}
};
</script>
