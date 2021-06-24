<template>
  <tr>
    <td>{{producto.nombre}}</td>
    <td>{{producto.precio}}</td>
    <td>{{producto.categoria}}</td>
  </tr>
</template>

<script>
export default {
  name: "ComFila",
  props:['producto']
}
</script>

<style scoped>

</style>