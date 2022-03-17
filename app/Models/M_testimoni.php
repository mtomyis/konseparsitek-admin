<?php

namespace App\Models;

use CodeIgniter\Model;

class M_testimoni extends Model
{
    protected $table = 'testimoni';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'keterangan', 'gambar', 'asal'];

    //memanggil data 2 jalur versi dengan 1 method
    public function getTestimoni($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

}
