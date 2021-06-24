<template>
  <div id="app">
    <h1>insertar productos</h1>
    <ComTexto etiquetaProp="nombre" v-model="producto.nombre" /><br>
    <ComTexto etiqueta-prop="precio" v-model="producto.precio" /><br>
    <ComTexto etiqueta-prop="categoria" v-model="producto.categoria" /><br>
    <ComBoton @clickDesdeHijo="eventoApp"></ComBoton>
    <br>
    <img alt="cargando" src="./assets/wait.gif" v-bind:class="clasegif" />
    <br>
    <div v-if="cargando">
      <img alt="cargando" src="./assets/wait.gif" />
    </div>
  </div>
</template>

<!--
  v-bind
  v-model
  v-for
  v-if
-->

<script>

import axios from 'axios';

import ComTexto from "@/components/ComTexto";
import ComBoton from "@/components/ComBoton";
export default {
  name: 'App',
  methods: {
    eventoApp() {
      // click en el boton, se llama a este evento.
      this.cargando=true;
      this.clasegif='visible';
      axios
          .post('http://localhost:63342/junio22/web/servicio.php?_ijt=4sq464k5ti0ecpvo8sujs0kstp&op=insertar',this.producto)
          .then(respuesta => {
            alert('ok'+respuesta);
            this.cargando=false;
            this.clasegif='invisible';
          })

    }
  },
  data() {
    return {
      producto:{
        nombre:""
        ,precio:0
        ,categoria:""
      },
      cargando:false,
      clasegif:'invisible'
    }
  },
  components: {
    ComBoton,
    ComTexto

  }
}
</script>

<style>
  .invisible {
    display: none;
  }
  .visible {
    display: inline-block;
  }
</style>
