<template>
  <div class="container">
    <h3 style="text-align:center;">Order Information</h3>
    <ejs-grid
      ref="grid"
      id="Grid"
      :dataSource="orders"
      :allowPaging="true"
      :allowSorting="true"
      :allowFiltering="true"
      :allowGrouping="false"
      :pageSettings="pageSettings"
      :allowPdfExport="true"
      :toolbarClick="toolbarClick"
      :toolbar="toolbarOptions"
      :allowExcelExport="true"
    >
      <e-columns>
        <e-column field="id" headerText="ID" textAlign="Center" width="15" style="width:auto;"></e-column>
        <e-column field="billing_email" headerText="Billing Email" width="25"></e-column>
        <e-column field="billing_name" headerText="Billing Name" width="25"></e-column>
        <e-column field="billing_phone" headerText="Phone" width="25"></e-column>
        <e-column field="billing_city" headerText="Billing City" width="25"></e-column>
      </e-columns>
    </ejs-grid>
  </div>
</template>
<script>
import {
  Page,
  Sort,
  Filter,
  Group,
  Toolbar,
  PdfExport,
  ExcelExport
} from "@syncfusion/ej2-vue-grids";

export default {
  data() {
    return {
      orders: {},
      toolbarOptions: ["ExcelExport"],
      pageSettings: { pageSize:  10}
    };
  },
  created() {
    axios.get("api/orders").then(response => {
      this.orders = response.data;
      console.log(this.orders);
    });
  },
  methods: {
    toolbarClick(args) {
      // if (args.item.id === "Grid_pdfexport") {
      // 'Grid_pdfexport' -> Grid component id + _ + toolbar item name
      // let pdfExportProperties = {
      //   header: {
      //     fromTop: 0,
      //     height: 130,
      //     contents: [
      //       {
      //         type: "Text",
      //         value: "Northwind Traders",
      //         position: { x: 0, y: 50 },
      //         pageSize: "A4",
      //         style: { textBrushColor: "#FF0000", fontSize: 13 }
      //       }just fun man test p
      //     ]
      //   }
      // };
      // this.$refs.grid.pdfExport();
      if (args.item.id === "Grid_excelexport") {
        // 'Grid_excelexport' -> Grid component id + _ + toolbar item name
        let excelExportProperties = {
          theme: {
            header: { fontName: "Segoe UI", fontColor: "#666666" },
            record: { fontName: "Segoe UI", fontColor: "#666666" },
            caption: { fontName: "Segoe UI", fontColor: "#666666" }
          }
        };
        this.$refs.grid.excelExport();
      }
    }
  },
  provide: {
    grid: [Page, Sort, Filter, Group, Toolbar, PdfExport, ExcelExport]
  }
}

</script>
