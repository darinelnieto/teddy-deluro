<?php
// $script_handle = 'footer-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials/footer.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: footer
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$social_networks = get_field('social_networks', 'option');
?>
<section class="footer-partial-d4c647">
    <div class="content">
        <div class="footer-menu" data-aos="zoom-in">
            <?php
                wp_nav_menu( array(
                    'menu'           => 'Foter menu',
                    'fallback_cb'    => false,
                    'container'      => 'nav',
                    'container_class' => 'footer-nav',
                    'container_id'   => 'footer-nav',
                    'container_aria_label' => __( 'Utility Navigation', 'sajo-theme' ),
                    'menu_class'     => 'footer-menu',
                    'depth'          => 2,
                    'walker'         => new Sajo_Nav_Walker(),
                    'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                ) );
            ?>
        </div>
        <ul class="social-networks">
            <?php foreach($social_networks as $item): ?>
                <li>
                    <a href="<?= $item['link']['url']; ?>" 
                        target="<?= $item['link']['target']; ?>" 
                        rel="noopener noreferrer"
                        area-label="Link to <?= $item['link']['title']; ?>" 
                        title="Link to <?= $item['link']['title']; ?>"
                        data-aos="zoom-in"
                        ><?= wp_get_attachment_image($item['icon'] ?? '', 'medium', false, array(
                        'class' => 'icon-image',
                        'loading' => 'lazy',
                        'decoding' => 'async'
                        )); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
                    