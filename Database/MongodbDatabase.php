<?php
require_once '../../vendor/autoload.php';
require_once '../App.php';
class MongodbDatabase
{
    private $db;

    //instansi koneksi ke database
    function __construct()
    {
        $this->db = (new MongoDB\Client)->perpusdb;
    }

    //============================================================================================================================
    //Operasi Buku
    //============================================================================================================================

    public function getListBook()
    {
        return $this->db->Penerbit->find(
            ['buku' => ['$exists' => true]]
        );
    }

    public function fetchDataPublisher()
    {
        return $this->db->Penerbit->find();
    }

    public function getDataBookByISBN($isbn)
    {
        return $this->db->Penerbit->aggregate([
            ['$match' => ['buku.isbn' => $isbn]],
            ['$project' => [
                '_id' => 1,
                'nama' => 1,
                'buku' => ['$filter' => [
                    'input' => '$buku',
                    'as' => 'buku',
                    'cond' => ['$eq' => ['$$buku.isbn', $isbn]]
                ]],
            ]]
        ])->toArray();
    }

    public function insertNewBook($book = [])
    {
        if (empty($book)) {
            return false;
        }

        $penulis = [];
        $penulis[] = $book['penulis'];

        if ($book['penulis2'] != '') {
            $penulis[] = $book['penulis2'];
        }
        if ($book['penulis3'] != '') {
            $penulis[] = $book['penulis3'];
        }

        $document = [
            'isbn' => $book['isbn'],
            'judul' => $book['judul'],
            'penulis' => $penulis,
            'penerbit' => $book['penerbit'],
            'tebal_buku' => $book['tebal_buku'],
            'kategori' => $book['kategori'],
            'img' => new MongoDB\BSON\Binary(file_get_contents($book['image']["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),
            'pdf' => new MongoDB\BSON\Binary(file_get_contents($book['pdf']["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC)
        ];

        if ($book['deskripsi'] != '') {
            $document['deskripsi'] = $book['deskripsi'];
        }
        if ($book['alih_bahasa'] != '') {
            $document['alih_bahasa'] = $book['alih_bahasa'];
        }

        $this->db->Penerbit->updateOne(
            ['nama' => $book['penerbit']],
            ['$push' => [
                'buku' => $document
            ]]
        );

        Flasher::setFlash('Data buku berhasil', 'ditambahkan', 'success');
    }

    public function insertPublisher($publisher = [])
    {
        if (empty($publisher)) {
            return false;
        }

        $document = [
            'nama' => $publisher['nama'],
            'jalan' => $publisher['jalan'],
            'kota' => $publisher['kota'],
            'email' => $publisher['email'],
        ];

        if ($publisher['lokasi'] != '') {
            $document['lokasi'] = $publisher['lokasi'];
        }
        if ($publisher['telepon'] != '') {
            $document['telepon'] = $publisher['telepon'];
        }
        if ($publisher['kode_pos'] != '') {
            $document['kode_pos'] = $publisher['kode_pos'];
        }
        if ($publisher['website'] != '') {
            $document['website'] = $publisher['website'];
        }

        $insert = $this->db->Penerbit->insertOne($document);

        return 'Berhasil Masuk!';
    }

    public function updateBook($book = [])
    {
        if (empty($book)) {
            return false;
        }

        $publisher = $this->getDataBookByISBN($book['isbn']);

        if ($publisher[0]->nama != $book['penerbit']) {
            $this->db->Penerbit->updateOne(
                ['nama' => $book['penerbit']],
                ['$push' => ['buku' => [
                    'isbn' => $book['isbn'],
                ]]]
            );

            $this->db->Penerbit->updateOne(
                ['nama' => $publisher[0]->nama],
                ['$pull' => ['buku' => ['isbn' => $book['isbn']]]]
            );
        }

        $this->db->Penerbit->updateOne(
            ['buku.isbn' => $book['isbn']],
            ['$set' => [
                'buku.$.judul' => $book['judul'],
                'buku.$.penulis' => [$book['penulis']],
                'buku.$.tebal_buku' => $book['tbl'],
                'buku.$.kategori' => $book['kategori']
            ]]
        );

        if ($book['deskripsi'] != null) {
            $insert = $this->db->Penerbit->updateOne(
                ['buku.isbn' => $book['isbn']],
                ['$set' => [
                    'buku.$.deskripsi' => $book['deskripsi'],
                ]]
            );
        }

        if ($book['translator'] != null) {
            $insert = $this->db->Penerbit->updateOne(
                ['buku.isbn' => $book['isbn']],
                ['$set' => [
                    'buku.$.alih_bahasa' => $book['translator'],
                ]]
            );
        }

        Flasher::setFlash('Data berhasil', 'diupdate', 'success');
    }

    public function getCategory()
    {
        return $this->db->Penerbit->distinct('buku.kategori');
    }

    public function deleteBook($isbn)
    {
        $this->db->Penerbit->updateOne(
            ['buku.isbn' => $isbn],
            ['$pull' => ['buku' => ['isbn' => $isbn]]]
        );

        Flasher::setFlash('Data berhasil', 'dihapus', 'danger');
    }

    public function insertNewCategory($category)
    {
        return $this->db->Buku->insertOne(
            ['kategori' => $category]
        );
    }

    public function getDataPublisher()
    {
        return $this->db->Penerbit->findOne(['nama' => $_GET['nama']]);
    }
    
    //============================================================================================================================
    //Operasi Visitor
    //============================================================================================================================
    public function fetchDataVisitor()
    {
        return $this->db->Pengunjung->find();
    }

    public function editVisitor()
    {
        $collection = $this->db->Pengunjung;

        $zip = str_replace(' ', '', $_POST['pos']);
        $email = str_replace(' ', '', $_POST['email']);
        $profession = str_replace(' ', '', $_POST['pekerjaan']);

        $document = [
            'nama' => $_POST['nama'],
            'alamat' => [
                'jalan' => $_POST['jalan'],
                'kota' => $_POST['kota']
            ],
            'kontak' => [
                'phone' => $_POST['telp']
            ],
        ];

        if ($zip != '') {
            $document['alamat']['kode_pos'] = $_POST['pos'];
        }
        if ($email != '') {
            $document['kontak']['email'] = $_POST['email'];
        }
        if ($profession != '') {
            $document['pekerjaan'] = $_POST['pekerjaan'];
        }

        $visitor = $this->getDataVisitor($_POST['nik_old']);

        if (isset($visitor->kontak->email) && $email == '') {
            unset($document['kontak']['email']);
        }
        if (isset($visitor->kontak->kode_pos) && $zip == '') {
            unset($document['alamat']['pos']);
        }
        if (isset($visitor->pekerjaan) && $profession == '') {
            unset($document['pekerjaan']);
        }

        $collection->updateOne(
            ['NIK' =>  $_POST['nik_old']],
            ['$set' => $document]
        );

        Flasher::setFlash('Data ' . $visitor->nama . ' berhasil', "diupdate", "success");
    }

    public function getDataVisitor($nik)
    {
        return $this->db->Pengunjung->findOne(['NIK' => $nik]);
    }

    public function newVisitor()
    {
        $document = [
            'NIK' => $_POST['nik'],
            'nama' => $_POST['nama'],
            'alamat' => [
                'jalan' => $_POST['jalan'],
                'kota' => $_POST['kota']
            ],
            'kontak' => [
                'phone' => $_POST['telp']
            ]
        ];

        if ($_POST['pos'] != '') {
            $document["alamat"]["kode_pos"] = $_POST["pos"];
        }
        if ($_POST['email'] != '') {
            $document["kontak"]["email"] = $_POST["email"];
        }
        if ($_POST['pekerjaan'] != '') {
            $document["pekerjaan"] = $_POST["pekerjaan"];
        }

        $this->db->Pengunjung->insertOne($document);

        Flasher::setFlash('Visitor berhasil', 'ditambah', 'success');
    }

    public function deleteVisitor()
    {
        $this->db->Pengunjung->deleteOne(['NIK' => $_GET['nik']]);
        Flasher::setFlash('Data berhasil', 'dihapus', 'danger');
    }

    public function newBorrowers()
    {
        $this->db->Pengunjung->updateOne(
            ['NIK' => $_POST['nik']],
            ['$push' => [
                'pinjam' => [
                    // 'nik' => $book['isbn'],
                    'judul' => $_POST['judulbuku'],
                    'tanggal_pinjam' => $_POST['tanggalpinjam'],
                    'tanggal_kembali' => $_POST['tanggalkembali'],
                ]
            ]]
        );
        Flasher::setFlash('Peminjaman Buku', 'berhasil', 'success');
    }
}