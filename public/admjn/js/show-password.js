// show hide password
$(document).ready(function () {
    $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
            input.attr("placeholder", "Hide Password");
        } else {
            input.attr("type", "password");
            input.attr("placeholder", "Show Password");
        }
    });
}
);
