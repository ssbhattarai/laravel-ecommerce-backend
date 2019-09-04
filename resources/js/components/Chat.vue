<template>
  <div id="app">
    <label for="fname">Name*</label>
    <input id="fname" class="full" v-model="$v.name.$model" type="text">
  </div>
</template>

<script>
import { required, minLength } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      name: ""
    };
  },
  validations: {
    name: {
      required
    }
  }
};
</script>

<style>
/* #app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
} */

.error {
  color: red;
}
</style>