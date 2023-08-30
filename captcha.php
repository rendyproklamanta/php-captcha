<?php

// Start the session
session_start();

class Captcha
{
    /*
    |--------------------------------------------------------------------------
    | Generate Captcha
    |--------------------------------------------------------------------------
    */
    function generateCaptcha()
    {
        ob_start();

        $img = imagecreate(110, 25);
        $code = mt_rand(100000, 999999); // Number only captcha

        unset($_SESSION['captcha_code']);
        $_SESSION["captcha_code"] = $code;

        imagecolorallocate($img, 230, 230, 230);
        $grey = imagecolorallocate($img, 125, 125, 125);
        $black = imagecolorallocate($img, 0, 0, 0);

        $font =  'Monaco.ttf'; // Set font

        for ($i = 0; $i < 6; $i++) {
            $capt  = substr($code, $i, 1);
            $corner = rand(0, 25);
            imagettftext($img, 15, $corner, (10 + 16 * $i), 22, $black, $font, $capt);
            // imagettftext($gbr, 20, $corner, (10+15*$i), 21, $grey, $font, $capt);
        }

        imagepng($img);
        imagedestroy($img);

        $img = ob_get_clean();

        $res = array(
            'success' => true,
            'image' => 'data:image/jpeg;base64,' . base64_encode($img),
            // 'captcha_code' => $_SESSION["captcha_code"],
        );

        return json_encode($res);
    }

    /*
    |--------------------------------------------------------------------------
    | Validating Captcha
    |--------------------------------------------------------------------------
    */
    function validateCaptcha()
    {
        $captcha = trim($_POST["captcha"]);
        $captcha_code = $_SESSION["captcha_code"];

        if ($captcha != $captcha_code) {
            $res = array(
                'success' => false,
                'message' => 'Captcha invalid'
            );
            return json_encode($res);
        }

        $res = array(
            'success' => true,
            'message' => 'Captcha valid'
        );

        return json_encode($res);
    }
}
