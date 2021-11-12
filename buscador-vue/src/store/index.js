import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

////import { forEach } from 'core-js/core/array'
//import { forEach } from 'core-js/core/array'

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
    fotosviviendaseleccionada:[],
    descripcionviviendaseleccionada:"",
    camposactivos:true,
    totalpropiedades:0,
    currentpagina:50,
    provinciaseleccionada:0,
    showmas:true,
    filtros:[
      {"name":"ciudad","payload":null},
      {"name":"tipovivienda","payload":null},
      {"name":"preciodesde","payload":null},
      {"name":"preciohasta","payload":null},
      {"name":"habitaciones","payload":null},
      {"name":"superminima","payload":null},
      {"name":"supermaxima","payload":null}
    ]
  },
  mutations: {
    FILTROS: (state, payload) => (state.viviendas = payload),
    LOAD_DESTACADAS: (state, payload) => (state.viviendas = payload),
    LOAD_PROVINCIAS: (state, payload) => (state.provincias = payload),
    LOAD_CIUDADES: (state, payload) => {
      state.ciudades = payload
      state.camposactivos = false
    },
    LOAD_OFERTAS: (state, payload) => {
    

      state.viviendas = payload.viviendas
      state.viviendastotal = payload.viviendas
      state.totalpropiedades = payload.datos.total
      console.log(state.totalpropiedades)
      console.log(state.viviendastotal)
      
      if(window.vienedelahome == true)
      {
        state.viviendas = state.viviendas.filter((item)=>{
            return item.key_tipo == window.vienepayload.tipo
        })
        window.vienedelahome = false
      }

    },


    SELECCIONA_VIVIENDA: (state, payload) => {
      state.viviendaseleccionada = payload
      // state.ficha = true
      // state.buscador = false
    },

    FOTOS_VIVIENDA_SELECCIONADA: (state, payload) => {
      state.fotosviviendaseleccionada = payload

    },


    DESCRIPCION_VIVIENDA_SELECCIONADA: (state, payload) => {
      state.descripcionviviendaseleccionada = payload
      console.log(payload)
    },
    


    CIERRA_FICHA: (state) => {
      
      state.ficha = false
      state.buscador = true
      

    },


    LOAD_MORE_OFERTAS: (state, payload) => {
          
          
          state.viviendastotal = state.viviendastotal.concat(payload.viviendas)
          state.viviendas = state.viviendastotal
          console.log(state.viviendastotal.length)
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





      seleccionavivienda ({commit},param) {

        // let vivienda = this.state.viviendastotal.filter((item)=>{
        //   return item.cod_ofer == param
        // })


        axios.get('https://www.kellerwilliamsroyal.es/api-cliente/cliente/index.php?parameter=ficha&ficha='+param)
        .then(response => {
          
          commit('SELECCIONA_VIVIENDA',response.data.ficha[1])
          commit('FOTOS_VIVIENDA_SELECCIONADA',response.data.fotos[response.data.ficha[1].cod_ofer])
          commit('DESCRIPCION_VIVIENDA_SELECCIONADA',response.data.descripciones[response.data.ficha[1].cod_ofer][1].descrip)
          
        })



        
      },

      
      
      cierraVivienda ({commit}) {
        commit('CIERRA_FICHA')
      },


      
      async cargamaspromos ({commit}) {
        let desde = this.state.currentpagina
        let tope = Number(desde)+50
        if(tope > Number(this.state.totalpropiedades))
        {
            tope = this.state.totalpropiedades;
            this.state.showmas = false
        }
        axios.get('https://www.kellerwilliamsroyal.es/api-cliente/cliente/index.php?parameter=destacadosprovincias&provincia='+this.state.provinciaseleccionada+'&inicio='+desde+'&fin='+tope)
        .then(response => {
          let destacados = response.data
          let viviendas = destacados.paginacion.filter((item,index) => { return index > 0})
          let payload = {
            viviendas:viviendas,
            datos:destacados.paginacion[0]
          }

            commit('LOAD_MORE_OFERTAS',payload)
        })
      },


      async dameOfertasProvincia ({commit},param) {
        this.state.provinciaseleccionada = param
        axios.get('https://www.kellerwilliamsroyal.es/api-cliente/cliente/index.php?parameter=destacadosprovincias&provincia='+param+'&incio=1&fin=50')
        .then(response => {
          let destacados = response.data
          let viviendas = destacados.paginacion.filter((item,index) => { return index > 0})
          let payload = {
            viviendas:viviendas,
            datos:destacados.paginacion[0]
          }
            commit('LOAD_OFERTAS',payload)
        })
      },



      filtros({commit},param)
      {
        let newpromos = [...this.state.viviendastotal];
        this.state.filtros.forEach((item)=>{
            if(item.name == param.filtro)
            {
                item.payload = param.payload
            }
        })

        let todoslosfiltros = this.state.filtros;
        todoslosfiltros.forEach((item)=>{
          if(item.payload != null)
          {
              if(item.name == "ciudad")
              {
                  console.log("FILTRO CIUDAD")
                  console.log(item)
                  newpromos = newpromos.filter((itemciudad)=>{
                    return itemciudad.key_loca == item.payload
                  })
              }

   

              if(item.name == "tipovivienda")
              {
                console.log("FILTRO TIPO")
                console.log(item)
                  newpromos = newpromos.filter((itemtipos)=>{
                    //return item.
                    //console.log(item.key_loca)
                    return itemtipos.key_tipo == item.payload
                  })
              }


              if(item.name == "preciodesde")
              {
                console.log("FILTRO PRECIO DESDE")
                console.log(item)
                  newpromos = newpromos.filter((itemtipos)=>{
                    //return item.
                    //console.log(item.key_loca)
                    return itemtipos.precioreal > item.payload
                  })
              }



              if(item.name == "preciohasta")
              {
                console.log("FILTRO HASTA")
                console.log(item)
                  newpromos = newpromos.filter((itemtipos)=>{
                    //return item.
                    //console.log(item.key_loca)
                    return itemtipos.precioreal < item.payload
                  })
              }


              if(item.name == "habitaciones")
              {
                console.log("FILTRO HABI")
                console.log(item)
                  newpromos = newpromos.filter((itemtipos)=>{
                    //return item.
                    //console.log(item.key_loca)
                    return itemtipos.habitaciones == item.payload
                  })
              }


              if(item.name == "superminima")
              {
                console.log("FILTRO SUP MIN")
                console.log(item)
                  newpromos = newpromos.filter((itemtipos)=>{
                    //return item.
                    //console.log(item.key_loca)
                    return itemtipos.m_cons > item.payload
                  })
              }



              if(item.name == "supermaxima")
              {

                console.log("FILTRO SUP MAX")
                console.log(item)
                  newpromos = newpromos.filter((itemtipos)=>{
                    //return item.
                    //console.log(item.key_loca)
                    return itemtipos.m_cons < item.payload
                  })
              }  
          
          }
        })

        console.log(newpromos)

        commit('FILTROS',newpromos)
      },

      eliminarFiltros()
      {
        this.state.filtros.forEach((item)=>{
          item.payload = null
        })
        this.state.viviendas = this.state.viviendastotal;
      },




 
    },
  modules: {
  }
})
