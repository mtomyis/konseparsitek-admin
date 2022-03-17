<?php

namespace App\Models;

use CodeIgniter\Model;

class M_ringkasan extends Model
{
    protected $table = 'ringkasan';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'keterangan', 'gambar'];

    //memanggil data 2 jalur versi dengan 1 method
    public function getRingkasan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
