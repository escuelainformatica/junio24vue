<template>
  <div>
    <!-- v-on:click  o tambien @click -->
    <!-- v-bind:valor="aaa"  o tambien :valor="aaa" -->
    <button @click="clickBotonMetodo" >Agregar cliente</button>
  </div>
</template>

<script>
export default {
  name: "ComBoton",
  methods:{
    clickBotonMetodo() {
      this.$emit('clickDesdeHijo','');
    }
  }
}
</script>

<style scoped>

</style>