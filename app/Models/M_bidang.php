<?php

namespace App\Models;

use CodeIgniter\Model;

class M_bidang extends Model
{
    protected $table = 'bidang';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'keterangan'];

    //memanggil data 2 jalur versi dengan 1 method
    public function getBidang($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
