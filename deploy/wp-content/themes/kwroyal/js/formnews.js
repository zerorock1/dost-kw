class Formnews{
    constructor()
    {
        //alert("form");
        this.setup();
    }

    setup()
    {

   
        $('#error-msg').hide();

        $('#bt-send-email-news').click(function(event){
            event.preventDefault();
            _NEWSFORM.enviarform();
        });
    }

    enviarform()
    {

       


        var obtosend = {};
        obtosend.email = $('#email-news').val();

        
     

        if(obtosend.email == '')
        {
            this.error('Tienes que rellenar el email.');
        }

        else{
            $('#form-newsletter').submit();
        }
    }

    error(msg)
    {
        //$('#msg-error').html(msg);
        //$('#error-msg').show();

        Swal.fire({
            title: 'Error!',
            text: msg,
            icon: 'error',
            confirmButtonText: 'Cool'
          })
    }
}