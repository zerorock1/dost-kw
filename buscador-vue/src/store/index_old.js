import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    viviendas:[],
    viviendastotal:[],
    provincias:[],
    ciudades:[],
    buscador:true,
    ficha:false,
    viviendaseleccionada:{},
    camposactivos:true,
    totalpropiedades:0,
    currentpagina:50,
    provinciaseleccionada:0,
    showmas:true,
    filtros:{
      ciudad:{
        activo:false,
        payload:""
      },
      tipovivienda:{
        activo:false,
        payload:""
      },
      preciohasta:{
        activo:false,
        payload:""
      },
      habitaciones:{
        activo:false,
        payload:""
      },
      superminima:{
        activo:false,
        payload:""
      },
      supermaxima:{
        activo:false,
        payload:""
      },
    }
  },
  mutations: {
    LOAD_DESTACADAS: (state, payload) => (state.viviendas = payload),
    LOAD_PROVINCIAS: (state, payload) => (state.provincias = payload),
    LOAD_CIUDADES: (state, payload) => {
      state.ciudades = payload
      state.camposactivos = false
    },
    LOAD_OFERTAS: (state, payload) => {
      state.viviendas = payload
      state.viviendastotal = payload
      state.totalpropiedades = payload[0].total
      
      
      if(window.vienedelahome == true)
      {
        console.log('paso')
        state.viviendas = state.viviendas.filter((item)=>{
            return item.key_tipo == window.vienepayload.tipo
        })
        window.vienedelahome = false
      }

    },
    FILTRO_CIUDAD: (state, payload) => (state.viviendas = payload),
    FILTRO_TIPO: (state, payload) => (state.viviendas = payload),
    FILTRO_DESDE: (state, payload) => (state.viviendas = payload),
    FILTRO_HASTA: (state, payload) => (state.viviendas = payload),
    FILTRO_HABITACIONES: (state, payload) => (state.viviendas = payload),
    FILTRO_SUPERHASTA: (state, payload) => (state.viviendas = payload),
    FILTRO_SUPERDESDE: (state, payload) => (state.viviendas = payload),

    SELECCIONA_VIVIENDA: (state, payload) => {
      state.viviendaseleccionada = payload
      state.ficha = true
      state.buscador = false
      console.log(state.viviendaseleccionada)

    },


    CIERRA_FICHA: (state) => {
      
      state.ficha = false
      state.buscador = true
      

    },


    LOAD_MORE_OFERTAS: (state, payload) => {
      
      console.table(payload)
      // state.viviendas.concat(payload.value)
      // state.viviendastotal.concat(payload.value)
      // console.log(state.viviendastotal)

      payload.forEach((element,index) => {
        
        if(index > 0)
        {
  
          //state.viviendas.push(element)
          state.viviendastotal.push(element)
        }
  
      });
      
    },


    
    

    
  },
  actions: {

      async fetchDestacadas ({commit},param) {
        axios.get('https://kellerwilliamsroyal.es/api-cliente/cliente/')
        .then(response => {
            let destacados = response.data[param]
            commit('LOAD_DESTACADAS',destacados)
        })
      },

      async dameProvincias ({commit}) {
        axios.get('https://www.kellerwilliamsroyal.es/api-cliente/cliente/index.php?parameter=provinciasofertas')
        .then(response => {
            let destacados = response.data
            commit('LOAD_PROVINCIAS',destacados)
        })
      },


      async dameCiudades ({commit},param) {
        axios.get('https://www.kellerwilliamsroyal.es/api-cliente/cliente/index.php?parameter=ciudades&provincia='+param)
        .then(response => {
            // let destacados = response.data[param]
            let destacados = response.data
            // destacados.shift()
            //console.table(destacados)
            commit('LOAD_CIUDADES',destacados)
        })
      },





      dameOfertasTipo ({commit},param) {
        console.log(commit,param)
          let newofertas = [...this.state.viviendas]
          let ofertas = newofertas.filter((item)=>{
            //console.log(param + '===='+item.key_loca)
            return item.key_tipo == param
          })
          commit('FILTRO_TIPO',ofertas)

      },



      dameOfertasDesde ({commit},param) {
        console.log(commit,param)
          let newofertas = [...this.state.viviendas]
          console.log(newofertas)
          let ofertas = newofertas.filter((item)=>{
            //console.log(param + '===='+item.key_loca)
            return item.precioreal > param
          })
          commit('FILTRO_DESDE',ofertas)

      },



      dameOfertasHasta ({commit},param) {
        console.log(commit,param)
          let newofertas = [...this.state.viviendas]
          console.log(newofertas)
          let ofertas = newofertas.filter((item)=>{
            //console.log(param + '===='+item.key_loca)
            return item.precioreal < param
          })
          commit('FILTRO_HASTA',ofertas)

      },



      dameOfertasHabitaciones ({commit},param) {
        console.log(commit,param)
          let newofertas = [...this.state.viviendas]
          console.log(newofertas)
          let ofertas = newofertas.filter((item)=>{
            //console.log(param + '===='+item.key_loca)
            return item.habitaciones == param
          })
          commit('FILTRO_HABITACIONES',ofertas)

      },


      dameOfertasSuperDesde ({commit},param) {
        console.log(commit,param)
          let newofertas = [...this.state.viviendas]
          console.log(newofertas)
          let ofertas = newofertas.filter((item)=>{
            //console.log(param + '===='+item.key_loca)
            return item.m_cons > param
          })
          commit('FILTRO_SUPERDESDE',ofertas)

      },


      dameOfertasSuperHasta ({commit},param) {
        console.log(commit,param)
          let newofertas = [...this.state.viviendas]
          console.log(newofertas)
          let ofertas = newofertas.filter((item)=>{
            //console.log(param + '===='+item.key_loca)
            return item.m_cons < param
          })
          commit('FILTRO_SUPERHASTA',ofertas)

      },


      seleccionavivienda ({commit},param) {
        commit('SELECCIONA_VIVIENDA',param)
      },

      
      
      cierraVivienda ({commit}) {
        commit('CIERRA_FICHA')
      },


      
      async cargamaspromos ({commit}) {
        let desde = this.state.currentpagina
        console.log(desde)
        let tope = Number(desde)+50;
        console.log(tope)
        if(tope > Number(this.state.totalpropiedades))
        {
            tope = this.state.totalpropiedades;
            this.state.showmas = false
        }
        axios.get('https://www.kellerwilliamsroyal.es/api-cliente/cliente/index.php?parameter=destacadosprovincias&provincia='+this.state.provinciaseleccionada+'&inicio='+desde+'&fin='+tope)
        .then(response => {
            // let destacados = response.data[param]
            let destacados = response.data
            // destacados.shift()
            
           // destacados.paginacion.shift()
           
            commit('LOAD_MORE_OFERTAS',destacados.paginacion)
        })
      },



      filtros({commit},param){

        console.log(commit)

        if(param.filtro == 'ciudad')
        {
          this.state.filtros.ciudad.activo = true;
          this.state.filtros.ciudad.payload = param.payload;

        }


        if(param.filtro == 'ciudad')
        {
          this.state.filtros.ciudad.activo = true;
          this.state.filtros.ciudad.payload = param.payload;

        }


        console.log(this.state.filtros)

        

      },

      

      async dameOfertasProvincia ({commit},param) {
        this.state.provinciaseleccionada = param
        axios.get('https://www.kellerwilliamsroyal.es/api-cliente/cliente/index.php?parameter=destacadosprovincias&provincia='+param+'&incio=1&fin=50')
        .then(response => {
            // let destacados = response.data[param]
            let destacados = response.data
            // destacados.shift()
            
           // destacados.paginacion.shift()
            commit('LOAD_OFERTAS',destacados.paginacion)
        })
      },
    },
  modules: {
  }
})
