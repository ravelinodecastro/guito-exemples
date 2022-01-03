<?php

    $iban = "AO06";
    $valor = 2000;
    $chave = "XXXXXXXXXX"

    $data = json_encode(
        [
            "iban" => $iban,
            "amount" => $valor,
            "api_key" => $chave
        ]
    );
    $curl = curl_init();

    $httpHeader = [
        "Content-Type: application/json",
    ];

    $opts = [
        CURLOPT_URL             => "https://sandbox.guito.com/transaction/",
        CURLOPT_CUSTOMREQUEST   => "POST",
        CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_TIMEOUT         => 30,
        CURLOPT_HTTPHEADER      => $httpHeader,
        CURLOPT_POSTFIELDS      => $data
    ];
    curl_setopt_array($curl, $opts);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    return $response;

