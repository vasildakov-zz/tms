<?php
// see https://docs.zendframework.com/zend-crypt/block-cipher/

//Using GCM or CCM mode from PHP 7.1+
$blockCipher = new \Zend\Crypt\BlockCipher(
    new \Zend\Crypt\Symmetric\Openssl([
        'algo' => 'aes',
        'mode' => 'gcm'
    ])
);

$key = 'encryption key';

$blockCipher->setKey($key);
$encrypted = $blockCipher->encrypt('This is a secret message');

// Encrypted
echo "Encrypted text: $encrypted \n";

// Decrypted
printf("Decrypt: %s\n", $blockCipher->decrypt($encrypted));

exit();
