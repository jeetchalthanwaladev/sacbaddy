(function ($) {
    "use strict";

    $(document).on("click", ".sakbaddy-select-image", function (event) {
        event.preventDefault();
        const button = $(this);
        const target = $("#" + button.data("target"));
        const preview = button.siblings(".sakbaddy-image-preview");
        const picker = wp.media({
            title: "Choose an image",
            button: { text: "Use this image" },
            multiple: false
        });

        picker.on("select", function () {
            const image = picker.state().get("selection").first().toJSON();
            target.val(image.id);
            preview.attr("src", image.url).show();
        });
        picker.open();
    });
})(jQuery);
