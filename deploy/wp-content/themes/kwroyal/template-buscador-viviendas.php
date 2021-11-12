<?php
/**
 * Template Name: Buscador Viviendas
 */

get_header();
?>



<section class="modulo-home modulo-home-top top-gris">
        <div class="container-fluid">
            <div class="row">
            <div class="col">
                <a href="/">
                    <img class="logo" src="<?=get_template_directory_uri()?>/img/white-logo.svg" alt="">
                    </a>
                </div>
                <div class="col">
                    <nav>
                        <a id="hamburger-icon" href="#" title="Menu">
                            <span class="line line-1"></span>
                            <span class="line line-2"></span>
                            <span class="line line-3"></span>
                          </a>
                    </nav>
                </div>
            </div>
     
        </div>
    </section>


    <style>


.display-error
{
    width: 100%;
border: 1px solid #D8D8D8;
padding: 5px;
border-radius: 5px;
font-family: Arial;
font-size: 11px;
text-transform: uppercase;
background-color: rgb(255, 249, 242);
color: rgb(211, 0, 0);
text-align: center;
}
 

 
.display-success
{
width: 100%;
border: 1px solid #D8D8D8;
padding: 10px;
border-radius: 5px;
font-family: Arial;
font-size: 11px;
text-transform: uppercase;
background-color: rgb(236, 255, 216);
color: green;
text-align: center;
margin-top: 30px;
}
 



    </style>



    <?php



$data = $_POST;

//$to = "carlos.martinez.fdez@gmail.com";
$to = "administracion@kellerwilliamsroyal.es";
$nombre = $data["nombre"];
$email = $data["email"];
$provincia = $data["telefono"];
$oferta = $data["idpromocion"];

$acepta = $data["privacidad"];
$subject = 'INTERESADO EN LA OFERTA DE LA WEB ('.$oferta.')';
$body = 'Hola, un usuario está interesado en una promoción <strong>'.$oferta.'</strong>, sus datos son:<br>';
$body .= 'NOMBRE:'.$nombre.'<br>';
$body .= 'EMAIL:'.$email.'<br>';
$body .= 'COMENTARIO:<BR>'.$comentarios.'<br>';

if($data["nombre"])
{
      $headers = array('Content-Type: text/html; charset=UTF-8');
      $mail = wp_mail($to, $subject, $body, $headers );
      unset($_POST);
      if(!$mail)
      {
            ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                    <div class="display-error">
                                <p>Lo sentimos, ha sucedido un error por favor intentalo más tarde</p>
                            </div>
                    </div>
                </div>
            </div>

            <?php
      }
      else
      { 
          ?>
            <div class="container">
                <div class="row">
                    <div class="col">

                    <div class="display-success">
                                <p>Muchas gracias, muy pronto nos pondremos en contacto contigo.</p>
                            </div>
                    </div>
                </div>
            </div>
          <?php

      }
}


if($data["desdelahome"])
{
    ?>
    <script>
        
        var vienedelahome = true;
        var vienepayload = {
            'tipo':<?=$data["tipovivienda"]?>,
            'provincia':<?=$data["provincia"]?>,
        };

        console.log(vienepayload);

    </script>
    <?php

}
else{
    ?>
    <script>
        var vienedelahome = false;

    </script>
    <?php
}

?>

    <link href="<?=get_template_directory_uri()?>/dist/css/app.1b0379a1.css" rel="stylesheet">
    <div id="app-buscador-vue" style="min-height:100vh;"></div>    
    <script src="<?=get_template_directory_uri()?>/dist/js/chunk-vendors.a19e25a6.js"></script>
    <script src="<?=get_template_directory_uri()?>/dist/js/app.01d54430.js"></script>

    



<?php
get_footer();
