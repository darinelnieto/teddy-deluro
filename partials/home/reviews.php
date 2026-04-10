<?php
$script_handle = 'reviews-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/reviews.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: reviews
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_field('review');
$reviews = new WP_Query(array( 'post_type' => 'reviews', 'post_status' => 'publish', 'posts_per_page' => 7, 'order' => 'DESC' ));
?>
<section class="reviews-partial-f75e1b">
    <?php if($reviews->have_posts()): ?>
        <div class="reviews">
            <h2 class="title" data-aos="fade-up"><?= $content['title']; ?></h2>
            <div class="reviews-slide owl-carousel">
                <?php while($reviews->have_posts()): $reviews->the_post(); ?>
                    <div class="item" data-aos="zoom-in">
                        <div class="review-text">
                            <?= the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <a href="<?= $content['add_review']['url']; ?>" target="<?= $content['add_review']['target']; ?>" area-label="Link to <?= $content['add_review']['title']; ?>" title="Link to <?= $content['add_review']['title']; ?>" rel="noopener noreferrer" class="cta-gold" data-aos="fade-up">
                <span class="content-cta"><?= $content['add_review']['title']; ?></span>
            </a>
        </div>
    <?php endif; ?>
    <div class="instagram" data-aos="fade-up">
        <?= do_shortcode($content['instagram_short_code']); ?>
    </div>
</section>
                    