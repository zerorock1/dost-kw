<?php
/**
 * Template Name: Equipo
 */

get_header();
?>


<section class="modulo-home modulo-home-top" class="parallax-window" data-parallax="scroll" data-image-src="<?=get_template_directory_uri()?>/img/bg-top-equipo.jpg">
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
                    <p class="intro">
                        Nuestro Équipo
                    </p>
                </div>
                <div class="col-md-8">
                        <p class="intro">
                            Equipo multidisciplinar que te acompañará en cada fase de tu gestión inmobiliaria. Profesionales con más de 35 años de experiencia en el sector inmobiliario.
                        </p>
                </div>
            </div>
            

            <div class="row">
                <div class="col">
                    <div class="modulos-equpo">


                        <?php
                        $args = array(
                            'post_type'=> 'equipo',
                            // 'areas'    => 'painting',
                            'orderby'   => 'meta_value',
	                        'meta_key'  => 'orden',
        //'meta_type' => 'NUMERIC'
                            'order'    => 'ASC',

                        );              
                        
                        $the_query = new WP_Query( $args );
                        
                        if($the_query->have_posts() ) : 
                            while ( $the_query->have_posts() ) : 
                                $the_query->the_post(); 
                                $current_id = get_the_ID(); 
                                $nombre = get_post_meta($current_id,'nombre');
                                $perfil = get_post_meta($current_id,'perfil');
                                $foto = get_post_meta($current_id,'foto');
                                
                            ?>

                                <div class="modulo">
                                    <div class="img">
                                        <img src="<?=$foto[0]["guid"]?>" alt="">
                                    </div>
                                    <p class="title"><?=$nombre[0]?></p>
                                    <p><?=$perfil[0]?></p>
                                </div>
                            <?php
                            endwhile; 
                            wp_reset_postdata(); 
                        else: 
                        endif;
                        ?>




                        
                    </div>
                </div>
            </div>
            

        </div>
    </section>


    <section class="modulo-home modulo-home-team modulo-team-hire" class="parallax-window" data-parallax="scroll" data-image-src="<?=get_template_directory_uri()?>/img/fondo-equipo-hire.jpg">
        <div class="content-container">
           <div>
            <p>Buscamos agentes comerciales como tú</p>
            
            <a href="/contacto" class="send hvr-fadet">Únete a nosotros</a>
           </div>
        </div>
    </section>





<?php
get_footer();
