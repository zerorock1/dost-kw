<?php
/**
 * Template Name: Contacto
 */

get_header();
?>



<section class="modulo-home modulo-home-top modulo-contacto" class="parallax-window" data-parallax="scroll" data-image-src="<?=get_template_directory_uri()?>/img/bg-contacto.jpg">
        <div class="container-fluid">
            <div class="row">
            <div class="col">
                <a href="/">
                    <img class="logo" src="<?=get_template_directory_uri()?>/img/white-logo.svg" alt="">
                    </a>
                </div>
                <div class="col">
                    
                

                    <?php
                    wp_nav_menu( array( 
                        'theme_location' => 'menu-5', 
                        'container_class' => 'second-menu' ) ); 
                    ?>
                    
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
            <div class="row">
            <div class="col">
                <h1>El primer paso de<br>
                    tu nueva vida</h1>
            </div>
            </div>
        </div>
    </section>


    





<form method="post" action="/contacto" id="form-contacto">
    <section class="modulo-home modulo-contacto">
        <div class="container">
            <div class="row">
               
                <div class="col-md-4">
                    <h2>Contactanos</h2>
                </div>
                <div class="col-md-8">
                    <div class="row form-container">

                    <?php



$data = $_POST;



$to = "administracion@kellerwilliamsroyal.es";
$nombre = $data["nombre"];
$email = $data["email"];
$provincia = $data["telefono"];
$comentarios = $data["comentarios"];

$acepta = $data["privacidad"];
$subject = 'CONTACTO DESDE LA WEB KW';
$body = 'Hola, un usuario tiene una duda en la web de kw, sus datos son:<br>';
$body .= 'NOMBRE:'.$nombre.'<br>';
$body .= 'EMAIL:'.$email.'<br>';
$body .= 'COMENTARIO:<BR>'.$comentarios.'<br>';




if($data)
{

    
    if($data["privacidad"] != 'on')
    {
      ?>


                            <div class="form-group col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <p id="msg-error">Tienes que aceptar la política de privaciadad</p>
                                </div>
                            </div>


      <?php

    }



    else if($data["nombre"] == '')
    {
      ?>


<div class="form-group col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <p id="msg-error">Tienes que rellenar el nombre</p>
                                </div>
                            </div>


      <?php

    }


    else if($data["email"] == '')
    {
      ?>

<div class="form-group col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <p id="msg-error">Tienes que rellenar el email</p>
                                </div>
                            </div>
      <?php

    }





    else if($data["comentarios"] == '')
    {
      ?>

<div class="form-group col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <p id="msg-error">Tienes que rellenar los comentarios</p>
                                </div>
                            </div>
      <?php

    }

    else
    {
      $headers = array('Content-Type: text/html; charset=UTF-8');
      $mail = wp_mail($to, $subject, $body, $headers );
      if(!$mail)
      {
        ?>
                            <div class="form-group col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <p id="msg-error">Lo sentimos ha sucedido un error.</p>
                                </div>
                            </div>
        <?php

      }
      else
      {

            ?>

            <script>
                document.location.href = 'https://www.kellerwilliamsroyal.es/gracias-por-ponerte-en-contacto';
            </script>


<?php
  
      }

      //var_dump($mail);
    }



}

?>



                            <div class="form-group col-md-12" id="error-msg">
                                <div class="alert alert-danger" role="alert">
                                    <p id="msg-error">Error</p>
                                </div>
                            </div>
                        
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y apellidos">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control"  id="email" name="email"  placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control"  id="telefono" name="telefono"  placeholder="Teléfono">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea cols="30" rows="5" id="comentarios" name="comentarios"  class="form-control"  placeholder="Motivo de la consulta"></textarea></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="privacidad" name="privacidad">
                                    <label class="form-check-label" for="defaultCheck1">
                                      Acepto la <a href="/politica-privacidad">política de privacicad</a>
                                    </label>
                                  </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" value="Enviar" id="bt-enviar-form" name="bt-enviar-form">
                            </div>
                       
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    </form>


<script>
    formpresent = 1;
</script>

<?php
get_footer();
