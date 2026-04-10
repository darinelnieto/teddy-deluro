<?php
/**
 * 
 * Header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
  <script>
    const _sajoURI_ = "<?= get_template_directory_uri() ?>",
          _sajoURL_ = "<?= get_site_url() ?>";
  </script>
</head>

<body <?php body_class(); ?>>
<?php 
  $mainColor = get_field('primary_color', 'option');
  $secondaryColor = get_field('secondary_color', 'option');
  $third_color = get_field('third_color', 'option');
  $four_color = get_field('four_color', 'option');
  $cta_bg = get_template_directory_uri() . '/images/gold-background-new.webp';
?>
<style>
   :root {
        --main-color: <?= $mainColor; ?>;
        --secondary-color: <?= $secondaryColor; ?>;
        --third-color: <?= $third_color; ?>;
        --four-color: <?= $four_color; ?>;
        --background-image: <?= $texture; ?>;
    }
    .cta-gold, .border-gold{
      background-image: url(<?= $cta_bg; ?>);
    }
</style>
<div id="page"> <!-- +Page container -->
  <header id="header-wrapper">
    <?php get_template_part('partials/globals/header'); ?>
  </header>