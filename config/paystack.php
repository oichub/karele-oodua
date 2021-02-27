<?php

/*
 * This file is part of the Laravel Paystack package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => getenv('pk_test_7b2e24dcf9f6f750310c21dc44520265e64b7430'),

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' => getenv('sk_test_715248e84dded092ed503986a45e1d3a0d8718aa'),

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => getenv('https://api.paystack.co'),

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => getenv('omolewu12@gmail.comL'),

];
