<!DOCTYPE html>
<html <?php language_attributes(); ?>
  <head>
   <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
   <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="my-logo">
      <h1><?php bloginfo('name'); ?></h1>
    </header>
