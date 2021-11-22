<template>
  <section class="form-buscador">
    <form action="">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <select
              class="form-select"
              @change="changeprovincia($event)"
              aria-label="Default select example"
            >
              <option>Provincia</option>
              <option value="47" selected>VIZCAYA</option>
              <!-- <option v-for="provincia in provincias" :key="provincia.codprov" :value="provincia.codprov">{{provincia.provincia}}</option> -->
            </select>
          </div>

          <div class="col-md-3">
            <select
              class="form-select"
              @change="changeciudad($event)"
              :disabled="camposactivos"
              aria-label="Default select example"
              v-model="select_ciudad"
            >
              <option value="NOP">Ciudad</option>
              <option
                v-for="ciudad in ciudades"
                :key="ciudad.cod_ciu"
                :value="ciudad.cod_ciu"
              >
                {{ ciudad.city }}
              </option>
            </select>
          </div>

          <div class="col-md-3">
            <select
              class="form-select"
              :disabled="camposactivos"
              @change="changetipovivienda($event)"
              aria-label="Default select example"
              v-model="select_tipo"
            >
              <option value="NOP">Tipo de Vivienda</option>
              <option value="3399">Piso</option>
              <option value="199">Adosada</option>
              <option value="399">Casa</option>
              <option value="7599">Casa con terreno</option>
              <option value="2399">Garaje</option>
              <option value="1299">Local comercial</option>
              <option value="5099">Parcela</option>
            </select>
          </div>

          <div class="col-md-3"></div>

          <div class="col-md-3">
            <select
              class="form-select"
              :disabled="camposactivos"
              @change="changepreciodesde($event)"
              aria-label="Default select example"
              v-model="select_predesde"
            >
              <option value="NOP">Precio desde</option>
              <option value="1">1€</option>
              <option value="10000">10.000€</option>
              <option value="20000">20.000€</option>
              <option value="30000">30.000€</option>
              <option value="40000">40.000€</option>
              <option value="50000">50.000€</option>
              <option value="100000">100.000€</option>
              <option value="200000">200.000€</option>
              <option value="300000">300.000€</option>
              <option value="400000">400.000€</option>
              <option value="500000">500.000€</option>
              <option value="600000">600.000€</option>
              <option value="700000">700.000€</option>
              <option value="800000">800.000€</option>
              <option value="900000">900.000€</option>
            </select>
          </div>

          <div class="col-md-3">
            <select
              class="form-select"
              :disabled="camposactivos"
              @change="changepreciohasta($event)"
              aria-label="Default select example"
              v-model="select_prehasta"
            >
              <option value="NOP">Precio hasta</option>
              <option value="10000">10.000€</option>
              <option value="20000">20.000€</option>
              <option value="30000">30.000€</option>
              <option value="40000">40.000€</option>
              <option value="50000">50.000€</option>
              <option value="100000">100.000€</option>
              <option value="200000">200.000€</option>
              <option value="300000">300.000€</option>
              <option value="400000">400.000€</option>
              <option value="500000">500.000€</option>
              <option value="600000">600.000€</option>
              <option value="700000">700.000€</option>
              <option value="800000">800.000€</option>
              <option value="900000">900.000€</option>
            </select>
          </div>

          <div class="col-md-3">
            <select
              class="form-select"
              :disabled="camposactivos"
              @change="changepreciohabitaciones"
              aria-label="Default select example"
              v-model="select_habi"
            >
              <option value="NOP">Habitaciones</option>
              <option value="1">1 Habitación</option>
              <option value="2">2 Habitaciónes</option>
              <option value="3">3 Habitaciónes</option>
              <option value="4">4 Habitaciónes</option>
              <option value="5">5 Habitaciónes</option>
            </select>
          </div>

          <div class="col-md-3"></div>

          <div class="col-md-3">
            <select
              class="form-select"
              :disabled="camposactivos"
              @change="changesuperdesde"
              aria-label="Default select example"
              v-model="select_superdesde"
            >
              <option value="NOP">Superficie Mínima</option>
              <option value="10">10 m2</option>
              <option value="20">20 m2</option>
              <option value="30">30 m2</option>
              <option value="40">40 m2</option>
              <option value="50">50 m2</option>
              <option value="60">60 m2</option>
              <option value="70">70 m2</option>
              <option value="80">80 m2</option>
              <option value="90">90 m2</option>
              <option value="100">100 m2</option>
              <option value="110">110 m2</option>
              <option value="120">120 m2</option>
              <option value="130">130 m2</option>
              <option value="140">140 m2</option>
              <option value="150">150 m2</option>
              <option value="160">160 m2</option>
              <option value="180">180 m2</option>
              <option value="190">190 m2</option>
              <option value="200">200 m2</option>
            </select>
          </div>

          <div class="col-md-3">
            <select
              class="form-select"
              :disabled="camposactivos"
              @change="changesuperhasta"
              aria-label="Default select example"
              v-model="select_superhasta"
            >
              <option value="NOP">Superficie Máxima</option>
              <option value="10">10 m2</option>
              <option value="20">20 m2</option>
              <option value="30">30 m2</option>
              <option value="40">40 m2</option>
              <option value="50">50 m2</option>
              <option value="60">60 m2</option>
              <option value="70">70 m2</option>
              <option value="80">80 m2</option>
              <option value="90">90 m2</option>
              <option value="100">100 m2</option>
              <option value="110">110 m2</option>
              <option value="120">120 m2</option>
              <option value="130">130 m2</option>
              <option value="140">140 m2</option>
              <option value="150">150 m2</option>
              <option value="160">160 m2</option>
              <option value="180">180 m2</option>
              <option value="190">190 m2</option>
              <option value="200">200 m2</option>
            </select>
          </div>

          <div class="col-md-3" v-if="!camposactivos">
            <br />
            <label for=""></label>
            <button class="btn btn-success" @click.prevent="quitarfiltros()" style="background-color:#C10000;border-color:#C10000;">
              <i class="fa fa-times" aria-hidden="true"></i> Quitar Filtros
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="total">{{ total }}</p>
          </div>
        </div>
      </div>
    </form>
  </section>
