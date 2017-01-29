<?php
// see https://mwop.net/blog/2015-01-26-psr-7-by-example.html

// $query   = $request->getQueryParams();
// $body    = $request->getBodyParams();
// $cookies = $request->getCookieParams();
// $files   = $request->getUploadedFiles();
// $server  = $request->getServerParams();

$cookies = $request->getCookieParams();

return $response->withHeader('Set-Cookie', 'bar=foo');


// To Encrypt:
function encrypt($string)
{
    $iv = mcrypt_create_iv(
        mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
        MCRYPT_DEV_URANDOM
    );

    $encrypted = base64_encode(
        $iv .
        mcrypt_encrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', $key, true),
            $string,
            MCRYPT_MODE_CBC,
            $iv
        )
    );
}

function decrypt($encrypted)
{
    $data = base64_decode($encrypted);
    $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

    $decrypted = rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', $key, true),
            substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
            MCRYPT_MODE_CBC,
            $iv
        ),
        "\0"
    );
}
