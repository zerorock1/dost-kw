<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KWRoyal
 */

?>




<footer>
        <div class="footer-con">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="<?=get_template_directory_uri()?>/img/white-logo.svg" class="logo" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p class="adreess">
                        <strong>KW Royal</strong><br>
                        Estartetxe, 5 - Ático Dpto. 507 Leioa 48940 (Vizcaya)<br>
                        944 145 160 - 639 415 168
                        <br><br>
                        <a href="">kwroyal@kwspain.es</a><br>
                        <a href="">www.kellerwilliamsroyal.es</a>
                        </p>
                    </div>

                    <div class="col-md-3">
                        <p class="adreess">
                        <strong>Conecta con nosotros</strong><br>
                        </p>
                        <ul class="social">
                            <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href=""><i class="fab fa-instagram-square"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter-square"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <p class="adreess">
                        <strong>Suscríbete para recibir nuestras novedades</strong><br>
                        </p>

                        
                        <form method="post" class="footer-sus" action="/sus-newsletter" id="form-newsletter">
                        
                            <input type="text" class="le-texto" name="email-news" id="email-news" placeholder="Tu email">
                            <input type="submit" value="SUSCRIBIRME" name="bt-send-email-news" id="bt-send-email-news" class="send hvr-fade ">
                            <br>
                            <br>
                        </form>
                        
                    </div>

                </div>
            </div>
        </div>
    </footer>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="<?=get_template_directory_uri()?>/js/parallax.js"></script>
    <script src="<?=get_template_directory_uri()?>/js/form.js?v=<?=rand()?>"></script>
    <script src="<?=get_template_directory_uri()?>/js/formnews.js?v=<?=rand()?>"></script>


    <script>

            var _FORM,_NEWSFORM;
            $( document ).ready(function() {
                    var hamburger = $('#hamburger-icon');
                    var mainmenu = $('#main-menu');
                    hamburger.click(function() {
                        hamburger.toggleClass('active');
                        mainmenu.toggleClass('active');
                        return false;
                    });

                    if(formpresent == 1)
                    {
                        _FORM = new Form();
                    }

                    _NEWSFORM = new Formnews();






            });
    </script>

<?php wp_footer(); ?>


  </body>
</html>