</template>

<script>
export default {
  name: "Buscador",
  data() {
    return {
      select_ciudad: "NOP",
      select_tipo: "NOP",
      select_predesde: "NOP",
      select_prehasta: "NOP",
      select_habi: "NOP",
      select_superdesde: "NOP",
      select_superhasta: "NOP",
    };
  },
  computed: {
    provincias() {
      return this.$store.state.provincias;
    },
    ciudades() {
      return this.$store.state.ciudades;
    },
    total() {
      let viviendas = this.$store.state.viviendas;
      let result = "No hay resultados";
      if (viviendas != null) {
        if (viviendas.length <= 0) {
          result = "No hay resultados";
        } else {
          result = "Mostrando " + viviendas.length;
        }
      }
      return result;
    },
    camposactivos() {
      return this.$store.state.camposactivos;
    },
  },
  mounted() {
    //this.$store.dispatch("dameProvincias");
    //this.$store.dispatch("dameProvincias");
    this.cargadefaultciudades();
  },
  methods: {
    cargadefaultciudades() {
      this.$store.dispatch("dameOfertasProvincia", 47);
      this.$store.dispatch("dameCiudades", 47);
    },
    changeprovincia(event) {
      this.$store.dispatch("dameOfertasProvincia", event.target.value);
      this.$store.dispatch("dameCiudades", event.target.value);
    },

    changeciudad(event) {


      this.$store.dispatch("filtros", {
        filtro: "ciudad",
        payload: event.target.value,
      });
    },

    changetipovivienda(event) {
      this.$store.dispatch("filtros", {
        filtro: "tipovivienda",
        payload: event.target.value,
      });
    },

    changepreciodesde(event) {
      this.$store.dispatch("filtros", {
        filtro: "preciodesde",
        payload: event.target.value,
      });
    },

    changepreciohasta(event) {

      this.$store.dispatch("filtros", {
        filtro: "preciohasta",
        payload: event.target.value,
      });
    },

    changepreciohabitaciones(event) {
      this.$store.dispatch("filtros", {
        filtro: "habitaciones",
        payload: event.target.value,
      });
    },

    changesuperdesde(event) {
      this.$store.dispatch("filtros", {
        filtro: "superminima",
        payload: event.target.value,
      });
    },

    changesuperhasta(event) {
      this.$store.dispatch("filtros", {
        filtro: "supermaxima",
        payload: event.target.value,
      });
    },

    quitarfiltros() {
      //location.reload()
      this.select_ciudad = "NOP";
      this.select_tipo = "NOP";
      this.select_predesde = "NOP";
      this.select_prehasta = "NOP";
      this.select_habi = "NOP";
      this.select_superdesde = "NOP";
      this.select_superhasta = "NOP";
      this.$store.dispatch("eliminarFiltros");
    },
  },
};
</script>

