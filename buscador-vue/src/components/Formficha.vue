<template>
  <div class="col-md-4" style="padding-top: 30px">
    <form action="/buscador-de-viviendas" method="post" ref="formtosend" @submit.prevent="enviaform" class="modulo-contacta-rojo">
      <div class="container">
        <p class="contactanos">
          Contáctanos<br /><br />
          <span><i class="fas fa-phone"></i> 944 145 160</span>
        </p>
        <br />
      

        <div style="border:1px solid white;padding:10px" v-if="visible"><strong>Error!!!</strong><br>{{errormsg}}</div>

        <input type="text" required placeholder="Nombre y apellido" name="nombre" id="nombre" v-model="nombre" />
        <input type="text" required placeholder="Teléfono" name="telefono" id="telefono" v-model="telefono" />
        <input type="email" required placeholder="Email" name="email" id="email" v-model="email" />
        <input
          type="hidden"
          placeholder="idpromocion"
          :value="viviendaseleccionada.cod_ofer"
          name="idpromocion"
          id="idpromocion"
        />

  

        <div class="sele">
          <div class="check">
            <input type="checkbox" v-model="check" />
          </div>
          <div>
            Al pulsar el botón “ENVIAR” usted confirma que ha leído, entiende y
            acepta las condiciones de la Política de Privacidad expuestas y
            enlazadas situadas en este ENLACE
          </div>
        </div>

        <input type="submit" value="Enviar" class="hvr-fadet" />
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "Formficha",
  data() {
    return {
      nombre: "",
      telefono: "",
      email: "",
      check: false,
      errormsg:'',
      visible:false
    };
  },
  computed: {
    viviendaseleccionada() {
      return this.$store.state.viviendaseleccionada;
    },
  },
  methods: {
    enviaform() {
        //alert('envioformulario')
        if(this.nombre == '')
        {
            this.errormsg = "Tienes que rellenar el nombre"
            this.visible = true
            return false
        }
        else if(this.telefono == ''){
            this.errormsg = "Tienes que rellenar el teléfono"
            this.visible = true
            return false
        }
        else if(this.email == ''){
            this.errormsg = "Tienes que rellenar el email"
            this.visible = true
            return false
        }
        else if(this.check == false){
            this.errormsg = "Tienes que aceptar las bases legales"
            this.visible = true
            return false
        }
        else{
           this.$refs.formtosend.submit()
        }
        
    },
    
  },
};
</script>
