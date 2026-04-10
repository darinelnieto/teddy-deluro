// JS for partial: form\n
(function($) {
    $(document).ready(function() {
        $("#fecha-estilizada").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            // Si quieres que se vea SIEMPRE ocupando el div, usa:
            // inline: true 
        });
    });
})(jQuery);

(function($) {
    $(function() {
        var $nativeSelect = $('#event-select');
        var $customList = $('.option-list');
        var $triggerSpan = $('.select');

        // 1. Clonar opciones del select al UL
        $nativeSelect.find('option').each(function() {
            var value = $(this).val();
            var text = $(this).text();
            
            // Si el primer option es vacío (placeholder), lo ignoramos o lo manejamos
            if (value !== "") {
                $customList.append(`
                    <li>
                        <button type="button" class="opt-btn" data-value="${value}">
                            ${text}
                        </button>
                    </li>
                `);
            }
        });

        // 2. Evento clic en los botones de la lista
        $customList.on('click', '.opt-btn', function(e) {
            e.preventDefault();
            var selectedValue = $(this).data('value');
            var selectedText = $(this).text();

            // Sincronizar con el select oculto
            $nativeSelect.val(selectedValue).trigger('change');

            // Cambiar el texto del span
            $triggerSpan.text(selectedText);

            // Ocultar la lista (opcional, dependiendo de tu CSS)
            $customList.hide();
        });

        // 3. Abrir/Cerrar la lista al dar clic en el span
        $triggerSpan.on('click', function() {
            $customList.toggle();
        });
    });
})(jQuery);