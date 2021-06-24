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
    <hr>
    <ComTabla v-bind:listadoDeProducto="listaDeProductos" v-bind:cargando="cargandoLista"></ComTabla>
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
import ComTabla from "@/components/ComTabla";
export default {
  name: 'App',
  mounted() { // cuando la aplicacion esta creada pero no montada (no dibujada)
      this.cargandoLista=true;
      axios.get('http://localhost:63342/junio24vue/web/servicio.php?op=listar')
    .then( resultado=>{
      this.listaDeProductos=resultado.data;
      this.cargandoLista=false;
    });
  },
  methods: {
    eventoApp() {
      // click en el boton, se llama a este evento.
      this.cargando=true;
      this.clasegif='visible';
      axios
      .post('http://localhost:63342/junio24vue/web/servicio.php?op=insertar',this.producto)
      .then(respuesta => { // si la operacion es correcta
        console.log(respuesta);
        this.listaDeProductos.push(this.producto);
      })
      .catch(()=>{  // si la operacion falla
        console.log("error");
        //console.log(respuesta);
      })
      .finally(()=>{
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
      cargandoLista:false,
      cargando:false,
      clasegif:'invisible',
      listaDeProductos:[]
    }
  },
  components: {
    ComTabla,
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
