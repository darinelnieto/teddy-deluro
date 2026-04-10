<?php
$script_handle = 'faqs-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/faqs.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: faqs
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$faqs = get_field('faqs');
if(!empty($faqs['list'])){
    $faqs_list = $faqs['list'];
}else{
    $faqs_query = new WP_Query(array('post_type'=>'faqs', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC'));
    $faqs_list = [];
    while($faqs_query->have_posts()){
        $faqs_query->the_post();
        array_push($faqs_list, get_the_id());
    }
    wp_reset_postdata();
}
if(!empty($faqs_list)):
$key = 0;
?>
<section class="faqs-partial-825057">
    <div class="content">
        <h2 class="title" data-aos="fade-up"><?= $faqs['title'] ?? ''; ?></h2>
        <div class="faqs-list">
            <?php foreach($faqs_list as $item): $key++; ?>
                <div class="faqs-item <?php if($key === 1): ?>active<?php endif; ?>" data-aos="fade-up">
                    <button type="button" class="ask-button" area-label="Ask button" aria-expanded="false" aria-controls="answer">
                        <span class="ask"><?= get_the_title($item); ?></span><span class="status"><?php if($key === 1): ?>-<?php else: ?>+<?php endif; ?></span>
                    </button>
                    <div class="answer">
                        <?= apply_filters('the_content', get_the_content(null, false, $item));; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>