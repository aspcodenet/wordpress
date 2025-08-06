<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
        $custom_logo_id=get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id);
    ?>
    <img class="mb-3 mx-auto logo" src="<?php echo $logo[0]; ?>" alt="logo">
    

    <?php 
    
    ?>

    <h1><?php the_title(); ?></h1>