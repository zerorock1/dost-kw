<?php
/**
 * Template Name: Home
 */

get_header();
?>


<section class="modulo-home modulo-home-top" class="parallax-window" data-parallax="scroll" data-image-src="<?=get_template_directory_uri()?>/img/bg-home.jpg">
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
                <h1>Donde se encuentran<br>las oportunidades</h1>
            </div>
            </div>

            <div class="row finder-home">
             <div class="col">
                    <ul>
                        <li><a href="">COMPRAR</a></li>
                    <li class="separador">|</li>
                        <li><a href="">ALQUILAR</a></li>
                        <!--<li class="separador">|</li>
                        <li><a href="">ALQUILAR</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="row finder-home finder-home-form">
            <div class="col">
                    <form action="/buscador-de-viviendas" method="post">
                        <select name="tipovivienda" id="tipovivienda">
                        
                            <option value="3399" selected>Piso</option>
                            <option value="199">Adosada</option>
                            <option value="399">Casa</option>
                            <option value="7599">Casa con terreno</option>
                            <option value="2399">Garaje</option>
                            <option value="1299">Local comercial</option>
                            <option value="5099">Parcela</option>
                        </select>
                        <select name="provincia" id="provincia">
                            <option value="47" selected>VIZCAYA</option>
                        </select>
                        <input type="hidden" name="desdelahome" id="desdelahome" value="1">
                        <input type="submit" value="Buscar" class="hvr-fade ">
                    </form>
                </div>
            </div>

        </div>
    </section>



    <section class="modulo-home modulo-home-agencia">
        <div class="container">
            <div class="row">
                <div class="col">
                   <img src="<?=get_template_directory_uri()?>/img/rgb-logo.svg" class="logo" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8">
                    <p class="intro">
                        El sector inmobiliario ha experimentado un cambio radical en poco tiempo, lo que ha llevado a nuestra industria y tu negocio a una nueva era. A medida que el mundo se ha acelerado tanto, inevitable como inesperadamente, tu viaje hacia el espacio digital, los desafíos fundamentales, desde la presión a la baja sobre las comisiones hasta los nuevos competidores de las puntocom, ya no son preocupaciones lejanas. Ellos están aquí.
                    </p>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?=get_template_directory_uri()?>/img/foto-home-mod-2.jpg" class="foto" alt="">
                </div>
                <div class="col-md-4 mod">
                    <h2>Qué hacemos por tu vivienda</h2>
                    <ul>
                        
                        <li>Marketing Digital.</li>
                        <li>Fotografía Profesional.</li>
                        <li>Asesoría Financiera.</li>
                        <li>Publicación Internacional.</li>
                    </ul>
                </div>
                <div class="col-md-4 mod">
                    <h2>Por qué nuestra agencia</h2>
                    <ul>
                        
                        <li>Asesoramiento personalizado.</li>
                        <li>Plan único para tu propiedad.</li>
                        <li>Equipo multidisciplinar a tu disposición.</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>




    <section class="modulo-home modulo-home-team" class="parallax-window" data-parallax="scroll" data-image-src="<?=get_template_directory_uri()?>/img/home-bg-team.jpg">
        <div class="content-container">
            <a href="/equipo" class="equipo">Equipo</a>       
        </div>
    </section>





<?php
get_footer();
