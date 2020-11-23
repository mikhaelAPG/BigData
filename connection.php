<?php
    // echo phpinfo();
    require_once __DIR__ . '/vendor/autoload.php';

    // (new MongoDB\Client) = membuat koneksi ke mongo server
    $client = (new MongoDB\Client);

    // echo "success";
    $perpus = $client->Perpustakaan;
    // composer require mongodb/mongodb

    $result = $perpus->createCollection('visitors');
    $result2 = $perpus->createCollection('books');
    $result3 = $perpus->createCollection('borrowers');

    // $resultdel = $perpus->dropCollection('visitors');

    var_dump($result);
    var_dump($result2);
    var_dump($result3);

    $insertManyResult = $result->insertMany([
        [],
        []
    ]);

?>