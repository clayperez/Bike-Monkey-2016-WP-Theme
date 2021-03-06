<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?><?php wp_title(' - ', true, 'left'); ?></title>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/wpcore.css">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/webflow.css">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bikemonkey.webflow.css">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Droid Sans:400,700","Work Sans:100,200,300,regular,500,600,700,800,900"]
      }
    });
  </script>
  <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/2013_circleLogo.png">
  <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/2013_circleLogo.png">
  <?php wp_head(); ?>

  <?php
    // ACF GENERAL PAGE SETTINGS
    $bodyBG = get_field( "body_color" );
    $fontColor = get_field( "font_color" );
    $linkColor = get_field( "link_color" );
    $pagestyle = get_field( "custom_style" );
  
    if($linkColor != ""){ echo "<style>body a {color:$linkColor;}</style>"; }
    if($pagestyle != ""){ echo "<style>$pagestyle</style>"; }
  ?>

</head>

<!-- OPEN UP THE BODY -->
<body style="background:<?php echo $bodyBG; ?>;color:<?php echo $fontColor; ?>;">

