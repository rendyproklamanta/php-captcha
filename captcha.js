var baseUrl = window.location.origin;

function generateCaptcha() {
    $.ajax({
        url: baseUrl + "/captcha.php/generateCaptcha",
        method: "POST",
        dataType: "json",
        beforeSend: function () { },
        success: function (res) {
            $("#captcha-image").attr("src", res.image);
        },
        error: function (res) {
            console.log("🚀 ~ file: captcha.js:14 ~ generateCaptcha ~ res:", res)
        },
        complete: function () { },
    });
    return false; // block after ajax request
};

generateCaptcha();