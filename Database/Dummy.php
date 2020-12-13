<?php
require_once '../vendor/autoload.php';

$client = new MongoDB\Client;

// $perpusdb = $client->perpusdb;
// $test = $perpusdb->drop();

$perpusdb = $client->perpusdb;

// $res = $perpusdb->createCollection('Pengunjung');
// $res = $perpusdb->createCollection('Penerbit');

//input penerbit ke db
$penerbitCollection = $perpusdb->Penerbit;
$insertPenerbit = $penerbitCollection->insertOne([
    'nama' => 'PT Elex Media Komputindo',
    'lokasi' => 'Gedung Kompas-Gramedia I Lantai 2',
    'jalan' => 'Jl Palmerah Barat 29-33',
    'kota' => 'Jakarta Pusat',
    'kode_pos' => '10270',
    'kontak' => [
        'telepon' => ['+62-21-53650110', '+62-21-53650111'],
        'website' => 'https://elexmedia.id/'
    ],
    'buku' => [
        [
            'isbn' => '978-602-03-8820-5',
            'cover' => 'the definitive book of body language.png',
            'judul' => 'The Definitive Book Of Body Language',
            'deskripsi' => 'memahami orang melalui bahasa tubuhnya',
            'penulis' => ['Alan Pease', 'Barbara Pease'],
            'alih_bahasa' => 'Susi Purwoko',
            'tebal_buku' => 464,
            'kategori' => 'Self-Improvement'
        ],
        [
            'isbn' => '978-602-03-1120-8',
            'cover' => 'laravel_from_scratch.png',
            'judul' => 'Laravel From Scratch',
            'deskripsi' => 'framework laravel untuk pemula',
            'penulis' => ['Sanders A.'],
            'tebal_buku' => 120,
            'kategori' => 'coding'
        ]
    ],

]);

$pengunjungCollection = $perpusdb->Pengunjung;
$insertPengunjung = $pengunjungCollection->insertOne([
    'NIK' => '123124124324',
    'nama' => 'Sherlock Holmes',
    'alamat' => [
        'jalan' => 'Baker Street 221B',
        'kota' => 'London',
        'kode_pos' => '12345'
    ],
    'kontak' => [
        'email' => 'sh@gmail.com',
        'phone' => '769829012'
    ],
    'pekerjaan' => 'Consultant',
    'pinjam' => [
        [
            'judul' => 'The Definitive Book Of Body Language',
            'tanggal_pinjam' => 2020 - 12 - 23,
            'tanggal_kembali' => 2020 - 12 - 17
        ]
    ]
]);
