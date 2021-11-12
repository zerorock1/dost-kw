<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KWRoyal
 */

?>

<!doctype html>
<html lang="en">
  <head>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">


    <?php wp_head(); ?>


    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6R49HSWMJB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6R49HSWMJB');
</script>



    <script>
        var formpresent = 0;
    </script>
  </head>
  <body>


    <nav id="main-menu">
        <ul>
            <!-- <li><a href="/equipo">Equipo</a></li> -->
            <!-- <li><a href="listado-viviendas.html">Viviendas</a></li> -->
            <!-- <li><a href="blog-portada.html">Blog</a></li> -->
            <!-- <li><a href="/contacto">Contacto</a></li> -->
            <!-- <li><a href="kw-oct.pdf" target="_blank">Revista</a></li> -->
        
        <?php
          wp_nav_menu('menu-1');
        ?>
        </ul>
    </nav>
