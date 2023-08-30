<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Captcha</title>
</head>

<body>

    <form method="post" action="<?= $_SERVER['APP_URL'] . '/captcha/validateCaptcha'; ?>">
        <img id="captcha-image" src="" width="100%" height="50px" />
        <input type="number" name="captcha" class="form-control" placeholder="captcha" autocomplete="off">
        <button type="button" onclick='generateCaptcha()'>Reload Captcha</button>

    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="captcha.js"></script>

</body>

</html>