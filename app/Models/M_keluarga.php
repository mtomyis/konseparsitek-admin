<?php

namespace App\Models;

use CodeIgniter\Model;

class M_keluarga extends Model
{
    protected $table = 'keluarga';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'sosmed', 'gambar', 'urutan'];

    //memanggil data 2 jalur versi dengan 1 method
    public function getkeluarga($id = false)
    {
        if ($id == false) {
            return $this->orderBy('urutan', 'asc')->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getUrutan()
    {
        return $this->orderBy('urutan', 'desc')->limit(1)->first();
    }
}
