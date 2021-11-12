<template>
  <div>
      <!-- <div v-if="ficha">
        <Ficha />
      </div> -->

      <div v-if="buscador">
          <Buscador />
          <Resultado /> 
      </div>
  </div>
</template>

<script>
import Buscador from './components/Buscador.vue'
import Resultado from './components/Resultado.vue'
//import Ficha from './components/Ficha.vue'

export default {
  name: 'App',
  components: {
    Buscador,
    Resultado,
    //Ficha
  },
    computed: {
    buscador() 
    {
        return this.$store.state.buscador
    },
    ficha() 
    {
      
        return this.$store.state.ficha
    }
  },
  mounted() {
    this.$store.dispatch("fetchDestacadas","paginacion");
  },
}
</script>