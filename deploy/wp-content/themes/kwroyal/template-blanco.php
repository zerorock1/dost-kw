<?php
/**
 * Template Name: Blanco
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

    <section>
        <div class="container">
            <div class="col">

            <?php
    the_content();
    ?>
            </div>
        </div>
    </section>




<?php
get_footer();
