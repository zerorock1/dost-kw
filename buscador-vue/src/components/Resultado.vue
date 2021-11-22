<template>
    <section class="listado-viviendas">
        <div class="container">
            <div class="row">
                <div class="col-md-6 modulo" v-for="(vivienda, index) in viviendas" :key="index">
                    <div class="img">
                        
                        <a href="#" @click.prevent="seleccionaVivienda(vivienda)">
                        <img :src="vivienda.foto != undefined ? vivienda.foto : 'https://www.kellerwilliamsroyal.es/wp-content/themes/kwroyal/img/nofoto.jpg'" alt="">
                        </a>
                    </div>
                    <a href="">
                    <p class="venta"> 
                        <span v-if="vivienda.precioinmo > 0">
                            <money-format :value="vivienda.precioinmo" locale='es' currency-code='EUR' />
                        </span>
                        <span v-if="vivienda.precioinmo <= 0">
                            Precio a Consultar
                        </span>
                         
                    </p>
                    <p class="poblacion">
                    <span>{{vivienda.ciudad}}</span><br>
                    {{vivienda.nbtipo}}</p>
                    <p class="datos">
                    <span>Habitaciones:</span> {{vivienda.total_hab}}<br>
                    <span>Superficie:</span> {{vivienda.m_cons}} m2<br>
                    <span>Baños:</span> {{vivienda.banyos}}<br>
                    <span>Ref:</span> {{vivienda.ref}}
                    </p>
                    <p class="descrip">{{vivienda.nbconservacion}}</p>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p class="showmas"><a href="#" @click.prevent="cargamas" v-if="showmas">CARGAR MÁS</a></p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

import MoneyFormat from 'vue-money-format'


export default {
    
  name: 'Resultado',
  components:{
    'money-format': MoneyFormat
  },
  computed: {
    viviendas() 
    {
        
        let viviendas = [];
        viviendas = this.$store.state.viviendas;
        return viviendas
    },
    showmas()
    {
        return this.$store.state.showmas;
    }
  },

  methods:
  {
      seleccionaVivienda(item)
      {

          this.$router.push('ficha/'+item.cod_ofer)
      },
      cargamas()
      {
          this.$store.dispatch("eliminarFiltros");
          this.$store.dispatch("cargamaspromos");
      }
  }
}
</script>

<style scoped>
    .img{        
        height: 320px;
        background-color: #f3f3f3;
    }

    p.showmas
    {
        text-align: center;
        margin-top: 30px;
    }


    p.showmas a
    {
        text-align: center;
        border:1px solid #C10000;;
        text-decoration: none;
        color: #C10000;
        padding: 10px;

        padding-left: 20px;
        padding-right: 20px;
    }
</style>

