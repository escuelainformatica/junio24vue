<template>
  <div>
    {{ etiqueta }}
    <!--
    1) agregar propiedad con el nombre value (es necesario ese nombre).
    1.1) la propiedad value la usa v-model
    2) usar la propiedad donde corresponde
    3) v-on:input (o tambien @input) que es un evento que se llama cada vez que se ingresa un valor
    4) la funcion del v-on:input llama al objeto padre (utilizando $emit)
    -->
    <input type="text" name="abc123" v-model="value" @input="updateValue($event.target.value)" /><br/>

  </div>
</template>

<script>
export default {
  name: "ComTexto"
  ,props:["etiquetaProp","value"],
  methods:{
    updateValue(value) {
      this.$emit('input', value); // estoy indicando al padre, que el objeto cambio y se ingreso.
    }
  }
}
</script>

<style scoped>

</style>