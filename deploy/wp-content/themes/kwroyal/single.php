<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package KWRoyal
 */

get_header();

$postinfo = get_post();
$category = get_the_category($postinfo->ID);


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



<?php



		switch ($category[0]->category_nicename) 
		{
			case "blog":
				get_template_part( 'template-parts/blog-entry', 'blogentry' );
				break;
		}

get_footer();
