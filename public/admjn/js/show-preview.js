function showPreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $(input).val();
        filename = filename.substring(filename.lastIndexOf("\\") + 1);

        // Get the associated preview container using data-image-preview attribute
        var previewContainerId = $(input).data("image-preview");
        var previewContainer = $("#" + previewContainerId);

        var filesAmount = input.files.length;
        var previewContainer = $("#" + previewContainerId);

        // Clear previous images
        previewContainer.empty();

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = $("<img>").attr("src", e.target.result).css({
                    "max-width": "200px",
                    margin: "10px",
                });
                previewContainer.append(img);
            };

            reader.readAsDataURL(input.files[i]);
        }
    }
}
