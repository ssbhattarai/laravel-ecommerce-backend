<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Available</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <button class="btn btn-success" @click="newModal">
              Add New
              <i class="fas fa-plus"></i>
            </button>

            <!-- <div class="input-group-append">
              <button type="submit" class="btn btn-default"></button>
            </div>-->
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Type</th>
              <th>Weight(N/KG)</th>
              <th>Created At</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.id">
              <td>{{product.id}}</td>
              <td>{{product.product_name | upText}}</td>
              <td>{{product.type| upText}}</td>
              <td>{{product.weight}}</td>
              <td>{{product.created_at | myDate}}</td>
              <td>{{product.description}}</td>
              <td>
                <a href="#" @click="editModal(product)">
                  <i class="fa fa-edit green"></i>
                </a>
              </td>
              <td>
                <a href="#" @click="deleteProducts(product.id)">
                  <i class="fa fa-trash-alt red"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <router-view></router-view>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addNewLabel">Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="createProduct">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.product_name"
                  type="text"
                  name="product_name"
                  class="form-control"
                  placeholder="Product Name"
                  :class="{ 'is-invalid': form.errors.has('product_name') }"
                />
                <has-error :form="form" field="product_name"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.type"
                  type="text"
                  name="type"
                  class="form-control"
                  placeholder="Type"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                />
                <has-error :form="form" field="type"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.weight"
                  type="text"
                  name="weight"
                  class="form-control"
                  placeholder="Weight"
                  :class="{ 'is-invalid': form.errors.has('weight') }"
                />
                <has-error :form="form" field="weight"></has-error>
              </div>
              <div class="form-group">
                <textarea
                  v-model="form.description"
                  name="description"
                  class="form-control"
                  placeholder="Description"
                  :class="{ 'is-invalid': form.errors.has('description') }"
                />
                <has-error :form="form" field="description"></has-error>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Create Product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: {},
      form: new Form({
        id: "",
        product_name: "",
        type: "",
        description: "",
        weight: ""
      })
    };
  },
  methods: {
    editModal(product) {
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(product);
    },
    newModal() {
      this.form.reset();
      $("#addNew").modal("show");
    },
    deleteProducts(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        //send the request to the server
        if (result.value) {
          this.form
            .delete("api/products/" + id)
            .then(result => {
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
              Fire.$emit("afterCreated");
            })
            .catch(() => {
              Swal.fire({
                type: "error",
                title: "Oops...",
                text: "Something went wrong!"
                // footer: "<a href>Why do I have this issue?</a>"
              });
            });
        }
      });
    },
    loadProducts() {
      axios.get("api/products").then(({ data }) => (this.products = data));
    },
    createProduct() {
      this.$Progress.start();
      this.form
        .post("api/products")
        .then(() => {
          Fire.$emit("afterCreated");
          $("#addNew").modal("hide");

          this.$Progress.finish();
          Toast.fire({
            type: "success",
            title: "Product created successfully"
          });
        })
        .catch(() => {});
    }
  },

  created() {
    // console.log("Component mounted.");
    this.loadProducts();
    Fire.$on("afterCreated", () => {
      this.loadProducts();
    });
    // setInterval(() => this.loadProducts(), 3000);
  }
};
</script>
