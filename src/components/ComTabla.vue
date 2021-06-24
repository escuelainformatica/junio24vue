<template>
  <div>
    <table class="table table-striped ">
        <thead>
        <tr>
          <th>nombre</th>
          <th>precio</th>
          <th>categoria</th>
        </tr>
        </thead>
      <tbody>
        <ComFila v-for="producto in listadoDeProducto"  v-bind:producto="producto" v-bind:key="producto.nombre" />
      </tbody>
    </table>
    <div v-if="cargando">
        <img alt="cargando" src="./../assets/wait.gif" />
    </div>
    <div v-if="conError">
        <div>No se pudo cargar los datos</div>
    </div>
  </div>
</template>

<script>
import ComFila from "@/components/ComFila";
export default {
  name: "ComTabla",
  data() {return {conError:false}},
  components: {ComFila},
  props:['listadoDeProducto',"cargando"]
}
</script>

<style scoped>

</style>