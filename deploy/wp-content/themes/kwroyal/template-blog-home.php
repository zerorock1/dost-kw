<?php
/**
 * Template Name: Blog Home
 */

get_header();
?>





    <section class="modulo-home modulo-home-top" class="parallax-window" data-parallax="scroll" data-image-src="<?=get_template_directory_uri()?>/img/blog-top.jpg">
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
                <h1 class="blog">Blog</h1>
                <h2>¿Quieres estar al día de nuestras<br>novedades inmobiliarias?</h2>
            </div>
            </div>


        </div>
    </section>



    <?php

        $args = array(
            'posts_per_page'   => -1,
            'category'         => 2,
            'orderby'          => 'name',
            'order'            => 'ASC',
            //'post_type'        => 'product'
        );

        $posts = get_posts($args);
        

        $fecha  = get_post_meta($posts[0]->ID,'fecha');
        $entradilla  = get_post_meta($posts[0]->ID,'entradilla');
        $img_pequena_listado  = get_post_meta($posts[0]->ID,'img_pequena_listado');
        $img_listado_primera  = get_post_meta($posts[0]->ID,'img_listado_primera');
        $link = get_permalink($posts[0]->ID);

    
    ?>



    <section class="modulo-home listado-blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Últimas Noticias</h3>
                </div>
            </div>
            <div class="row moldulos-container">



                <div class="col-md-12">
                    <div class="modulo modulo-gr">
                        <div class="im">
                            <a href="<?=$link?>"><img src="<?=$img_listado_primera[0]["guid"]?>" alt=""></a>

                            
                        </div>
                        <div class="text">
                            <p class="text">
                                <?=$posts[0]->post_title?>
                            </p>
                            <p class="fecha">
                               <?=$fecha[0]?>
                            </p>
                        </div>
                    </div>
                </div>



                <?php

                $contador = 0;
                foreach($posts as $p)
                {
                    $fecha  = get_post_meta($p->ID,'fecha');
                    $entradilla  = get_post_meta($p->ID,'entradilla');
                    $img_pequena_listado  = get_post_meta($p->ID,'img_pequena_listado');
                    $img_listado_primera  = get_post_meta($p->ID,'img_listado_primera');

                    if($contador > 0)
                    {
                        ?>


                        <div class="col-md-6">
                            <div class="modulo ">
                                <div class="im">
                                    <a href="<?=get_permalink($p->ID)?>"><img src="<?=$img_listado_primera[0]["guid"]?>" alt=""></a>
                                </div>
                                <div class="text">
                                    <p class="text">
                                    <?=$p->post_title?>
                                    </p>
                                    <p class="fecha">
                                        <?=$fecha[0]?>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <?php
                    }


                    $contador++;
                }
                
                
                ?>




<!--



                <div class="col-md-6">
                    <div class="modulo">
                        <div class="im">
                            <a href=""><img src="img/blog-3.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <p class="text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                            </p>
                            <p class="fecha">
                                Enero 2022
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="modulo">
                        <div class="im">
                            <a href=""><img src="img/blog-4.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <p class="text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                            </p>
                            <p class="fecha">
                                Enero 2022
                            </p>
                        </div>
                    </div>
                </div>
         
                <div class="col-md-6">
                    <div class="modulo">
                        <div class="im">
                            <a href=""><img src="img/blog-5.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <p class="text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                            </p>
                            <p class="fecha">
                                Enero 2022
                            </p>
                        </div>
                    </div>
                </div>

    -->
            </div>
        </div>
    </section>


    



<?php
get_footer();
