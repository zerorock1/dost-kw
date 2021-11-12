<?php
/**
 * Template Name: Action - Suscripción newsletter
 */

get_header();
?>



                    <?php



$data = $_POST;



$to = "patricia.delama@kwspain.es";
//$to = "carlos.martinez.fdez@gmail.com";
$email = $data["email-news"];


$acepta = $data["privacidad"];
$subject = 'SUSCRIPCIÓN A LA NEWSLETTER DESDE LA WEB KW';
$body = 'Hola, un usuario se quiere apuntar a la newsltter, sus datos son:<br>';
$body .= 'EMAIL:'.$email.'<br>';




if($data)
{

    
  
      $headers = array('Content-Type: text/html; charset=UTF-8');
      $mail = wp_mail($to, $subject, $body, $headers );
?>

            <script>
                document.location.href = 'https://www.kellerwilliamsroyal.es/gracias-por-suscribirte';
            </script>

<?php


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
