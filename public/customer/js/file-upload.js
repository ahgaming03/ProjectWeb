(function ($) {
    "use strict";
    $(function () {
        $(".file-upload-browse").on("click", function () {
            var file = $(this)
                .parent()
                .parent()
                .parent()
                .find(".file-upload-default");
            file.trigger("click");
        });
        $(".file-upload-default").on("change", function () {
            $(this)
                .parent()
                .find(".form-control")
                .val(
                    $(this)
                        .val()
                        .replace(/C:\\fakepath\\/i, "")
                );
        });
        // show button save
        $(".file-upload-default").on("change", function () {
            $(this)
                .parent()
                .parent()
                .parent()
                .parent()
                .find(".btn-save")
                .removeClass("d-none");
        });
        // change avatar by image uploaded
        $(".file-upload-default").on("change", function () {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                $(".img-avatar").attr("src", reader.result);
            };
            if (file) {
                reader.readAsDataURL(file);
            } else {
                $(".img-avatar").attr("src", "");
            }
        }
        );
    });
})(jQuery);
