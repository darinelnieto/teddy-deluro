// JS for partial: faqs\n
jQuery(()=>{
    var see_more = "+";
    var see_less = "-";
    jQuery('.faqs-list').on('click', 'button', function(){
        const $item = jQuery(this).closest('.faqs-item');
        const isActive = $item.hasClass('active');

        // 1. Resetear todos los items (cerrar otros)
        jQuery('.faqs-item').removeClass('active');
        jQuery('.status').html(see_more);

        // 2. Si el que clickeamos NO estaba activo, lo abrimos
        if (!isActive) {
            $item.addClass('active');
            jQuery('.status', this).html(see_less);
        }
    });
});