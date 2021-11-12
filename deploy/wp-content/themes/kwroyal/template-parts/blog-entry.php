<?php

$postinfo = get_post();
$fecha  = get_post_meta($postinfo->ID,'fecha');
$entradilla  = get_post_meta($postinfo->ID,'entradilla');
$piefoto  = get_post_meta($postinfo->ID,'pie_foto_grande_interior');

// //$img_pequena_listado  = get_post_meta($postinfo[0]->ID,'img_pequena_listado');
// //$img_listado_primera  = get_post_meta($postinfo[0]->ID,'img_listado_primera');
$img_grande_interior  = get_post_meta($postinfo->ID,'img_grande_interior');
$esvideo  = get_post_meta($postinfo->ID,'es_video');
$videoid  = get_post_meta($postinfo->ID,'video_id');
// $link = get_permalink($postinfo[0]->ID);




?>





<section class="modulo-home listado-blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Últimas Noticias</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="container-noticia">
            

                        

                        <?php

                        if((int)$esvideo[0] == 1)
                        {
                            ?>
                            
                            <p class="entradilla"><?=the_title()?></p>
                             <p class="fecha"><?=$fecha[0]?></p>
                                <style>
                                    .container-video {
                                        position: relative;
                                        width: 100%;
                                        height: 0;
                                        padding-bottom: 56.25%;
                                    }
                                    .video {
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        width: 100%;
                                        height: 100%;
                                    }
                                </style>
                                <div class="container-video">
                                <iframe src="//www.youtube.com/embed/<?=$videoid[0]?>" 
                                frameborder="0" allowfullscreen class="video"></iframe>
                                </div>
                            
                            <?php
                        }
                        else{
                            ?>
                        <p class="entradilla"><?=$entradilla[0]?></p>
                        <p class="fecha"><?=$fecha[0]?></p>
                            <img src="<?=$img_grande_interior[0]["guid"]?>" alt="">
                            
                            <p class="foto-footer"><?=$piefoto[0]?></p>
                            <?php
                            echo($postinfo->post_content);
                        }

                            
                        
                        ?>
                        

                            <div class="social">
                                <ul>
                                    <!-- <li><a href=""><i class="fab fa-instagram-square"></i></a></li> -->
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=#<?=the_permalink()?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                </ul>
                            </div>
                    </div>



                </div>
            </div>

        </div>
    </section>