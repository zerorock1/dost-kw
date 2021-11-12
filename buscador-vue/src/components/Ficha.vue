<template>
  <div>
    <section class="ficha-vivienda">
      <div class="container">

        <!-- <div class="row">
          <div class="col-md-12">
            <a href="#" @click.prevent="volver" class="volver"><i class="fas fa-arrow-left"></i></a>
          </div>
        </div> -->
        <div class="row">

          <div class="col-md-8">
            <div class="textos">
              <div class="ficha-top-izq">
                <p class="poblacion">
                  <span>{{ viviendaseleccionada.ciudad }}</span
                  ><br />
                  {{ viviendaseleccionada.nbtipo }}
                </p>
                <p class="datos">
                  <span>Habitaciones:</span>
                  {{ viviendaseleccionada.habitaciones }}<br />
                  <span>Superficie:</span>
                  {{ viviendaseleccionada.m_cons }} m2<br />
                  <span>Baños:</span> {{ viviendaseleccionada.banyos }}<br />
                  <span>Ref:</span> {{ viviendaseleccionada.ref }}
                </p>
              </div>
              <div class="ficha-top-der">
                <p class="venta">
                    <span v-if="viviendaseleccionada.precioinmo > 0">
                        <money-format :value="viviendaseleccionada.precioinmo" locale='es' currency-code='EUR' />
                    </span>
                    <span v-if="viviendaseleccionada.precioinmo <= 0">
                        Precio a Consultar
                    </span>
                </p>
              </div>
            </div>

 

            <div class="owl-carousel owl-theme">
    
          <slider animation="fade" height="420px">
            
            <slider-item
              v-for="(foto, index) in estasfotos"
              :key="index" 
              >
              <img :src="foto" />
            </slider-item>
          </slider>

           <div class="textos">
              <p class="descrip">
                <strong>Descripción</strong><br>
                {{ ladescrip }}
              </p>
            </div>

            </div>
          </div>

          <Formficha />

        </div>
      </div>
    </section>
    <br>
    <br>
  </div>
</template>

<script>

import Formficha from './Formficha.vue'
import MoneyFormat from 'vue-money-format'
import { Slider, SliderItem } from 'vue-easy-slider'


export default {
    
    name: 'Ficha',
      data() {
        return {
            fotosurl: [],
        };
  },
    computed: {
        viviendaseleccionada() 
        {
          console.log(this.$store.state.viviendaseleccionada)
            return this.$store.state.viviendaseleccionada
        },
        estasfotos()
        {
            return this.$store.state.fotosviviendaseleccionada
        },
        ladescrip()
        {
          return this.$store.state.descripcionviviendaseleccionada
          
        }
    },

    mounted(){
        this.$store.dispatch("seleccionavivienda",this.$route.params.idficha)
    },


    components: {
      Formficha,
      'money-format': MoneyFormat,
       Slider,
       SliderItem,
    },
}
</script>

<style scoped>
  a.volver{
    color:#C10000;
    font-size: 30px;
   
  }
</style>