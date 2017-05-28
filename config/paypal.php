<?php
/**
 * Created by PhpStorm.
 * User: nobikun1412
 * Date: 28-May-17
 * Time: 17:42
 */

return [

    'client_id' => 'AUSzkNShPPtE_JZqPqOIkm9nOgHFLVMItGSxWGCAa-KoN-M9hmZRZ9dTC9r7KpffvW2qzacfoAwA_ZVM',
    'secret' => 'EPyg0hKZVrrwNu3vASR3G8kdC0otJjFD8fiYZAatXmQvYq4mCqwE8SYndCiWvaNxCnPVhW28NptQR_9q',
    'settings' => [
        'http.CURLOPT_CONNECTTIMEOUT' => 30,
        'mode' => 'sandbox',
        'log.LogEnabled' => true,
        'log.FileName' => storage_path().'/logs/paypal.php',
        'log.LogLevel' => 'INFO'
    ]

];