<?php
// $script_handle = 'services-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials/services.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: services
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$services = get_field('venues');
?>
<section class="services-partial-017e78">
    <?php if(!empty($services['image_slide'])): ?>
        <div class="slide-images" style="background-image:url(<?= $services['image_slide']; ?>)"></div>
    <?php endif; ?>
    <div class="content">
        <div class="top-content">
            <h2 class="title" data-aos="zoom-in"><?= $services['title'] ?? ''; ?></h2>
            <div class="two-column-row">
                <?php if(!empty($services['events_type'])): ?>
                    <div class="left">
                        <?php foreach($services['events_type'] as $event): ?>
                            <div class="event-item" data-aos="fade-right">
                                <div class="name-and-date">
                                    <h3 class="name"><?= $event['name'] ?? ''; ?></h3>
                                    <p class="date"><?= date('d/m/y', strtotime($event['date'])) ?? ''; ?></p>
                                </div>
                                <?php if(!empty($event['rsvp'])): ?>
                                    <a href="<?= $event['rsvp']['url']; ?>" target="<?= $event['rsvp']['target']; ?>" area-label="<?= $event['rsvp']['target']; ?> link" title="<?= $event['rsvp']['target']; ?> link" rel="noopener noreferrer" class="rsvp-call-to-action cta-gold">
                                        <span class="content-cta"><?= $event['rsvp']['title']; ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; if(!empty($services['main_image'])): ?>
                <div class="image-contain" data-aos="fade-left">
                    <?= wp_get_attachment_image($services['main_image'], 'medium', false, array(
                        'loading' => 'lazy',
                        'decoding' => 'async',
                        'class' => 'main-image'
                    )); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if(!empty($services['events'])): ?>
            <div class="events-post-grid">
                <?php foreach($services['events'] as $item): ?>
                    <div class="event-card" data-aos="zoom-in">
                        <div class="thumbnail-contain">
                            <?= get_the_post_thumbnail($item, 'medium'); ?>
                        </div>
                        <div class="name">
                            <h4><?= get_the_title($item); ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
                    