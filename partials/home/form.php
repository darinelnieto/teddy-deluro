<?php
$script_handle = 'form-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/form.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: form
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$contact = get_field('contact');
if(!empty($contact['form_shortcode'])):
?>
<section class="form-partial-e54445">
    <div class="content">
        <h2 class="title" data-aos="fade-up"><?= $contact['title'] ?? ''; ?></h2>
        <div class="form-content" data-aos="zoom-in">
            <?= do_shortcode($contact['form_shortcode']); ?>
        </div>
    </div>
</section>
<?php endif; ?>