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

    public function getListBookByCategory($kategori)
    {
        return $this->db->Penerbit->aggregate([
            ['$match' => ['buku.kategori' => $kategori]],
            ['$project' => [
                '_id' => 1,
                'buku' => ['$filter' => [
                    'input' => '$buku',
                    'as' => 'buku',
                    'cond' => ['$eq' => ['$$buku.kategori', $kategori]]
                ]],
            ]]
        ])->toArray();
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

    public function validasiFile($file)
    {
        $type = strtolower($file);
        $type = explode('/', $type);
        $type = end($type);
        return $type;
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

        $availableImage = ['jpeg', 'jpg', 'png'];
        $availableFile = ['pdf'];
        $typeImage = $this->validasiFile($_FILES['image']['type']);
        $typeFile = $this->validasiFile($_FILES['pdf']['type']);

        if (!in_array($typeImage, $availableImage)) {
            Flasher::setFlash('Format file gambar (gunakan JPEG, PNG, JPG) tidak dapat ', 'ditambahkan', 'danger');
            return false;
        }

        if (!in_array($typeFile, $availableFile)) {
            Flasher::setFlash('Format file (gunakan PDF) tidak dapat ', 'ditambahkan', 'danger');
            return false;
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

        $phone = [];

        $document = [
            'nama' => $publisher['nama'],
            'jalan' => $publisher['jalan'],
            'kota' => $publisher['kota'],
            'kontak' => [
                'email' => $publisher['email']
            ]
        ];

        if ($publisher['lokasi'] != '') {
            $document['lokasi'] = $publisher['lokasi'];
        }
        if ($publisher['kode_pos'] != '') {
            $document['kode_pos'] = $publisher['kode_pos'];
        }
        if ($publisher['website'] != '') {
            $document['kontak']['website'] = $publisher['website'];
        }
        if ($publisher['telepon'] != '') {
            $phone[] = $publisher['telepon'];
        }
        if ($publisher['telepon2'] != '') {
            $phone[] = $publisher['telepon2'];
        }
        if ($publisher['telepon3'] != '') {
            $phone[] = $publisher['telepon3'];
        }
        if (!empty($phone)) {
            $document['kontak']['telepon'] = $phone;
        }

        $this->db->Penerbit->insertOne($document);

        Flasher::setFlash('Data penerbit berhasil', 'ditambahkan', 'success');
    }

    public function updateBook($book = [])
    {
        if (empty($book)) {
            return false;
        }

        $collection = $this->db->Penerbit;
        $publisher = $this->getDataBookByISBN($book['isbn']);

        $pengarang = [];
        $pengarang[] = $book['penulis1'];
        if (isset($_POST['penulis2'])) {
            $pengarang[] = $_POST['penulis2'];
        }
        if (isset($_POST['penulis3'])) {
            $pengarang[] = $_POST['penulis3'];
        }

        $collection->updateOne(
            ['buku.isbn' => $book['isbn']],
            ['$set' => [
                'buku.$.judul' => $book['judul'],
                'buku.$.penulis' => $pengarang,
                'buku.$.tebal_buku' => $book['tbl'],
                'buku.$.kategori' => $book['kategori']
            ]]
        );

        $desc = str_replace(' ', '', $book['deskripsi']);
        $translator = str_replace(' ', '', $book['translator']);

        if ($desc != '') {
            $collection->updateOne(
                ['buku.isbn' => $book['isbn']],
                ['$set' => [
                    'buku.$.deskripsi' => $book['deskripsi'],
                ]]
            );
        }

        if ($translator != '') {
            $collection->updateOne(
                ['buku.isbn' => $book['isbn']],
                ['$set' => [
                    'buku.$.alih_bahasa' => $book['translator'],
                ]]
            );
        }

        $alih_bahasa = $publisher[0]->buku[0]->alih_bahasa;
        $deskripsi = $publisher[0]->buku[0]->deskripsi;

        if (isset($alih_bahasa) && $translator == '') {
            $collection->updateOne(
                ['buku.isbn' => $book['isbn']],
                ['$unset' => [
                    'buku.$.alih_bahasa' => '',
                ]]
            );
        }
        if (isset($deskripsi) && $desc == '') {
            $collection->updateOne(
                ['buku.isbn' => $book['isbn']],
                ['$unset' => [
                    'buku.$.deskripsi' => '',
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

    public function getDataPublisher($nama)
    {
        return $this->db->Penerbit->findOne(['nama' => $nama]);
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

        if (isset($visitor->pekerjaan) && $profession == '') {
            unset($document['pekerjaan']);
            $collection->updateOne(
                ['NIK' => $_POST['nik_old']],
                ['$unset' => [
                    'pekerjaan' => '',
                ]]
            );
        }

        $collection->updateOne(
            ['NIK' =>  $_POST['nik_old']],
            ['$set' => $document]
        );

        Flasher::setFlash('Data ' . $visitor->nama . ' berhasil', "diupdate", "success");
    }

    public function editPublisher()
    {
        $collection = $this->db->Penerbit;

        $location = str_replace(' ', '', $_POST['lokasi']);
        $zip = str_replace(' ', '', $_POST['kode_pos']);
        $website = str_replace(' ', '', $_POST['website']);
        $phone = [];

        $document = [
            'nama' => $_POST['nama'],
            'jalan' => $_POST['jalan'],
            'kota' => $_POST['kota'],
            'kontak' => [
                'email' => $_POST['email']
            ]
        ];

        if ($location != '') {
            $document['lokasi'] = $_POST['lokasi'];
        }
        if ($zip != '') {
            $document['kode_pos'] = $_POST['kode_pos'];
        }
        if ($website != '') {
            $document['kontak']['website'] = $_POST['website'];
        }

        if ($_POST['telp1'] != '') {
            $phone[] = $_POST['telp1'];
        }
        if ($_POST['telp2'] != '') {
            $phone[] = $_POST['telp2'];
        }
        if ($_POST['telp3'] != '') {
            $phone[] = $_POST['telp3'];
        }
        if (!empty($phone)) {
            $document['kontak']['telepon'] = $phone;
        }

        $penerbit = $this->getDataPublisher($_POST['nama']);
        // var_dump($penerbit);

        if (isset($penerbit->lokasi) && $location == '') {
            unset($document['lokasi']);
            $collection->updateOne(
                ['nama' =>  $_POST['nama']],
                ['$unset' => [
                    'lokasi' => '',
                ]]
            );
        }
        if (isset($penerbit->kode_pos) && $zip == '') {
            unset($document['kode_pos']);
            $collection->updateOne(
                ['nama' =>  $_POST['nama']],
                ['$unset' => [
                    'kode_pos' => '',
                ]]
            );
        }
        if (isset($penerbit->kontak->website) && $website == '') {
            unset($document['kontak']['website']);
        }

        $collection->updateOne(
            ['nama' =>  $_POST['nama']],
            ['$set' => $document]
        );

        Flasher::setFlash('Data ' . $penerbit->nama . ' berhasil', "diupdate", "success");
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
