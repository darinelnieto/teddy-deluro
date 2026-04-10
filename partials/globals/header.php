<?php
$script_handle = 'header-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/header.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: header
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$social_networks = get_field('social_networks', 'option');
$cta = get_field('book_us_link', 'option');
$whasapp_link = get_field('whatsapp_link', 'option');
$whatsapp_icon = get_field('whatsapp_icon', 'option');
?>
<section class="header-partial-b3c1ef">
    <div class="content">
        <div class="logo-contain" data-aos="zoom-in">
            <?= get_custom_logo(); ?>
        </div>
        <div class="menu-content">
            <!-- Social Networks -->
            <?php if(!empty($social_networks)): ?>
                <ul class="social-networks d-none d-md-flex">
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
            <?php endif; if(!empty($cta)): ?>
                <!-- Book us cta -->
                <a 
                    href="<?= $cta['url']; ?>" 
                    target="<?= $cta['target']; ?>" 
                    class="book-us-cta cta-gold"
                    rel="noopener noreferrer"
                    area-label="Link to <?= $cta['title']; ?>" 
                    title="Link to <?= $cta['title']; ?>"
                    data-aos="zoom-in"
                >
                    <span class="content-cta"><?= $cta['title']; ?></span>
                </a>
            <?php endif; ?>
            <button type="button" class="bar-menu" area-label="Bar menu button" aria-expanded="false" aria-controls="nav-menu" data-aos="zoom-in">
                <span class="cta-gold top"></span>
                <span class="cta-gold center"></span>
                <span class="cta-gold bottom"></span>
            </button>
        </div>
    </div>
    <div class="nav-menu">
        <?php
            wp_nav_menu( array(
                'menu'           => 'Header top menu',
                'fallback_cb'    => false,
                'container'      => 'nav',
                'container_class' => 'header-top-nav',
                'container_id'   => 'header-top-nav',
                'container_aria_label' => __( 'Utility Navigation', 'sajo-theme' ),
                'menu_class'     => 'header-top-menu',
                'depth'          => 2,
                'walker'         => new Sajo_Nav_Walker(),
                'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
            ) );
            if(!empty($social_networks)): ?>
                <ul class="social-networks">
                    <?php foreach($social_networks as $item): ?>
                        <li>
                            <a href="<?= $item['link']['url']; ?>" 
                               target="<?= $item['link']['target']; ?>" 
                               rel="noopener noreferrer"
                               area-label="Link to <?= $item['link']['title']; ?>" 
                               title="Link to <?= $item['link']['title']; ?>"
                               ><?= wp_get_attachment_image($item['icon'] ?? '', 'medium', false, array(
                                'class' => 'icon-image',
                                'loading' => 'lazy',
                                'decoding' => 'async'
                               )); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
        <?php endif; ?>
    </div>
</section>      
<?php if(!empty($whasapp_link)): ?>
    <a href="<?= $whasapp_link['url']; ?>" target="<?= $whasapp_link['target']; ?>" area-label="Link to <?= $whasapp_link['title']; ?>" title="Link to <?= $whasapp_link['title']; ?>" rel="noopener noreferrer" class="whatsapp cta-gold" data-aos="zoom-in">
        <span class="content-cta">
            <?= wp_get_attachment_image($whatsapp_icon, 'medium', false, array(
                'class' => 'whatsapp-icon',
                'loading' => 'lazy',
                'decoding' => 'async'
            )) ?>
        </span>
    </a>
<?php endif; ?>