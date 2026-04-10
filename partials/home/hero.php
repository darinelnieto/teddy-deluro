<?php
/**
 * 
 * Partial Name: hero
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$hero = get_field('hero');
if(count($hero['images']) > 1){
    $script_handle = 'hero-js';
    wp_enqueue_script(
        $script_handle,
        get_template_directory_uri() . '/js/partials/hero.js',
        array('jquery'),
        null,
        true
    );
}
?>
<section class="hero-partial-711c7e">
    <div class="texts">
        <h1 class="title" data-aos="zoom-in"><?= $hero['title'] ?? ''; ?></h1>
        <p class="description" data-aos="zoom-in"><?= $hero['description'] ?? ''; ?></p>
        <?php if(!empty($hero['call_to_action'])): ?>
            <a href="<?= $hero['call_to_action']['url']; ?>" 
                target="<?= $hero['call_to_action']['target']; ?>"
                rel="noopener noreferrer"
                area-label="Link to <?= $hero['call_to_action']['title']; ?>" 
                title="Link to <?= $hero['call_to_action']['title']; ?>" class="cta-gold" data-aos="zoom-in">
                <span class="content-cta"><?= $hero['call_to_action']['title']; ?></span>
            </a>
        <?php endif; ?>
    </div>
    <?php if($hero['enable_image'] === true): ?>
        <div class="hero-images <?php if(count($hero['images']) > 1): ?>owl-carousel<?php endif; ?>">
            <?php foreach($hero['images'] as $img): ?>
                <div class="item">
                    <?= wp_get_attachment_image($img['desktop_image'] ?? '', 'full', false, array(
                        'class' => 'image d-none d-sm-block',
                        'loading' => 'lazy',
                        'decoding' => 'async'
                    )); ?>
                    <?= wp_get_attachment_image($img['movil_image'] ?? '', 'full', false, array(
                        'class' => 'image d-block d-sm-none',
                        'loading' => 'lazy',
                        'decoding' => 'async'
                    )); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="video">
            <video id="video" class="video d-none d-sm-block" autoplay muted loop playsinline preload="auto">
                <source src="<?= $hero['desktop_video'] ?? ''; ?>" type="video/mp4">
                Tu navegador no soporta video HTML5.
            </video>
            <video id="video" class="video d-block d-sm-none" autoplay muted loop playsinline preload="auto">
                <source src="<?= $hero['movil_video'] ?? ''; ?>" type="video/mp4">
                Tu navegador no soporta video HTML5.
            </video>
        </div>
    <?php endif; ?>
</section>
                    