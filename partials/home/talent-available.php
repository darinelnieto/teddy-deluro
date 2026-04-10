<?php
// $script_handle = 'talent-available-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials/talent-available.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: talent-available
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$talent = get_field('talent_available');
if(!empty($talent['list'])):
?>
<section class="talent-available-partial-5ed8da border-gold">
    <div class="content">
        <h2 class="title" data-aos="zoom-in"><?= $talent['title'] ?? ''; ?></h2>
        <div class="talent-grid">
            <?php foreach($talent['list'] as $item): ?>
                <div class="talent-card" data-aos="zoom-in">
                    <div class="talent-image">
                        <?= wp_get_attachment_image($item['image'] ?? '', 'medium', false, array(
                            'class' => 'image',
                            'loading' => 'lazy',
                            'decoding' => 'async'
                        )); ?>
                    </div>
                    <div class="texts">
                        <h3><?= $item['name'] ?? ''; ?></h3>
                        <?php if(!empty($item['descripion'])): ?>
                            <p class="description"><?= $item['descripion']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if(!empty($talent['book_us'])): ?>
            <a href="<?= $talent['book_us']['url'] ?>" targe="<?= $talent['book_us']['target'] ?>" area-lable="<?= $talent['book_us']['title'] ?> link" title="<?= $talent['book_us']['title'] ?> link" rel="noopener noreferrer" class="cta-gold" data-aos="fade-up">
                <span class="content-cta"><?= $talent['book_us']['title']; ?></span>
            </a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>