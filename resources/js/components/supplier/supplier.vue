<template>
  <b-container>
    <!-- User Interface controls -->
    <b-row>
      <b-col lg="5" class="my-1">
        <b-form-group
          label="Filter"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="filterInput"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              v-model="filter"
              type="search"
              id="filterInput"
              placeholder="Type to Search"
            ></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <!-- <b-col lg="4" class="my-1">
          <b-form-group
            label="Filter On"
            label-cols-sm="3"
            label-align-sm="right"
            label-size="sm"
            description="Leave all unchecked to filter on all data"
            class="mb-0"
          >
            <b-form-checkbox-group v-model="filterOn" class="mt-1">
              <b-form-checkbox value="name">Name</b-form-checkbox>
              <b-form-checkbox value="age">Age</b-form-checkbox>
              <b-form-checkbox value="isActive">Active</b-form-checkbox>
            </b-form-checkbox-group>
          </b-form-group>
      </b-col>-->

      <b-col sm="2" md="2" class="my-1">
        <b-form-group
          label="Per page"
          id="per_page"
          label-cols-sm="6"
          label-cols-md="4"
          label-cols-lg="3"
          label-align-sm="right"
          label-size="sm"
          label-for="perPageSelect"
          class="mb-0"
        >
          <b-form-select v-model="perPage" id="perPageSelect" size="sm" :options="pageOptions"></b-form-select>
        </b-form-group>
      </b-col>
      <b-col sm="2" md="2" class="my-1">
        <div style="text-align: end;
    margin-right: 161px;">
          <router-link to="/create-supplier">
            <b-button variant="success" style>Create new</b-button>
          </router-link>
        </div>
      </b-col>
    </b-row>

    <!-- Main table element -->
    <b-table
      show-empty
      small
      stacked="md"
      :items="suppliers"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filterIncludedFields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      @filtered="onFiltered"
      class="bordered"
    >
      <template v-slot:cell(name)="row">{{ row.value.first }} {{ row.value.last }}</template>
      <b-button variant="success">Button</b-button>

      <template v-slot:cell(actions)="row">
        <!-- <b-button variant="success">Edit</b-button> -->
       <!-- <router-link v-bind:to="{name: 'u-supplier', params: {id: products.id }}" > -->
          <b-button variant="success">Edit</b-button>
        <!-- </router-link>                          -->
        <a href="#" >
          <b-button variant="danger">Delete</b-button>
        </a>
      </template>
    </b-table>

    <!-- Info modal -->

    <b-col sm="7" md="6" class="my-1">
      <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" class="mt-4">
        <template v-slot:first-text>
          <span class="text-success">First</span>
        </template>
        <template v-slot:prev-text>
          <span class="text-danger">Prev</span>
        </template>
        <template v-slot:next-text>
          <span class="text-warning">Next</span>
        </template>
        <template v-slot:last-text>
          <span class="text-info">Last</span>
        </template>
        <template v-slot:ellipsis-text>
          <b-spinner small type="grow"></b-spinner>
          <b-spinner small type="grow"></b-spinner>
          <b-spinner small type="grow"></b-spinner>
        </template>
        <template v-slot:page="{ page, active }">
          <b v-if="active">{{ page }}</b>
          <i v-else>{{ page }}</i>
        </template>
      </b-pagination>
    </b-col>
  </b-container>
</template>

<script>
import {
  PaginationPlugin,
  LayoutPlugin,
  TablePlugin,
  FormPlugin,
  FormSelectPlugin,
  ButtonPlugin,
  ModalPlugin,
  FormGroupPlugin,
  FormCheckboxPlugin,
  InputGroupPlugin,
  FormInputPlugin
} from "bootstrap-vue";
Vue.use(TablePlugin);
Vue.use(PaginationPlugin);
Vue.use(LayoutPlugin);
Vue.use(FormSelectPlugin);
Vue.use(ButtonPlugin);
Vue.use(ModalPlugin);
Vue.use(FormPlugin);
Vue.use(FormGroupPlugin, FormCheckboxPlugin);
Vue.use(FormCheckboxPlugin);
Vue.use(InputGroupPlugin);
Vue.use(FormInputPlugin);

export default {
  data() {
    return {
      suppliers: [],

      form: new Form({
        id: "",
        supplier_name: "",
        supplier_address: "",
        supplier_phone: "",
        main_product: []
      }),

      fields: [
        {
          key: "id",
          label: "SN",
          sortable: true,
          sortDirection: "desc"
        },
        {
          key: "supplier_name",
          label: "Supplier Full name",
          sortable: true,
          sortDirection: "desc"
        },
        {
          key: "supplier_address",
          label: "Address",
          sortable: true,
          class: "text-center"
        },
        {
          key: "main_product",
          label: "Production",
          sortable: true,
          class: "text-center"
        },
        {
          key: "supplier_phone",
          label: "Phone Number",
          sortable: true,
          class: "text-center"
        },
        { key: "actions", 
        label: "Actions" }
      ],
      totalRows: 1,
      currentPage: 1,
      perPage: 5,
      pageOptions: [5, 20, 50, 100],
      sortBy: "",
      sortDesc: false,
      sortDirection: "asc",
      filter: null,
      filterOn: [],
      // id: this.suppliers.id
    };
  },
  computed: {
    sortOptions() {
      // Create an options list from our fields
      return this.fields
        .filter(f => f.sortable)
        .map(f => {
          return { text: f.label, value: f.key };
        });
    }
  },

  mounted() {
    this.loadSuppliers();
    // console.log(this.fields.key);
    // Set the initial number of items
    // console.log(this.products.id);
    // console.log('hyyyy');
    Fire.$on("afterCreated", () => {
      this.loadSuppliers();
    });
    // console.log(this.totalRows);
  },
  methods: {
    loadId() {
      var i;
      for (i = 0; i < this.suppliers.length; i++) {
        // let id = this.supplierr[i].id;
        // console.log(id);
        return this.suppliers[i].id;
      }
      // var id = this.form.id;
      // console.log(id);
    },
    loadSuppliers() {
      axios.get("api/suppliers").then(({ data }) => {
        this.suppliers = data;
        this.totalRows = this.suppliers.length;
        this.test = "aaaaa";
      });
    },
    info(item, index, button) {
      this.infoModal.title = `Row index: ${index}`;
      this.infoModal.content = JSON.stringify(item, null, 2);
      this.$root.$emit("bv::show::modal", this.infoModal.id, button);
    },
    resetInfoModal() {
      this.infoModal.title = "";
      this.infoModal.content = "";
    },
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
    deleteSupplier(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        //send the request to the server
        if (result.value) {
          this.form
            .delete("api/suppliers/" + id)
            .then(result => {
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
              Fire.$emit("afterCreated");
            })
            .catch(() => {
              Swal.fire({
                type: "error",
                title: "Oops...",
                text: "Something went wrong!"
              });
            });
        }
      });
    }
  }
};
</script>