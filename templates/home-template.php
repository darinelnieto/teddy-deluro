   
<?php
/**
 * 
 * Template Name: home
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header(); 
$texture = get_field('background_image', 'option');
?>
<main id="home-template-9f0a47">
    <?php get_template_part('partials/home/hero'); ?>
    <div class="home-content">
        <span class="background-overly" style="background-image: url(<?= $texture; ?>)"></span>
        <div class="contain">
            <?php get_template_part('partials/home/services'); ?>
            <?php get_template_part('partials/home/talent-available'); ?>
            <?php get_template_part('partials/home/reviews'); ?>
            <?php get_template_part('partials/home/faqs'); ?>
            <?php get_template_part('partials/home/form'); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
                    