<?php
/**
 * Template Name: Home Temporal
 */

//get_header();
?>
<!DOCTYPE html>
<html>
<head>


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">

    <style>
        .tempora
        {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .texto{
            text-align: center;
            font-family: 'Lato', sans-serif;
            font-size: 2em;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

    <div class="tempora">

        <div class="texto">
            <img src="<?=get_template_directory_uri()?>/img/rgb-logo.svg" alt="">
            <br>
            <p>Estamos mejorando nuestra web, disculpen las molestias.</p>
            <p style="font-size:.5em;">Si desea ponerse en contacto con nosotros puede hacerlo a través del teléfono 944 145 160</p>
        </div>

    </div>

</body>
</html>

<?php
//get_footer();
