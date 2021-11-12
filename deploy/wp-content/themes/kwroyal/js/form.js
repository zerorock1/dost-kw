class Form{
    constructor()
    {
        //alert("form");
        this.setup();
    }

    setup()
    {

   
        $('#error-msg').hide();

        $('#bt-enviar-form').click(function(event){
            event.preventDefault();
            _FORM.enviarform();
        });
    }

    enviarform()
    {

       

        $('#error-msg').hide();

        var obtosend = {};
        obtosend.nombre = $('#nombre').val();
        obtosend.email = $('#email').val();
        obtosend.telefono = $('#telefono').val();
        obtosend.comentarios  = $('#comentarios').val();
        
     

        if(obtosend.nombre == '')
        {
            this.error('Tienes que rellenar el nombre.');
        }
        else if(obtosend.email == '')
        {
            this.error('Tienes que rellenar el email.');
        }

        else if(obtosend.telefono == '')
        {
            this.error('Tienes que rellenar el teléfono.');
        }

        else if(obtosend.comentarios == '')
        {
            this.error('Tienes que rellenar los comentarios.');
        }
        else if($('#privacidad').prop('checked') == false)
        {
            this.error('Tienes que aceptar la política de privacidad.');
        }
        else{
            $('#form-contacto').submit();
        }
    }

    error(msg)
    {
        $('#msg-error').html(msg);
        $('#error-msg').show();
    }
}